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
    Route::get('/{id}/soundfile', "AudiobookController@soundfile")->name('api.products.audiobooks.sound');
    Route::get('/{id}/imagefile', "AudiobookController@imagefile")->name('api.products.audiobooks.image');
});

Route::group(['prefix' => 'lectures', 'middleware'=>'auth:api'], function() {
    Route::get('all', 'LectureController@all');
    Route::get('/{id}/lecturefile', "LectureController@lecturefile")->name('api.products.lectures.file');
    Route::get('/{id}/imagefile', "LectureController@imagefile")->name('api.products.lectures.image');
});

Route::group(['prefix' => 'lecturers', 'middleware'=>'auth:api'], function() {
    Route::get('all', 'LecturersController@all')->name('api.lecturers.all');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
