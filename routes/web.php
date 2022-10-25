<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MypageController;

Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}',  [ShopController::class, 'detail'])-> name('detail');
Route::post('/search', [ShopController::class, 'search']);
Route::get('/thanks', [ShopController::class, 'thanks']);

Route::get('/list', 'ShopController@list');
Route::post('/review', 'ShopController@review');

Route::get('/mypage', [MypageController::class, 'index']);

Route::post('/add/reservation', [ReservationController::class, 'create']);
Route::post('/edit/reservation', [ReservationController::class, 'update']);
Route::get('/done', [ReservationController::class, 'done']);
Route::post('/delete/reservation', [ReservationController::class, 'remove']);

Route::post('/add/favorite', [FavoriteController::class, 'create']);
Route::post('/delete/favorite', [FavoriteController::class, 'remove']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
