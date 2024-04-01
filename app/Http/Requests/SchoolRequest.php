<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchoolRequest extends FormRequest
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
            'comments' => 'required',
            'school_city' => 'required',
            'phone_number' => 'required',
            'adresse' => 'required',
      
            'description' => 'required',
            'school_logo' => 'required',
            'school_name'=> 'required',
            'name' =>'required',
            'email'=>'required | email',
            // 'rating' =>'required ',
            'school_photos' => 'image|mimes:jpeg,webp,png,jpg,gif|max:2048'

        ];

    }
    public function messages():array
    {
        return [
                // 'rating'=>"Please select star rating, you can't leave a review without stars",
        ];
    }
}
