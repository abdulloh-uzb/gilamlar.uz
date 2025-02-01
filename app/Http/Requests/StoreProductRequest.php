<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|max:255",
            "description" => "nullable",
            "collection_id" => "required|exists:collections,id",
            "material_id" => "required|exists:materials,id",
            "style_id" => "required|exists:styles,id",
            "pile_height" => "required|integer",
            "product_variants" => "required|array",
            "product_variants.*.color_id" => "required|exists:colors,id",
            "product_variants.*.size_id" => "required|exists:sizes,id",
            "product_variants.*.base_price" => "required",
            "product_variants.*.quantity" => "required",
            "product_variants.*.images" => "required|array",
            "product_variants.*.images.*" => "required|file|image|mimes:png,jpg,jpeg|max:2048"

        ];
    }
}
