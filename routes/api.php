<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\auth\LoginController;
use App\Http\Controllers\api\v1\admin\ProfileAdminController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(LoginController::class)->prefix('admin')->group(function () {
    Route::post('auth/login','login')->name('login');
    Route::post('auth/logout','logout')->name('user.logout')->middleware('auth:sanctum');
});
Route::controller(ProfileAdminController::class)->prefix('admin')->group(function () {
    Route::get('profile/view','view')->name('profile.admin')->middleware('auth:sanctum');
});
