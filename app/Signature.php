<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Signature extends Model
{
    /**
    * The database table used my the model.
    *
    * @var string
    */
    protected $table = "signatures";

	/**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
    protected $fillable = ['nombre','cuatrimestre','pathfile','codigo','teacher_id'];

    public function setPathfileAttribute($pathfile){
        $this->attributes['pathfile'] = Carbon::now().'-'.$pathfile->getClientOriginalName();
        $name = Carbon::now().'-'.$pathfile->getClientOriginalName();
        \Storage::disk('local')->put($name, \File::get($pathfile));
        \Storage::move($name, 'doc_policies/'.$name);
    }

    public function teacher()
    {
        return $this->belongsTo('Teacher','teacher_id','matricula');
    }

    public function students(){
        return $this->belongsToMany('Student')->withTimestamps();
    }

    public function resources(){
        return $this->hasMany('Resource','materia_id','id');
    }

    public static function signatures($matricula){
        return Signature::where('teacher_id','=',$matricula)
        ->get();
    }

    public static function signaturesDD($matricula){
        return Signature::where('teacher_id','=',$matricula)->lists('nombre','id');
    }
}
