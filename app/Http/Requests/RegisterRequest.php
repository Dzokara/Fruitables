<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First name is required.',
            'first_name.string' => 'First name must be a text.',
            'first_name.max' => 'First name cannot be longer than :max characters.',

            'last_name.required' => 'Last name is required.',
            'last_name.string' => 'Last name must be a text.',
            'last_name.max' => 'Last name cannot be longer than :max characters.',

            'email.required' => 'Email is required.',
            'email.string' => 'Email must be a text.',
            'email.email' => 'Email must be a valid email address.',
            'email.max' => 'Email cannot be longer than :max characters.',
            'email.unique' => 'An account with that email already exists.',

            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a text.',
            'password.min' => 'Password must be at least :min characters.',
            'password.confirmed' => 'Password confirmation does not match.',

            'image.required' => 'Image is required.',
            'image.image' => 'File must be an image.',
            'image.mimes' => 'File must be a JPEG, PNG, JPG, GIF, or SVG.',
            'image.max' => 'File size cannot be larger than :max kilobytes.',
        ];
    }
}
