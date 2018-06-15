<?php

namespace sigafi\Http\Requests;

use sigafi\Http\Requests\Request;

class ControlCreditoRequest extends Request
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
            'desde'=>'required',
            'hasta'=>'required',
        ];
    }

    public function messages()
    {
        return [

            'desde.required' =>'El campo -- FECHA INICIO -- es obligatorio.',
            'hasta.required' =>'El campo -- FECHA FIN -- es obligatorio.'
            
        ];
    }
}
