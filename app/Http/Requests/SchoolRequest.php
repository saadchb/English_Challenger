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
            // 'school_city' => 'required',
            // 'phone_number' => 'required',
            // 'adresse' => 'required',
            // 'password' => 'required|min:8',
            // 'description' => 'required',
            // 'school_logo' => 'required|image',
            // 'school_name'=> 'required',
            // 'name_headmaster' =>'required',
            // 'email'=>'required | email',
            // // 'rating' =>'required ',
            // 'school_photo' => 'image'

        ];

    }
    public function messages():array
    {
        return [
                // 'rating'=>"Please select star rating, you can't leave a review without stars",
        ];
    }
}
