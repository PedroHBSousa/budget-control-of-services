<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Customer;

class UpdateCustomerRequest extends FormRequest
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
            'email' => ['required', 'email', Rule::unique('customers')->ignore($this->customer->id), ],
            'phone' => ['required', 'string', Rule::unique('customers')->ignore($this->customer->id), ],
            // 'email' => 'required|email|unique:customers,email,' . $this->customer->id,
            // 'phone' => 'required|string|unique:customers,phone,' . $this->customer->id,
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'email.unique' => 'O email já está em uso.',

            'phone.required' => 'O telefone é obrigatório.',
            'phone.unique' => 'O telefone já está em uso.',
        ];
    }
}
