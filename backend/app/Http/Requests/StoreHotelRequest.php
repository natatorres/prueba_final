<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class StoreHotelRequest extends FormRequest
{
    public function authorize()
    {
        // Asume que ya estás protegiendo la ruta con JWT
        return true;
    }

    public function rules()
    {
        return [
            'nombre'            => ['required', 'string', 'max:255', 'unique:hotels,nombre'],
            'direccion'         => ['required', 'string', 'max:500'],
            'ciudad'            => ['required', 'string', 'max:100'],
            'nit'               => ['required', 'string', 'max:20', 'unique:hotels,nit'],
            'num_habitaciones'  => ['required', 'integer', 'min:1'],
        ];
    }

    public function messages()
    {
        return [
            'nombre.unique'           => 'Ya existe un hotel con ese nombre.',
            'nit.unique'              => 'El NIT ingresado ya está registrado.',
            'num_habitaciones.min'    => 'Debe haber al menos 1 habitación.',
            // puedes agregar más mensajes personalizados si lo deseas
        ];
    }

    protected function failedValidation(Validator $validator)
{
    throw new HttpResponseException(response()->json([
        'message' => 'Datos inválidos al registrar hotel.',
        'errors'  => $validator->errors()
    ], 422));
}

}
