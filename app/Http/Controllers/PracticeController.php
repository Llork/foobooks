<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class PracticeController extends Controller
{
    // PRACTICE METHOD 11 from lecture 11 part 3 minute 41
    // (in the video, Susan's 'practice 9 - update', magically turns into
    // practice 10... that's why I have no practice 10.)
    // Delete a row (the 'U' in 'CRUD')
    // to run this, use the following url:
    // http://foobooks.loc/practice/11
    public function practice11() {
        echo 'this is practice method 11.<br><br>';
    # First get a book to delete
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        if(!$book) {
            dump('Did not delete- Book not found.');
        }
        else {
            $book->delete();
            dump('Deletion complete; check the database to see if it worked...');
        }
    } // end of practice method 11


    // PRACTICE METHOD 9 from lecture 11 part 3 minute 40
    // Update a row (the 'U' in 'CRUD')
    // to run this, use the following url:
    // http://foobooks.loc/practice/9
    public function practice9() {
        echo 'this is practice method 9.<br><br>';

        // To update a row in a table, you first have to select which row(s) you wish to edit.
        // Then you can alter the properties of the row and then save those changes using the save method.

        # First get a book to update
        $book = Book::where('author', 'LIKE', '%Scott%')->first();

        if(!$book) {
            dump("Book not found, can't update.");
        }
        else {

            # Change some properties
            $book->title = 'The Really Great Gatsby';
            $book->published = '2025';

            # Save the changes
            $book->save();

            dump('Update complete; check the database to confirm the update worked.');
        }
    } // end of practice method 9



    // PRACTICE METHOD 898 from lecture 11 part 3
    // Read most recently added row (the 'R' in 'CRUD')
    // to run this, use the following url:
    // http://foobooks.loc/practice/898
    public function practice898() {
        echo 'this is practice method 898.<br><br>';

        $book = new Book();

        $books = $book
            ->where('title', 'LIKE', '%Harry Potter%')
            ->where('published', '>=', '1998')
            ->orderBy('created_at', 'desc')
            ->first(); // get the first match only
        dump($books->toArray());

    } // end of practice method 898







// PRACTICE METHOD 899 from lecture 11 part 3
// Read specific rows (the 'R' in 'CRUD')
// to run this, use the following url:
// http://foobooks.loc/practice/899
public function practice899() {
    echo 'this is practice method 899.<br><br>';

    $book = new Book();

    // chain two constraints, they are treated as an 'and' condition:
    $books = $book
        ->where('title', 'LIKE', '%Harry Potter%')
        ->where('published', '>', '1998')
        ->get();
    dump($books->toArray());

} // end of practice method 899






// PRACTICE METHOD 8 from lecture 11 part 3
// Read specific rows (the 'R' in 'CRUD')
// to run this, use the following url:
// http://foobooks.loc/practice/8
public function practice8() {
    echo 'this is practice method 8.<br><br>';

    // even though this practice method doesn't insert a new row, we have to
    // instantiate a Book object to access the get/read methods in the Book model:
    $book = new Book();

    // 'where' is an Eloquent method that expects 3 parameters: column, operand, value:
    // the percent signs are wildcards:
    // to work, it also needs a fetch method -- 'get' in this case:
    $books = $book->where('title', 'LIKE', '%Harry Potter%')->get();
    dump($books->toArray());

} // end of practice method 8








// PRACTICE METHOD 7 from lecture 11 part 3
// Read all rows (the 'R' in 'CRUD')
// to run this, use the following url:
// http://foobooks.loc/practice/7
public function practice7() {
    echo 'this is practice method 7.<br><br>';

    // even though this practice method doesn't insert a new row, we have to
    // instantiate a Book object to access the get/read methods in the Book model:
    $book = new Book();
    // 'all' is an Eloquent method:
    $books = $book->all();
    dump($books->toArray());

} // end of practice method 7





// PRACTICE METHOD 6 from lecture 11 part 3
// Create a new row (the 'C' in 'CRUD')
// to run this, use the following url:
// http://foobooks.loc/practice/6
public function practice6() {
    echo 'this is practice method 6.<br><br>';
    // this practice method required me to add the following at top of
    // this PracticeController.php file:
    // use App\Book;

    // instantiate a new object from the Book class:
    $newBook = new Book();
    $newBook->title = "Harry Potter and the Sorcerer's Stone";
    // you could have also done $book->title = '"Harry Potter and the Sorcerer\'s Stone';

    $newBook->author = 'J.K. Rowling';
    $newBook->published = 1997;
    $newBook->cover = 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg';
    $newBook->purchase_link = 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427';

    # Invoke the Eloquent `save` method to generate a new row in the
    # `books` table, with the above data
    # this is also known as 'persisting' the data to the database
    $newBook->save();


    // When running practice 6, click the arrow next to 'attributes' to see the column names.
    //dump($newBook);
    // Better yet, use this dump statement instead:
    dump($newBook->toArray());



    //dump('Added: '.$newBook->title);




} // end of practice method 6






// PRACTICE METHOD 5 left intentionally blank



// PRACTICE METHOD 4: DISPLAY CONTENTS OF ARRAY
// to run this, use the following url:
// http://foobooks.loc/practice/4
public function practice4() {

    echo 'this is practice method 4.<br><br>';


$countries = [
'Canada',
'Mexico',
'USA'
];

// this works:
foreach($countries as $country) {
		echo $country . ' - this is from the plain PHP foreach loop<br>';
	}

/*
@foreach ($countries as $country)
        This is user {{ $country }} using Blade syntax to loop<br>
@endforeach
*/

/* Fatal error: Call to a member function all() on array
foreach($countries->all() as $country) {
		echo $country . '<br>';
	}
*/


} // end of practice method 4


// PRACTICE METHOD 3: USING rych-random package
// to run this, use the following url:
// http://foobooks.loc/practice/3
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
// to run this, use the following url:
// http://foobooks.loc/practice/2
      public function practice2() {
          dump(config('app.debug')); // do dump(config('app')); to see ALL settings
      }





// PRACTICE METHOD 1
// to run this, use the following url:
// http://foobooks.loc/practice/1
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
