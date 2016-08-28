<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('dashboard','PagesController@dashboard');

Route::get('notebooks','NotebookController@index');
Route::post('notebooks','NotebookController@store');
Route::delete('notebooks/{id}','NotebookController@destroy');

// Dashboard API Routes - Not so clean but works for now
Route::get('notebooks/getnotes/{id}','NoteController@getNotes');
Route::get('notebooks/getnotebooks','NotebookController@getNotebooks');

//Route::resource('notes','NoteController');
Route::get('notes/create/{id}','NoteController@create');
Route::post('notes','NoteController@store');
Route::get('notes/{id}','NoteController@show');
Route::patch('notes/{id}','NoteController@update');
Auth::routes();

Route::get('/home', 'HomeController@index');

