<?php

namespace sigafi\Http\Requests;

use sigafi\Http\Requests\Request;

class UsuarioFormRequest extends Request
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
           
            'name'=>'required|unique:users,name',
            'password'=>'required',
            'email'=>'required|unique:users,email',
           
        ];
    }

    public function messages()
    {
        return [

           
            
            
        ];
    }
}
