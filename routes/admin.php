<?php
namespace Admin;
use App\Http\Controllers\api\v1\admin\student\CreateStudent;
use App\Http\Controllers\api\v1\admin\student\CreateStudentController;
use App\Http\Controllers\api\v1\admin\student\StudentsDataController;
use Illuminate\Support\Facades\Route;




        // Start Module Student Sign UP

Route::prefix('student')->middleware(['auth:sanctum'])->group(function () {
    Route::controller(StudentsDataController::class)->group(function () {
        Route::get('/', 'show')->name('student.show');
    });
    Route::controller(CreateStudentController::class)->group(function () {
        Route::post('/add', 'store')->name('student.add');
        Route::post('/update/{id}', 'modify')->name('student.modify');
    });
});
