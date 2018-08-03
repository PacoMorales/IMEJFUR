<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FURWEB_METADATO_299_Request extends FormRequest
{
    public function messages()
    {
        return [
            'PRIMER_APELLIDO.alpha'     => 'El PRIMER APELLIDO debe ser con caracteres alfabéticos.',
            'PRIMER_APELLIDO.min'       => 'El PRIMER APELLIDO debe ser con mínimo 3 caracteres.',
            'PRIMER_APELLIDO.max'       => 'El PRIMER APELLIDO debe ser con máximo 30 caracteres.',
            'PRIMER_APELLIDO.required'  => 'El PRIMER APELLIDO es obligatorio.',
            'SEGUNDO_APELLIDO.alpha'    => 'El SEGUNDO APELLIDO debe ser con caracteres alfabéticos.',
            'NOMBRES.alpha'             => 'El NOMBRE debe ser con caracteres alfabéticos.',
            'NOMBRES.min'               => 'El NOMBRE debe ser con mínimo 3 caracteres.',
            'NOMBRES.max'               => 'El NOMBRE debe ser con máximo 30 caracteres.',
            'NOMBRES.required'          => 'El NOMBRE es obligatorio.',
            'FOLIO_ID_OFICIAL.integer'  => 'El FOLIO DE IDENTIFICACIÓN OFICIAL debe ser numérico.',
            'CURP.alpha_num'            => 'El CURP debe ser con caracteres alfabéticos.',
            'CURP.required'             => 'El CURP es necesario para registrarse.',
            'PRIMER_APELLIDO.min'       => 'El CURP debe ser con 18 caracteres como mínimo.',
            //'CURP.unique'               => 'El CURP debe ser único. Al parecer alguien más ya ha utilizado esta CURP.',
            //'RFC.alpha_num'             => 'El RFC debe ser con caracteres alfabéticos.',
            'CALLE.alpha_num'           => 'La CALLE debe ser de alfanumérica.',
            'CALLE.required'            => 'La CALLE es necesaria para registrarse.',
            'CALLE.min'                 => 'La CALLE debe ser con mínimo 3 caracteres.',
            'CALLE.max'                 => 'La CALLE debe ser con máximo 50 caracteres.',
            'CODIGO_POSTAL.integer'     => 'El CODIGO POSTAL debe ser de numérico.',
            'CODIGO_POSTAL.required'    => 'El CODIGO POSTAL es necesario para registrarse.',
            'ENTRE_CALLE.alpha_num'     => 'La opción "ENTRE CALLE" debe ser de alfanumérica.',
            'Y_CALLE.alpha_num'         => 'La opción "Y CALLE" debe ser de alfanumérica.',
            'OTRA_REFERENCIA.alpha_num' => 'La opción "OTRA REFERENCIA" debe ser de alfanumérica.',
            'OTRA_REFERENCIA.required'  => 'La opción "OTRA REFERENCIA" es necesaria para registrarse.',
            'OTRA_REFERENCIA.min'       => 'La opción "OTRA REFERENCIA" debe ser con mínimo 3 caracteres.',
            'OTRA_REFERENCIA.max'       => 'La opción "OTRA REFERENCIA" debe ser con máximo 80 caracteres.',
            'COLONIA.alpha_num'         => 'La COLONIA debe ser de alfanumérica.',
            'COLONIA.required'          => 'La COLONIA es necesaria para registrarse.',
            'COLONIA.min'               => 'La COLONIA debe ser con mínimo 3 caracteres.',
            'COLONIA.max'               => 'La COLONIA debe ser con máximo 50 caracteres.',
            'LADA_TELEFONO.integer'     => 'La LADA debe ser numérico.',
            'LADA_TELEFONO.required'    => 'La LADA es necesaria para registrarse.',
            'TELEFONO.integer'          => 'El TELEFONO debe ser numérico.',
            'TELEFONO.required'         => 'El TELEFONO es necesaria para registrarse.',
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
            //'PRIMER_APELLIDO'   => 'alpha|required',
            'PRIMER_APELLIDO'   => 'min:3|max:30|required',
            //'SEGUNDO_APELLIDO'  => 'alpha',
            //'NOMBRES'           => 'alpha|required',
            'NOMBRES'           => 'min:3|max:30|required',
            'FOLIO_ID_OFICIAL'  => 'integer',
            //'CURP'              => 'alpha_num|required|unique: FURWEB_METADATO_299',
            'CURP'              => 'min:18|alpha_num|required',
            //'RFC'               => 'alpha_num',
            'CALLE'             => 'min:3|max:50|required',
            //'CALLE'             => 'required',
            'CODIGO_POSTAL'     => 'integer|required',
            //'ENTRE_CALLE'       => 'alpha_num',
            //'Y_CALLE'           => 'alpha_num',
            //'OTRA_REFERENCIA'   => 'alpha_num|required',
            'OTRA_REFERENCIA'   => 'min:3|max:80|required',
            'LADA_TELEFONO'     => 'integer|required',
            'TELEFONO'          => 'integer|required',
            //'COLONIA'           => 'alpha_num|required',
            'COLONIA'           => 'min:3|max:50|required',
        ];
    }
}
