<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    /**
    * The database table used my the model.
    *
    * @var string
    */
    protected $table = "teachers";

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
    protected $fillable = ['matricula','nombre','apellidos','user_id'];


    public $incrementing = false;

    public function signatures(){
        return $this->hasMany('Signature','teacher_id','matricula');
    }
}
