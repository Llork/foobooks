<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index() {
        return 'This is the index function.';
    }


// Commenting the view function out caused an error condition because
// web.php expected the view function to exist here in BookController:
/*
    public function view() {
        return 'This is the view function.';
    }
*/

// this uses the helper function 'view':
    public function show($title = null) {
        return view('books.show')->with([
            'title' => $title,
        ]);
    }


}
