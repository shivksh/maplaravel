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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::middleware('auth:api')->group(function(){
Route::post('/products','TestController@store');
Route::get('/fetch/{id}','TestController@fetchById');
Route::put('/update/{id}','TestController@updateById');
Route::delete('/delete/{id}','TestController@deletById');
// });
