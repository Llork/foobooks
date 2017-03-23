<?php

// This says to use the index method of BookController:
Route::get('/books', 'BookController@index');


// This says to use the show method of BookController:
Route::get('/books/{title?}', 'BookController@show');


// The following line caused an error condition when I removed the view
// method from BookController, because I wanted to use the built-in Laravel
// helper function view instead.  The error, in hindsight is clear -- it says
// that BookController has no 'view' function, which obviously is true after
// I removed it!
// Route::get('/books/{title?}', 'BookController@view');


// I think will be covered in Lecture 8:
// Route::get('/search', 'BookController@search');


// Log viewer (I still need to install this)


// Welcome page when nothing is specified in url after /
// I didn't have to specify an @ sign followed by a method name, because
// WelcomeController automatically runs the __invoke method:
Route::get('/', 'WelcomeController');


// Practice
// "any" is a Laravel wildcard that causes this route to work with ANY http verb,
// whether that verb be get, post, or whatever.  all http verbs will match.
Route::any('/practice/{n?}', 'PracticeController@index');
