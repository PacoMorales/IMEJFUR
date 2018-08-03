<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SEDESEM_299_Request extends FormRequest
{
    public function messages()
    {
        return [
            'ALGUN_INGRESO_MONTO.numeric'    => 'El valor del MONTO DE ALGÚN OTRO INGRESO debe ser numérico.',
            'ALQUILER_TERRENO_MONTO.numeric' => 'El valor del MONTO DEL ALQUILER debe ser numérico.',
            'PENSION_MONTO.numeric'          => 'El valor del MONTO DE LA PENSIÓN debe ser numérico.',
            'MONTO_BECA.numeric'             => 'El valor del MONTO DE LA BECA debe ser numérico.',
            'MONTO_TRANSPORTE.numeric'       => 'El valor del MONTO DEL TRANSPORTE debe ser numérico.'
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
            'ALGUN_INGRESO_MONTO'    =>'numeric',
            'ALQUILER_TERRENO_MONTO' => 'numeric',
            'PENSION_MONTO'          => 'numeric',
            'MONTO_BECA'             => 'numeric',
            'MONTO_TRANSPORTE'       => 'numeric'
        ];
    }
}
