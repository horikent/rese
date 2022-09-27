<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;

Route::get('/index', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}',  [ShopController::class, 'detail'])-> name('detail');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
