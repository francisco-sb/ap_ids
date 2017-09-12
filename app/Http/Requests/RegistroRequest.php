<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class RegistroRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//necesario cambiarlo atrue
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'matricula' => 'required|unique:users,name|digits:6|integer',
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'password' => 'required',
            'carrera' => 'sometimes|required',
            'cuatrimestre' => 'sometimes|required|integer|max:15'
        ];
    }
}
