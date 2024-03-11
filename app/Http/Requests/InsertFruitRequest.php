<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertFruitRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than :max characters.',
            'category.required' => 'The category field is required.',
            'category.exists' => 'The selected category is invalid.',
            'price.required' => 'The price field is required.',
            'price.numeric' => 'The price must be a number.',
            'price.min' => 'The price must be at least :min.',
            'image.required' => 'Product must have an image',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The file must be a file of type: :values.',
            'image.max' => 'The file may not be greater than :max kilobytes.',
        ];
    }
}
