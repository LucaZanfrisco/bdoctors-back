<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDoctorRequest extends FormRequest
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
            "cv" => "required|file|mimes:pdf",
            "address" => "required|max:255",
            "photo" => "required|image",
            "services" => "required",
            "description" => "required|max:255",
            'typologies' => "required|exists:typologies,id",
            "visible" => "required|boolean"
        ];
    }
}
