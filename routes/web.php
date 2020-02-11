<?php

Auth::routes();

Route::get('/', 'EventsController@home')->name('index');

Route::get('/comentarios', 'SendCommentsController@index')->name('comments');
Route::post('/comentarios', 'SendCommentsController@send')->name('comments.send');

Route::get('calendario', 'EventsController@home')->name('calendar');

Route::get('registro/{slug}', 'EventRegistrationController@create')->name('registration.create');
Route::post('registro', 'EventRegistrationController@store')->name('registration.store');

Route::group([
	'prefix' => 'admin',
	'middleware' => ['auth', 'level']
], function(){
    Route::get('/cursos', 'CoursesController@index')->name('courses.index');
    Route::get('/cursos/crear', 'CoursesController@create')->name('courses.create');
    Route::post('/cursos/crear', 'CoursesController@store')->name('courses.store');
    Route::get('/cursos/{id}', 'CoursesController@show')->name('courses.show');
    Route::delete('/cursos/eliminar/{id}', 'CoursesController@destroy')->name('courses.destroy');

    Route::get('/usuarios', 'UsersController@index')->name('users');
    Route::patch('/usuarios/{id}', 'UsersController@update')->name('users.update');
    Route::get('/usuarios/{id}/editar', 'UsersController@edit')->name('users.edit');

    Route::resource('/eventos', 'EventsController')
        ->parameters(['eventos' => 'id'])
        ->names('events');
    Route::get('/eventos/{id}/descargar', 'EventRegistrationController@export')->name('events.download');
});
