<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "color" => $this->color,
            "size" =>$this->size,
            "base_price" => $this->base_price,
            "image" => ImageResource::collection($this->images),
            "quantity" => $this->quantity
        ];
    }
}
