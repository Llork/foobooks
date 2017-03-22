<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PracticeController extends Controller
{



// PRACTICE METHOD 1:
      public function practice1() {
        // dump is a built-in Laravel method to display data
          dump('This is the first example.');
      }


      /**
  	  * ANY (GET/POST/PUT/DELETE)
      * /practice/{n?}
      *
      * This method accepts all requests to /practice/ and
      * invokes the appropriate method.
      *
      * http://foobooks.loc/practice/1 => Invokes practice1
      * http://foobooks.loc/practice/5 => Invokes practice5
      * http://foobooks.loc/practice/999 => Practice route [practice999] not defined
  	  */
      public function index($n) {

          $method = 'practice'.$n;

          if(method_exists($this, $method))
              return $this->$method();
          else
              dd("Practice route [{$n}] not defined");
      }






}
