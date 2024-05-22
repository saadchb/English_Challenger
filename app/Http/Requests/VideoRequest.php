<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            // 'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime'

            'video_import' => 'string|mimetypes:video/mp4|max:1999',
             'is_active' => 'nullable',

        ];


    }
    public function messages():array
    {
        return [
                'video_import.mimestypes'=>"Please select a video",
                'video_import.string'=>"Please string",
                

        ];
    }
}
