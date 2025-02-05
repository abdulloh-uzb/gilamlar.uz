<?php

namespace App\Services;

use App\Models\Collection;
use Illuminate\Support\Facades\DB;

class CollectionService{

    public function __construct(private ImageService $imageService)
    {
        
    }
    
    public function store($data)
    {
        return DB::transaction(function () use($data){
            $collection = Collection::create([
                "name_uz" => $data["name_uz"],  
                "name_ru" => $data["name_ru"],
                "category_id" => $data["category_id"],
                "country_id" => $data["country_id"],
            ]);

            $path = $this->imageService->store($data["image"], "collection", $collection->id);
            
            $collection->image()->create(["path" => $path]);

            return $collection;
        });

        

    }

    public function update($data, $collection)
    {
        DB::transaction(function() use ($data, $collection){
            
            $collection->update($data);

        });
    }

    public function destroy($data){
        return DB::transaction(function() use ($data){
            $this->imageService->destroy($data->image->pluck("path")->first());

            if(!empty($data->product)){    
                $imageIds = $data->product->pluck('images')->flatten()->pluck('id')->toArray();
                $this->imageService->deleteMultiple(['images' => $imageIds]);
                $data->product()->delete();
            }
            $data->delete();
            
            return true;

        });
    }      





}
