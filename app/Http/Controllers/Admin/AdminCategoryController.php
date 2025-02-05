<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\JsonResponse;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        try {
            $category = Category::create($request->validated());
            return response()->json($category);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Error in adding category",
                "error" => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $category = Category::findOrFail($id);
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCategoryRequest $request, Category $category): JsonResponse
    {
        try {
            $data = $request->validated();
            $category->update($data);

            return response()->json([
                "message" => "successfully updated",
                "category" => $category
            ]);
        } catch (Exception $e) {
            return response()->json([
                "message" => "Error in updating category",
                "error" => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): JsonResponse
    {
        try {
            $category->delete();
            return response()->noContent();
        } catch (Exception $e) {
            return response()->json([
                "message" => "Error in deleting category",
                "error" => $e->getMessage()
            ], 500);
        }
    }
}
