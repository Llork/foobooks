<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
    * GET
    * /
    * similar concept to a constructor, the __invoke method automatically gets run
    * when WelcomeController is used.
    */
    public function __invoke() {
        return view('welcome');
    }
}
