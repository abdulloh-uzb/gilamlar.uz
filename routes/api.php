<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCollectionController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::delete("admin/product/images", [AdminProductController::class, "deleteImages"])->middleware("auth:sanctum");
Route::post("admin/product/images", [AdminProductController::class, "storeImages"])->middleware("auth:sanctum");    
Route::apiResource("admin/product", AdminProductController::class)->middleware("auth:sanctum");
Route::get("admin/export-csv", [AdminProductController::class, "exportCsv"]);    

Route::apiResource("admin/collection", AdminCollectionController::class)->middleware("auth:sanctum");
Route::apiResource("admin/category", AdminCategoryController::class)->middleware("auth:sanctum");
Route::apiResource("admin/orders", AdminOrderController::class)->middleware("auth:sanctum");


// auth
Route::post("login", [AuthController::class, "login"]);