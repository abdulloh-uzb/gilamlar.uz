<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImageRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "product_variant" => "required|exists:product_variants,id",
            "images" => "required|array",
            "images.*" => "required|file|image|mimes:png,jpg,jpeg|max:2048"
        ];
    }
}
