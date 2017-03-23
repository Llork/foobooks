<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{

// PRACTICE METHOD 3: USING rych-random package:
    public function practice3() {

      // $random = new Rych\Random\Random(); this didn't work, it cause the following error:
      // FatalThrowableError in PracticeController.php line 15:
      //Class 'App\Http\Controllers\Rych\Random\Random' not found
      $random = new \Rych\Random\Random(); // this worked, by pointing to global namespace.  you could
      // also fix by adding the following statement at the top of this PracticeController.php file:
      // use Rych\Random\Random;
      // that would allow you to then say this here in practice3:
      // $random = new Random();

      // Generate a 16-byte string of random raw data
      $randomBytes = $random->getRandomBytes(16);
      dump($randomBytes);

      // Get a random integer between 1 and 100
      $randomNumber = $random->getRandomInteger(1, 100);
      dump($randomNumber);

      // Get a random 8-character string using the
      // character set A-Za-z0-9./
      $randomString = $random->getRandomString(8);
      dump($randomString);
    }



// PRACTICE METHOD 2:
//    use the 'config' global helper function to find out the value of APP_DEBUG being pulled in from the
//    .env file into the app.php file by the line of code 'debug' => env('APP_DEBUG', false),
      public function practice2() {
          dump(config('app.debug')); // do dump(config('app')); to see ALL settings
      }


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
