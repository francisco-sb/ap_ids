<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
    * The database table used my the model.
    *
    * @var string
    */
    protected $table = "students";

    /**
    * The primary key used my the table.
    *
    * @var string
    */
    protected $primaryKey = "matricula";

	/**
    * The attributes excluded from the model's JSON form.
    *
    * @var array
    */
    protected $fillable = ['matricula','nombre','apellidos','password','carrera','cuatrimestre','user_id'];

    public $incrementing = false;

    public function signatures(){
        return $this->belongsToMany('Signature', 'signature_student', 'alumno_id', 'materia_id');
    }
}
