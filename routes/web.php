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

Route::get('/ccc', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/' , 'Forms\FormController@loginPage');
Route::get('/register-page' , 'Forms\FormController@registerPage');
Route::post('/register-data', 'Forms\FormController@registerData')->name('register-data');
Route::post('/login-data', 'Forms\FormController@loginData')->name('login-data');


Route::get('select-specific/{id}', 'QuerryController@selectSpecific');
Route::get('select-all', 'QuerryController@selectAll');
Route::get('update/{id}', 'QuerryController@update');
Route::get('delete/{id}', 'QuerryController@delete');
Route::get('testing',function(){
    return 'true';
});

Route::get('/tested',function(){
    return view('abc');
});


Route::get('form', function(){
return view('session.login-pg');
});
Route::post('/session','Forms\FormController@loginPg')->name('log');
Route::get('/after-login','Forms\FormController@logoutPg')->name('logout');