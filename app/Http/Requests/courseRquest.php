<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class courseRquest extends FormRequest
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
            'title' => 'required|min:3|string',
            'description' => 'required|min:10|string',
            'sale_price' => 'nullable|numeric|lt:regular_price'
            // 'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
