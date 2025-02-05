<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCollectionRequest;
use App\Http\Resources\CollectionResource;
use App\Models\Collection;
use App\Services\CollectionService;
use Exception;
use Illuminate\Http\Request;

class AdminCollectionController extends Controller
{
    public function __construct(private CollectionService $collectionService)
    {
    }   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $collections = Collection::all();
        return CollectionResource::collection($collections);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCollectionRequest $request)
    {
        $data = $request->validated();
        $result = $this->collectionService->store($data);
        return new CollectionResource($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  

        try {
            $collection = Collection::findOrFail($id);
            return new CollectionResource($collection);
        } catch (\Exception $e) {
            return response()->json([
                "message" => "Error",
                "error" => $e->getMessage(), 
            ]);
        }
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $data = Collection::findOrFail($id);
            $this->collectionService->update($request, $data);

        } catch (Exception $e) {
            return response()->json([
                "message" => "Error",
                "error" => $e->getMessage(), 
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Collection::findOrFail($id);
            if($this->collectionService->destroy($data)){
                return response()->noContent();
            }   
        } catch (Exception $e) {
            return response()->json([
                "message" => "Error",
                "error" => $e->getMessage(), 
            ]);
        }
    }
}
