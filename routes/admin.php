<?php
namespace Admin;

use App\Http\Controllers\api\v1\admin\student\CreateStudent;
use App\Http\Controllers\api\v1\admin\student\CreateStudentController;
use App\Http\Controllers\api\v1\admin\student\StudentsDataController;

use App\Http\Controllers\api\v1\admin\Category\CategoryController;
use App\Http\Controllers\api\v1\admin\Category\CreateCategoryController;

use App\Http\Controllers\api\v1\admin\Subject\SubjectController;
use App\Http\Controllers\api\v1\admin\Subject\CreateSubjectController;

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CorsMiddleware;
use App\Http\Middleware\AdminMiddleware;




Route::middleware(['auth:sanctum', CorsMiddleware::class, AdminMiddleware::class])->group(function () {
    // Start Module Student Sign UP
    Route::prefix('student')->group(function () {
        Route::controller(StudentsDataController::class)->group(function () {
            Route::get('/', 'show')->name('student.show');
        });
        Route::controller(CreateStudentController::class)->group(function () {
            Route::post('/add', 'store')->name('student.add');
            Route::post('/update/{id}', 'modify')->name('student.modify');
            Route::get('/delete/{id}', 'delete')->name('student.delete');
        });
    });

    // Start Category Module
    Route::prefix('category')->group(function () {
        Route::controller(CategoryController::class)->group(function(){
            Route::get('/', 'show')->name('category.show');
        });
        Route::controller(CreateCategoryController::class)->group(function(){
            Route::post('/add', 'create')->name('category.add');
            Route::post('/update/{id}', 'modify')->name('category.update');
            Route::get('/delete/{id}', 'delete')->name('category.delete');
        });
    });

    // Start Subject Module
    Route::prefix('subject')->group(function () {
        Route::controller(SubjectController::class)->group(function(){
            Route::get('/', 'show')->name('subject.show');
        });
        Route::controller(CreateSubjectController::class)->group(function(){
            Route::post('/add', 'create')->name('subject.add');
            Route::post('/update/{id}', 'modify')->name('subject.update');
            Route::get('/delete/{id}', 'delete')->name('subject.delete');
        });
    });
});