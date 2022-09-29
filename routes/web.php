<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}',  [ShopController::class, 'detail'])-> name('detail');
Route::post('/search', [ShopController::class, 'search']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
