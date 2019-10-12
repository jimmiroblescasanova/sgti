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

Route::get('/admin', 'HomeController@index')->name('home');
Route::get('/admin/crear', 'HomeController@create')->name('home.create');
Route::post('/admin/crear', 'HomeController@store')->name('home.store');
Route::delete('/admin/eliminar/{id}', 'HomeController@destroy')->name('home.destroy');

Route::get('captcha-form', 'CaptchaController@captchaForm');
Route::post('store-captcha-form', 'CaptchaController@storeCaptchaForm');

Route::get('/comentarios', 'SendCommentsController@index')->name('comments');
Route::post('/comentarios', 'SendCommentsController@send')->name('comments.send');