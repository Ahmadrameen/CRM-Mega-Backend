<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'firstname' => 'required|string',
            'lastname'  => 'required|string',
            'phone'     => 'required|string',
            'account'   => 'nullable|string',
        ];
    }
}
