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

// This says to use the index method of BookController:
Route::get('/books', 'BookController@index');

// This says to use the view method of BookController:
Route::get('/books/{title?}', 'BookController@view');

// I didn't have to specify an @ sign followed by a method name, because
// WelcomeController automatically runs the __invoke method:
Route::get('/', 'WelcomeController');


// Practice
// "any" is a Laravel wildcard that causes this route to work with ANY http verb,
// whether that verb be get, post, or whatever.  all http verbs will match.
Route::any('/practice/{n?}', 'PracticeController@index');
