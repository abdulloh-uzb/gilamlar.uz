<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CollectionResource extends JsonResource
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
            "name_uz" => $this->name_uz,
            "name_ru" => $this->name_ru,
            "country" => [
                "name_uz" => $this->country->name_uz,
                "name_ru" => $this->country->name_ru
            ],
            "image_path" => ImageResource::collection($this->image)
        ];
    }
}
