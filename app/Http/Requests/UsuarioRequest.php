<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required | regex:/^[a-zA-záéíóúÁÉÍÓÚ\s]+$/',
            'email' => 'required|email|unique:users',
            'password' => 'required | string |min:8|confirmed',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'El campo nombre es obligatorio',
            'name.regex' => 'El campo solo permite texto',

            'email.required' => 'El campo email es obligatorio',
            'email.email' => 'El correo no es valido',
            'email.unique' => 'Este correo ya esta registrado',

            'address.required' => 'El campo direccion es obligatorio',
            'phone.required' => 'El campo telefono es obligatorio',
            'password.required' => 'El campo contraseña es obligatorio',

        ];
    }

}
