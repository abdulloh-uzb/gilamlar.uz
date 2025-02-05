<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    public function store($image, $modelName, $id)
    {
        if(!empty($image)){
            $name = md5($image->getClientOriginalName() . time()) . "." . $image->getClientOriginalExtension();
            $path = "{$modelName}/{$id}/{$name}";
            $image->storeAs("{$modelName}/{$id}", $name, "public");

            return $path;
        }
        return null;
    }   

    public function storeMultipleImage($images, $modelName, $id){
        if(empty($images)){
            return [];
        }
        $storedImages = [];
        foreach ($images as $image) {
            $storedImages[] = [
                "path" => $this->store($image, $modelName, $id),
            ];
        }
        
        return $storedImages;
    }

    // rasmlarni va rasmlarni turgan joyini Images jadvaldan o'chiradigan method 
   public function destroy($image){
        
        // agar image path bo'sh bo'lmasa rasm images jadvaldan o'chiriladi 
        if(!empty($image['path'])){
            $image->delete();
        }

        // berilgan path da rasm mavjud bo'lsa rasm va folder o'chiriladi
        if(Storage::disk("public")->exists($image['path'])){
            Storage::disk("public")->delete($image['path']);
            Storage::disk("public")->deleteDirectory(dirname($image['path']));
        }

    }

    // rasmlarni id sini qabul qiladi va Images jadvaldan kerakli rasmlarni oladi. Images jadvaldan olingan rasmlar foreach orqali
    // aylantiriladi va har bir iteratsiyada shu klassdagi destroy metodi chaqiriladi.
    // destroy metodi vazifasi - rasmlarni va rasmlarni turgan joyini o'chiradigan method
    public function deleteMultiple($imagesArray)
    {
        $images = Image::whereIn("id", $imagesArray['images'])->get();
        
        if ($images->isEmpty()) {
            return false;
        }

        foreach ($images as $image) {
            $this->destroy($image);
        }

        return true;
    }
}