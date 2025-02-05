<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCollectionRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name_uz" => "required",
            "name_ru" => "required",
            "category_id" => "required|exists:categories,id",
            "country_id" => "required|exists:countries,id",
            "image" => "required|file|image|mimes:png,jpg,jpeg|max:2048"
        ];
    }
}
