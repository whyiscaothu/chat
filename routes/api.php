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

Route::middleware('auth:api')->get('/user', static function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Auth'], static function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group(['middleware' => 'auth:api'], static function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

Route::apiResource('messages', 'MessageController')
    ->middleware('auth:api');

Route::get('users', 'UserController@getListUser')
    ->middleware('auth:api');
