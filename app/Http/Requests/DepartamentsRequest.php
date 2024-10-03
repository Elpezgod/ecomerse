<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartamentsRequest extends FormRequest
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
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'El campo nombre es obligatorio',
            'name.regex' => 'El campo solo permite texto',
        ];
    }
}
