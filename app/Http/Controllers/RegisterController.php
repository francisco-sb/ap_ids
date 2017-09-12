<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RegistroRequest;
use App\Http\Controllers\Controller;
use App\Teacher;
use App\Student;
use App\User;
use Redirect;
use Session;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistroRequest $request)
    {
        $tipoRegistro = $request['tipoRegistro'];

        if($tipoRegistro == 1){
            $user = User::Create(['name' => $request["matricula"], 'password' => $request["password"], 'tiporegistro' => $tipoRegistro]);

            Teacher::Create([
                    'matricula' => $request['matricula'],
                    'nombre' => $request['nombre'],
                    'apellidos' => $request['apellidos'],
                    'user_id' => $user->id
                ]);
        }elseif ($tipoRegistro == 2) {
            $user = User::Create(['name' => $request["matricula"], 'password' => $request["password"], 'tiporegistro' => $tipoRegistro]);

            Student::Create([
                    'matricula' => $request['matricula'],
                    'nombre' => $request['nombre'],
                    'apellidos' => $request['apellidos'],
                    'carrera' => $request['carrera'],
                    'cuatrimestre' => $request['cuatrimestre'],
                    'user_id' => $user->id
                ]);
        }

        Session::flash('message-success', 'Usuario creado correctamente');
        return Redirect::to('/');

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
