<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
        //$this->route('usuario') //ombtengo el id del usurio que quiere actualizar
        return [
            'name' =>'required',
            'email' =>'required|unique:users,email,'.$this->route('usuario'),//requerido|que sea unico| en la tabla users, columna email

        ];
    }
}
