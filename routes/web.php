<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodlistController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/foodlist/create', function () {
    return view('create');
});

Route::get('/', function () {
    return view('login');
});


Route::get('/foodlist/{foodlist}/edit', [FoodlistController::class, 'edit'])->name('foodlist.edit');
Route::put('/foodlist/{foodlist}', [FoodlistController::class, 'update'])->name('foodlist.update');
Route::post('/foodlist/create', [FoodlistController::class, 'store']);
Route::get('/foodlist', [FoodlistController::class, 'index']);

Route::delete('foodlist/{id}', [FoodlistController::class, 'destroy'])->name('foodlist#delete');
