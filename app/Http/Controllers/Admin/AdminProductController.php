<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreImageRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ImageService;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PDO;
use Throwable;

class AdminProductController extends Controller
{

    public function __construct(protected ProductService $productService) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['variants.images', 'collection', 'material', 'style'])
            ->latest()
            ->paginate(15);
        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->productService->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->productService->update($request->validated(), $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }

    public function storeImages(StoreImageRequest $request)
    {
        $this->productService->storeImages($request->validated());
    }

    public function deleteImages(Request $request)
    {
        $imagesArray = $request->all();
        $result = $this->productService->deleteImages($imagesArray);
        
        if ($result === true) {
            return response()->json([
                "message" => "image successfully deleted"
            ]);
        }

        return response()->json([
            "message" => "There is no such a image"
        ], 404);
    }

    public function exportCsv()
    {
        return Excel::download(new ProductExport, 'products.xlsx');
    }
}
