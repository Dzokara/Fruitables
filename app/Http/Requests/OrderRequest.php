<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'address' => 'required|string|regex:/\b\w{3,}\b.*\d+/',
            'mobile' =>  ['required', 'string', 'regex:/^06\d{8,}$/'],
            'notes' => 'nullable|string',
        ];
    }

    public function messages()
    {
        return [
            'address.required' => 'Address is required.',
            'address.string' => 'Address must be a string.',
            'address.regex' => 'Address is in a wrong format e.g Address 123',
            'mobile.required' => 'Mobile number is required.',
            'mobile.string' => 'Mobile number must be a text',
            'mobile.regex' => 'Mobile number is in a wrong format e.g 0621234567',
            'notes.string' => 'Note must be a text.',
        ];
    }
}
