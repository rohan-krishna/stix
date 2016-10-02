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

use stix\Mail\WelcomeToStix;

Route::get('/', function () {
    return redirect('dashboard');
});

Auth::routes();

// Dashboard
Route::get('dashboard', 'PagesController@dashboard');

// View Routes for Notebooks
Route::get('notebooks','NotebookController@index');
Route::get('notebooks/{slug}','NotebookController@showWithView');

// API Routes
Route::group(['prefix' => 'api','middleware' => 'auth'], function () {
    Route::resource('notebooks', 'NotebookController');
    Route::resource('notes', 'NoteController');
});



// Passport Testing
Route::get('passport',function() {
	return view('pages.passport');
});

// Mailables testing
Route::get('sendmail', function() {
	Mail::to('rohan@example.com')->send(new WelcomeToStix);
});