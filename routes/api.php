<?php

use Illuminate\Http\Request;

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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

Route::group(['prefix' => 'v1/'], function () {
    Route::resource('ads', 'AdsController', [
        'except' => ['create']
    ]);

    //Route::get('/register', 'RegistrationController@create');
    Route::post('/register', 'RegistrationController@store');

    Route::get('/login', 'LoginController@create')->name('login');
    Route::post('/login', 'LoginController@store');
    Route::get('/logout', 'LoginController@destroy');
});
