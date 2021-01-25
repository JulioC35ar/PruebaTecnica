<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentos extends FormRequest
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
            'name' => 'required',
            'usuarioId' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'nombre del documento'
        ];
    }

    public function messages()
    {
        return [
            'usuarioId.required' => 'Debe ingresar al usuario que subió el archivo'
        ];
    }
}
