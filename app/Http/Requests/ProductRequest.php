<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'nombre' => 'required',
            'id_subfamilia' => 'required|integer',
            'men' => 'required|boolean',
            'woman' => 'required|boolean',
            'id_color' => 'required|integer',
            'id_marca' => 'required|integer',
            'id_iva' => 'required|integer',
            'precio' => 'required',
            'precio_iva' => 'required',
            'oferta' => 'required',
            'precio_promo' => 'required',
            'precio_promo_iva' => 'required',
            'id_tipo_talla' => 'required|integer',
            'use_qty' => 'required',
            'visible' => 'required|boolean',
        ];
    }
}
