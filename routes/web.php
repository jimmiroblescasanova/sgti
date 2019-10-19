<?php

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

Route::get('/', 'CoursesController@index')->name('index');

Auth::routes();

Route::get('captcha-form', 'CaptchaController@captchaForm');
Route::post('store-captcha-form', 'CaptchaController@storeCaptchaForm');

Route::get('/comentarios', 'SendCommentsController@index')->name('comments');
Route::post('/comentarios', 'SendCommentsController@send')->name('comments.send');

Route::prefix('admin')->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/manual/crear', 'HomeController@create')->name('manuals.create');
    Route::post('/manual/crear', 'HomeController@store')->name('manuals.store');
    Route::delete('/manual/eliminar/{id}', 'HomeController@destroy')->name('manuals.destroy');

    Route::get('/usuarios', 'UsersController@index')->name('users');
});