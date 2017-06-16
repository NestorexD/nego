<?php

namespace arequipacity\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NegociosFormRequest extends FormRequest
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
            'nombre_negocio'=>'required|max:50',
            'nombre_dueno'=>'required|max:50',
            'telefonos'=>'max:50'
            'rubro'=>'required|max:45',
            'descripcion'=>'max:256',
            'direccion'=>'required|max:50',
            'distrito'=>'required|max:45',
            'gps'=>'required|max:45',
            'condicion'=>'max:2',
            'referencia'=>'max:50',
            'puntuacion'=>'max:50',
            'condicion'=>'max:2',
            'imagen_fondo'=>'max:50',
            'imagen_01'=>'max:50',
            'imagen_02'=>'max:50',
            'imagen_03'=>'max:50',
            'imagen_04'=>'max:50',
            'imagen_05'=>'max:50',
            'imagen_06'=>'max:50',
            'imagen_07'=>'max:50',
            'imagen_08'=>'max:50',
        ];
    }
}
