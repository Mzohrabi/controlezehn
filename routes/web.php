<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::namespace("Admin")->prefix("admin")->group(function(){
    Route::get('/login',"LoginController@loginForm")->name('login_form')->middleware('guest');

    //Dashboard
    Route::middleware(["auth:web"])->group(function(){
        Route::get('/dashboard',"DashboardController@index")->name('admin.dashboard');
    });

    //Users
    Route::middleware(["auth:web"])->prefix("users")->group(function(){
        Route::get('/', "UserController@index")->name('admin.users');
        Route::get('/all', "UserController@index")->name('admin.users.all');
        Route::get('/create', "UserController@create")->name('admin.users.create');
        Route::post('/store', "UserController@store")->name('admin.users.store');
        Route::get('/{id}/edit', "UserController@edit")->name('admin.users.edit');
        Route::get('/{id}/show', "UserController@show")->name('admin.users.show');
        Route::post('/{id}/update', "UserController@update")->name('admin.users.update');
        Route::post('/{id}/delete', "UserController@delete")->name('admin.users.delete');

    });

    Route::middleware(["auth:web"])->prefix("lecturers")->group(function(){
        Route::get('/all', "LecturersController@index")->name('admin.lecturers.all');
        Route::get('/create', "LecturersController@create")->name('admin.lecturers.create');
        Route::post('/store', "LecturersController@store")->name('admin.lecturers.store');
        Route::get('/{id}/edit', "LecturersController@edit")->name('admin.lecturers.edit');
        Route::get('/{id}/show', "LecturersController@show")->name('admin.lecturers.show');
        Route::post('/{id}/update', "LecturersController@update")->name('admin.lecturers.update');
        Route::get('/{id}/imagefile', "LecturersController@imagefile")->name('admin.lecturers.image');
        Route::post('/{id}/delete', "LecturersController@delete")->name('admin.lecturers.delete');
    });

    Route::middleware(["auth:web"])->prefix("dailypray")->group(function(){
        Route::get('/', "UserController@index")->name('admin.dailypray');
    });

    //Products
    Route::middleware(["auth:web"])->prefix("products")->group(function(){
        Route::prefix("audiobooks")->group(function(){
            Route::get('/all', "AudiobookController@index")->name('admin.products.audiobooks');
            Route::get('/create', "AudiobookController@create")->name('admin.products.audiobooks.create');
            Route::post('/store', "AudiobookController@store")->name('admin.products.audiobooks.store');
            Route::get('/{id}/edit', "AudiobookController@edit")->name('admin.products.audiobooks.edit');
            Route::get('/{id}/soundfile', "AudiobookController@soundfile")->name('admin.products.audiobooks.sound');
            Route::get('/{id}/imagefile', "AudiobookController@imagefile")->name('admin.products.audiobooks.image');
            Route::post('/{id}/update', "AudiobookController@update")->name('admin.products.audiobooks.update');
            Route::get('/{id}/delete', "AudiobookController@delete")->name('admin.products.audiobooks.delete');
        });

        Route::prefix("courses")->group(function(){
            Route::get('/all', "CourseController@index")->name('admin.products.courses');
            Route::get('/create', "CourseController@create")->name('admin.products.courses.create');
            Route::post('/store', "CourseController@store")->name('admin.products.courses.store');
            Route::get('/{id}/edit', "CourseController@edit")->name('admin.products.courses.edit');
            Route::get('/{id}/soundfile', "CourseController@soundfile")->name('admin.products.courses.sound');
            Route::get('/{id}/imagefile', "CourseController@imagefile")->name('admin.products.courses.image');
            Route::post('/{id}/update', "CourseController@update")->name('admin.products.courses.update');
            Route::get('/{id}/delete', "CourseController@delete")->name('admin.products.courses.delete');
        });

        Route::prefix("lectures")->group(function(){
            Route::get('/all', "LectureController@index")->name('admin.products.lectures');
            Route::get('/create', "LectureController@create")->name('admin.products.lectures.create');
            Route::post('/store', "LectureController@store")->name('admin.products.lectures.store');
            Route::get('/{id}/edit', "LectureController@edit")->name('admin.products.lectures.edit');
            Route::get('/{id}/lecturefile', "LectureController@lecturefile")->name('admin.products.lectures.lecturefile');
            Route::get('/{id}/imagefile', "LectureController@imagefile")->name('admin.products.lectures.image');
            Route::post('/{id}/update', "LectureController@update")->name('admin.products.lectures.update');
            Route::post('/{id}/delete', "LectureController@delete")->name('admin.products.lectures.delete');
        });
    });

    Route::middleware(["auth:web"])->prefix("exercises")->group(function(){
        Route::prefix("magicbox")->group(function(){
            Route::get('/all', "UserController@index")->name('admin.exercises.magicbox');
        });
    });

    Route::middleware(["auth:web"])->prefix("freetutorials")->group(function(){
        Route::prefix("trainingposts")->group(function(){
            Route::get('/all', "UserController@index")->name('admin.freetutorials.trainingposts');
        });

        Route::prefix("audiofiles")->group(function(){
            Route::get('/all', "UserController@index")->name('admin.freetutorials.audiofiles');
        });

        Route::prefix("photowritens")->group(function(){
            Route::get('/all', "UserController@index")->name('admin.freetutorials.photowritens');
        });

        Route::prefix("clips")->group(function(){
            Route::get('/all', "UserController@index")->name('admin.freetutorials.clips');
        });

    });

    Route::post('login', "LoginController@login")->name('login');
});
