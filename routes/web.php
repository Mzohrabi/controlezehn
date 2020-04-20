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
    Route::get('/login',"LoginController@loginForm")->name('login_form');
    Route::middleware(["web"])->group(function(){
        Route::get('/user',"LoginController@getUser")->name('get_user');
    });

    Route::post('login', "LoginController@login")->name('login');
});

Route::get('/', function () {
    return view('welcome');
});
