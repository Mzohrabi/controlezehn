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

    Route::middleware(["auth:web"])->prefix("dailypray")->group(function(){
        Route::get('/', "UserController@index")->name('admin.dailypray');
    });
    //Users
    Route::middleware(["auth:web"])->prefix("products")->group(function(){
        Route::prefix("audiobooks")->group(function(){
            Route::get('/all', "AudiobookController@index")->name('admin.products.audiobooks');
            Route::get('/create', "AudiobookController@create")->name('admin.products.audiobooks.create');
            Route::post('/store', "AudiobookController@store")->name('admin.products.audiobooks.store');
        });

        Route::prefix("courses")->group(function(){
            Route::get('/all', "UserController@index")->name('admin.products.courses');
        });

        Route::prefix("lectures")->group(function(){
            Route::get('/all', "UserController@index")->name('admin.products.lectures');
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
