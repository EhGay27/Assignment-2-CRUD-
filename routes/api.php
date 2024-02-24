<?php

use App\Http\Controllers\FoodlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get("/foodlist", function () {
    return response()->json([
        'message' => 'Food List API'
    ]);
});

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get("/foodlist", [FoodlistController::class, 'get_foodlist']);
Route::post("/foodlist", [FoodlistController::class, 'create_foodlist']);

Route::group(['middleware' => 'jwt'], function () {

    // Route::delete("/foodlist/{id}", [FoodlistController::class, 'delete_foodlist']);
    // Route::put('/foodlist/{foodlist}', [FoodlistController::class, 'update_foodlist']);
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
