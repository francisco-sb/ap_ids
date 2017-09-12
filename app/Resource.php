<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Resource extends Model
{
    //
    protected $table = "resources";

    /**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
    protected $fillable = ['actividad','corte','pathfile','materia_id'];

    public function setPathfileAttribute($pathfile){
        $this->attributes['pathfile'] = Carbon::now().'-'.$pathfile->getClientOriginalName();
        $name = Carbon::now().'-'.$pathfile->getClientOriginalName();
        \Storage::disk('local')->put($name, \File::get($pathfile));
        \Storage::move($name, 'doc_resources/'.$name);
    }

    public function signature()
    {
        return $this->belongsTo('Signature','materia_id','id');
    }

    public static function resources($id){
        return Resource::where('materia_id','=',$id)
        ->get();
    }

    public static function resourceDD($id){
        return Signature::where('materia_id','=',$id)->lists('actividad','corte');
    }
}
