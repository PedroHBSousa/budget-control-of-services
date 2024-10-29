<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCostumerRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'street' => 'required|string|max:255',
            'number' => 'required|min:1|max:10',
            'city' => 'required|max:100',
            'state' => 'required|string|size:2',
            'zip' => 'required|string|size:8',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'name.min' => 'O nome deve ter pelo menos 3 caracteres.',
            'name.required' => 'O nome é obrigatório.',
            'name.max' => 'O nome deve ter no máximo 255 caracteres.',

            'phone.required' => 'O telefone é obrigatório.',
            'phone.unique' => 'O telefone já está em uso.',

            'zip.required' => 'O CEP é obrigatório.',
            'zip.size' => 'O CEP deve ter 8 caracteres.',

            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'email.unique' => 'O email já está em uso.',

            'state.required' => 'O estado é obrigatório.',
            'state.size' => 'O estado deve ter 2 caracteres.',
        ];
    }
}
