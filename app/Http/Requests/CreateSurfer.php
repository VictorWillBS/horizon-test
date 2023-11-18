<?php

namespace App\Http\Requests;

use App\Rules\CreateSurfer as RulesCreateSurfer;
use Illuminate\Foundation\Http\FormRequest;

class CreateSurfer extends FormRequest
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
            "country" => "string|required|alpha|max:125",
            "number" => "integer|required",
            "name" => "string|required|max:125",
        ];
    }
}
