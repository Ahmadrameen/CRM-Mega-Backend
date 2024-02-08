<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
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
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', Rule::unique('users')->ignore($this->user), 'string', 'email', 'max:255'],
            'password' => ['sometimes', 'string', 'min:8', 'confirmed'],
            'role'     => ['required', 'string', 'max:255'],
        ];
    }
}
