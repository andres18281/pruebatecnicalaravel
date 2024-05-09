<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductUserRequest extends FormRequest
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
            'producto_id' => 'required|integer', // Regla para el campo 'producto_id'
            'usuario_id' => 'required|integer', // Regla para el campo 'usuario_id'
        ];
    }

    public function messages()
    {
        return [
            'producto_id.required' => 'El campo Producto ID es obligatorio.',
            'producto_id.integer' => 'El campo Producto ID debe ser un número entero.',
            'usuario_id.required' => 'El campo Usuario ID es obligatorio.',
            'usuario_id.integer' => 'El campo Usuario ID debe ser un número entero.',
        ];
    }
}
