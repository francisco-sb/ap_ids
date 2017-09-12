<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teacher;
use App\Student;
use App\Signature;
use App\Resource;

use Auth;
use DB;
use Session;
use Redirect;

use Image;

use App\Http\Requests;
use App\Http\Requests\ProfileRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matricula = Auth::user()->name;
        $tiporegistro = Auth::user()->tiporegistro;

        if ($tiporegistro == 1) {
            //persona-datos
            $persona = DB::table('teachers')->where('matricula', $matricula)->first();

            //materias-tabla y dropdown
            $materias = Signature::signatures($matricula);
            $materiasDropdown = Signature::signaturesDD($matricula);

            //recursos, recuperarlos
            $materia_id = $materias->only(['id']);
            $recursos = Resource::all();

            //echo $materiasDropdown;
            return view('teacher.teacherProfile', compact('persona','materias','materiasDropdown','recursos'));   

        }elseif ($tiporegistro == 2) {
            $persona = DB::table('students')->where('matricula', $matricula)->first();
            return view('student.studentProfile', compact('persona'));    
        }
        
    }

    public function policies(){
        return view('viewPoliticas');
    }

    public function listacotejo(){
        return view('listaCotejo');
    }

    public function guiaobservacion(){
        return view('viewGuiaObs');
    }

    /*public function mostrarTodo(){
        DB::table('users')
                    ->join('contacts', 'users.id', '=', 'contacts.user_id')
                    ->join('orders', 'users.id', '=', 'orders.user_id')
                    ->select('users.id', 'contacts.phone', 'orders.price')
                    ->get();
    }*/

    /*public function getMaterias(Request $request, $matricula){
        if ($request->ajax()) {
            $materias = Signature::signatures($matricula);
            return response->json($materias);
        }
    }*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileRequest $request)
    {
        $action = $request['action'];

        switch ($action) {
            case '1':
                if ($request->hasFile('avatar')) {
                    $avatar = $request->file('avatar');
                    $filename = time().'.'.$avatar->getClientOriginalExtension();
                    Image::make($avatar)->resize(300,300)->save(public_path('/files/avatars/'.$filename));

                    $user = Auth::user();
                    $user->avatar = $filename;
                    $user->save();

                    Session::flash('message-success', 'Avatar cambiado correctamente');
                }else{
                    Session::flash('message-error', 'Seleccione una imagen');
                }

                  break;  
            case '2':
                
                //Signature::Create($request->all());
                Signature::Create([
                    'nombre' => $request['nombre'],
                    'cuatrimestre' => $request['cuatrimestre'],
                    'pathfile' => $request['pathfile'],
                    'codigo' => $request['codigo'],
                    'teacher_id' => $request['teacher_id']
                ]);

                Session::flash('message-success', 'Materia creada correctamente');
                break;

            case '3':
                Resource::Create([
                    'actividad' => $request['actividad'],
                    'corte' => $request['corte'],
                    'pathfile' => $request['pathfile'],
                    'materia_id' => $request['materia_id'],
                ]);

                Session::flash('message-success', 'Recurso creado correctamente');
                break;
            
            default:
                # code...
                break;

        }

        return Redirect::to('/profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
