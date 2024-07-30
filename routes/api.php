<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\auth\LoginController;
use App\Http\Controllers\api\v1\admin\ProfileAdminController;

use App\Http\Controllers\api\v1\student\SubjectsController;

use App\Http\Middleware\StudentMiddleware;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware([StudentMiddleware::class, 'auth.sanctum'])->prefix('Student')->group(function () {
    Route::controller(SubjectsController::class)->prefix('Subjects')->group(function () {
        Route::get('/','Subjects')->name('Subjects');
    });
});

Route::controller(LoginController::class)->prefix('admin')->group(function () {
    Route::post('auth/login','login')->name('login');
    Route::post('auth/logout','logout')->name('user.logout')->middleware('auth:sanctum');
});
Route::controller(ProfileAdminController::class)->prefix('admin')->group(function () {
    Route::get('profile/view','view')->name('profile.admin')->middleware('auth:sanctum');
});
