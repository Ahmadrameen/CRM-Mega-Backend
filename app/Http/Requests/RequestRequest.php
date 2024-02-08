<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestRequest extends FormRequest
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
            'content'     => 'required|string',
            'customer_id' => 'sometimes|integer|exists:customers,id',
            'category_id' => 'sometimes|integer|exists:categories,id',
            'status_id'   => 'sometimes|integer|exists:statuses,id',
        ];
    }
}
