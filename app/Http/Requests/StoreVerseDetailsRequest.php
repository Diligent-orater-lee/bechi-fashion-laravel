<?php

namespace App\Http\Requests;

use App\Rules\UniqueVerseName;
use App\Rules\ValidVerseHandle;
use Illuminate\Foundation\Http\FormRequest;

class StoreVerseDetailsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "verse_name" => [
                "required",
                "string",
                "max:255",
                new UniqueVerseName(),
            ],
            "verse_handle" => [
                "required_if:is_ar_available,*",
                "max:63",
                new ValidVerseHandle(),
            ],
        ];
    }
}
