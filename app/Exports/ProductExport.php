<?php

namespace App\Exports;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProductResource::collection(Product::all());
    }
}
