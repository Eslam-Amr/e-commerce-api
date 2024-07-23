<?php

use App\Http\Controllers\Admin\Auth\Admin\AdminAuthController;
use App\Http\Controllers\Seller\Auth\SellerAuthController;
use App\Http\Controllers\User\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
Route::get('/test',function(){
    return 'test';
});

Route::controller(AuthController::class)->group(function (){
    Route::post('/register','register')->name('register');
    Route::post('/login','login')->name('login');
    Route::get('/showCurrentGuard','showCurrentGuard')->name('showCurrentGuard');
});
Route::prefix('/admin')->as('admin.')->group(function (){
    Route::post('/login',[AdminAuthController::class,'login'])->name('login');

});
Route::prefix('/seller')->as('seller.')->group(function (){
    Route::post('/login',[SellerAuthController::class,'login'])->name('login');

});
