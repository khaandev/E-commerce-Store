<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer', 'exists:categories,id'], 
            'price' => ['required', 'numeric', 'min:0'],
            'buyprice' => ['required', 'numeric', 'min:0'],
            'images' => ['required', 'array'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,bmp,gif,svg,webp', 'max:2048'],
        ];

    }
}
