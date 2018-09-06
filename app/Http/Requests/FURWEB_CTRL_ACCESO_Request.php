<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FURWEB_CTRL_ACCESO_Request extends FormRequest
{
    public function messages()
    {
        return [
            'FOLIO.required'    => 'El FOLIO es necesario para registrarse.',
            //'FOLIO.max'         => 'El FOLIO debe ser menor de 6 dígitos.',
            //'FOLIO.min'         => 'El FOLIO debe ser mayor que el número cero.',
            //'FOLIO.integer'     => 'El FOLIO debe ser numérico.',
            //'FOLIO.unique'      => 'El FOLIO debe ser único. Al parecer este FOLIO ya fue registrado.',
            'LOGIN.min'         => 'El CORREO debe ser de mínimo 10 caracteres.',
            'LOGIN.max'         => 'El CORREO debe ser de máximo 50 caracteres.',
            'LOGIN.min'         => 'El CORREO debe ser de mínimo 10 caracteres.',
            'LOGIN.email'       => 'El CORREO debe estar en un formato aceptable (email@email.com).',
            'LOGIN.required'    => 'El CORREO es necesario para registrarse.',
            'PASSWORD.min'      => 'La CONTRASEÑA debe ser de mínimo 6 caracteres.',
            'PASSWORD.max'      => 'La CONTRASEÑA debe ser de máximo 25 caracteres.',
            'PASSWORD.alpha_num'=> 'La CONTRASEÑA debe ser de alfanumérica.',
            'PASSWORD.required' => 'La CONTRASEÑA es necesaria para registrarse.',
        ];
    }

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
        //'N_PERIODO' => 'required', 
        //'CVE_PROGRAMA' => 'required', 
        'FOLIO' => 'required',
        //'FOLIO' => 'integer|unique: FURWEB_CTRL_ACCESO_299|required',
        //'CVE_DEPENDENCIA' => 'required',
        'LOGIN' => 'min:10|max:50|email|required',
        'PASSWORD' => 'min:6|max:25|alpha_num|required'
        //'TIPO_USUARIO' => 'required',
        //'FECHA_REGISTRO' => ''
    ];
    }
}
