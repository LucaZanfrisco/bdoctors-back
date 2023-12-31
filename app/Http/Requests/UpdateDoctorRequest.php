<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "cv" => "file|mimes:pdf",
            "address" => "required|max:255",
            "photo" => "image",
            "services" => "required",
            "description" => "required|max:255",
            "visible" => "required|boolean"
        ];
    }
}
