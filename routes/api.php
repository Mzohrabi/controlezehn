<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['prefix' => 'auth'], function () {
        Route::post('login', 'UserController@login');
        Route::post('register', 'UserController@register');
        Route::post('confirm', 'UserController@confirmCode');
    }
);
Route::group(['middleware'=>'auth:api'],function(){
    Route::get('logout', 'UserController@logout');
    Route::get('user', 'UserController@user');
});

Route::group(['prefix' => 'audiobooks', 'middleware'=>'auth:api'], function() {
    Route::get('all', 'AudiobookController@all');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
