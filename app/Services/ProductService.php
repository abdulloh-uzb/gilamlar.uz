<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\DB;

class ProductService
{

    public function __construct(private ImageService $imageService)
    {
    }

    public function store($request)
    {
        $data = $request->validated();
        DB::transaction(function() use($data){
            $product = Product::create([
                "title" => $data['title'],
                "description" => $data['description'] ,
                "collection_id" => $data['collection_id'],
                "material_id" => $data['material_id'],
                "style_id" => $data['style_id'],
                "pile_height" => $data['pile_height'],
            ]);
    
            foreach($data['product_variants'] as $variant){
    
                $product_variant = $product->variants()->create([
                    "color_id" => $variant['color_id'],
                    "size_id" => $variant['size_id'],
                    "base_price" => $variant['base_price'],
                    "quantity" => $variant['quantity'],
                ]);
                
            }
    
        });
        
    }

    public function update($data, $product)
    {
        DB::transaction(function() use($data, $product){
            $product->update($data);

            if(!empty($data['product_variants'])){
                foreach ($data['product_variants'] as $variant) {
                    $product_variant = ProductVariant::findOrFail($variant['id']);
                    $product_variant->update($variant);
                }
            }
        });
    }

    public function storeImages($data)
    {
        $product_variant = ProductVariant::findOrFail($data['product_variant']);
        $images = [];
    
        // requestda kelgan images arrayni imageService ga bervordik. Bu metod rasmlarni aytilgan folderga saqlaydi
        // va saqlangan path ni qaytaradi.
        $images = $this->imageService->storeMultipleImage($data['images'], "products", $product_variant->product->id);
    
        // qaytgan rasmlarni manzilini product_variantga bog'lanyapti
        $product_variant->images()->createMany($images);
    }

    public function deleteImages($imageArray)
    {
        return $this->imageService->deleteMultiple($imageArray);
    }
}
