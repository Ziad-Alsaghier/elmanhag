<?php
namespace Admin;
use App\Http\Controllers\api\v1\admin\student\CreateStudent;
use App\Http\Controllers\api\v1\admin\student\CreateStudentController;
use Illuminate\Support\Facades\Route;




        // Start Module Student Sign UP

Route::prefix('student')->group(function () {
    Route::middleware(['auth:sanctum'])->controller(CreateStudentController::class)->group(function () {
        Route::post('/add', 'store')->name('student.add');
        Route::post('/update', 'modify')->name('student.add');
    });
});
