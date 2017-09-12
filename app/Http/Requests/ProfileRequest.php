<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProfileRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //Form materia
            'nombre' => 'sometimes|required',
            'cuatrimestre' => 'sometimes|required|max:10',
            'pathfile' => 'sometimes|required',
            'codigo' => 'sometimes|required|unique:signatures,codigo|string|size:5',
            //Form profile picture
            'avatar' => 'sometimes|required'
            //Form recurso
            //Form calificaciones
        ];
    }
}
