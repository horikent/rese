<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\ShopReviewController;
use App\Http\Controllers\AdminController;

Route::get('/', [ShopController::class, 'index']);
Route::get('/detail/{shop_id}',  [ShopController::class, 'detail'])-> name('detail');
Route::post('/search', [ShopController::class, 'search']);
Route::get('/thanks', [ShopController::class, 'thanks']);
Route::post('/add/shop', [ShopController::class, 'create']);
Route::post('/edit/shop', [ShopController::class, 'update']);

Route::get('/mypage', [MypageController::class, 'index']);

Route::post('/add/reservation', [ReservationController::class, 'create']);
Route::post('/edit/reservation', [ReservationController::class, 'update']);
Route::post('/delete/reservation', [ReservationController::class, 'remove']);
Route::get('/done', [ReservationController::class, 'done']);

Route::post('/add/favorite', [FavoriteController::class, 'create']);
Route::post('/delete/favorite', [FavoriteController::class, 'remove']);

Route::post('/add/review', [ShopReviewController::class, 'create']);

Route::get('/admin', [AdminController::class, 'admin']);
Route::get('/manager', [AdminController::class, 'manager']);
Route::post('/add/manager', [AdminController::class, 'create']);
Route::get('/registered', [AdminController::class, 'registered']);
Route::get('/complete', [AdminController::class, 'complete']);

Route::get('/thanks', function () {
    return view('thanks');
})->middleware(['verified'])->name('thanks');

require __DIR__.'/auth.php';
