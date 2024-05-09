<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'id' => 'required|integer', // Regla para el campo 'id'
            'nombreproducto' => 'required|string|max:255', // Regla para el campo 'nombreproducto'
        ];
    }

    public function messages()
    {
        return [
            'id.required' => 'El campo ID es obligatorio.',
            'id.integer' => 'El campo ID debe ser un número entero.',
            'nombreproducto.required' => 'El campo Nombre del Producto es obligatorio.',
            'nombreproducto.string' => 'El campo Nombre del Producto debe ser una cadena de texto.',
            'nombreproducto.max' => 'El campo Nombre del Producto no puede tener más de :max caracteres.',
        ];
    }
}
