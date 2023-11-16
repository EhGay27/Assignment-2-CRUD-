<?php

use App\Http\Controllers\FoodlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/foodlist", [FoodlistController::class, 'get_foodlist']);

Route::post("/foodlist", [FoodlistController::class, 'create_foodlist']);

Route::delete("foodlist/{id}", [FoodlistController::class, 'delete_foodlist']);

Route::put('/foodlist/{foodlist}', [FoodlistController::class, 'update_foodlist']);
/**Route::get("/test_foodlist", function () {
    return response()->json([
        'message' => 'Foodlists API'
    ]);
});*/
