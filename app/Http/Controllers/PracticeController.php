<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Book;

class PracticeController extends Controller
{

    // http://foobooks.loc/practice/99
    public function practice99() {
/*
        #Get all rows:
        $result = Book::all();
        dump($result->toArray());

        #Get row where id is 1:
        $wow = Book::find(1);
        dump($wow->toArray());
        // The problem with find is that if the row isn't found, you get
        // Whoops, looks like something went wrong.
        // FatalThrowableError in PracticeController.php line 25:
        // Call to a member function toArray() on null

        # Throw an exception if the lookup fails
        $result = Book::findOrFail(9999);
        dump($result->toArray());
        // I don't get findOrFail either, this query at least
        // doesn't get a fatal error, but gets this:
        // Sorry, the page you are looking for could not be found.
        // NotFoundHttpException in Handler.php line 131:
        // No query results for model [App\Book] 9999

        # Get all rows with a `where` constraint using fuzzy matching
        $result = Book::where('title', 'LIKE', '%The%')->get();
        dump($result->toArray());
        // 'the' is considered a match, it's not case sensitive

        # Get all rows with a `where` constraint using exact matching
        $result = Book::where('title', '=', 'The Great Gatsby   ')->get();
        dump($result->toArray());
        // my adding blanks after The Great Gatsby didn't cause match to
        // fail, but adding blanks before The Great Gatsby caused match
        // to fail.

        # Get rows with a `orderBy` constraint
        # By default order is ascending
        $result = Book::orderBy('published')->get();
        dump($result->toArray());

        # A second param can be passed to `orderBy` constraint to specify descending order
        $result = Book::orderBy('published', 'desc')->get();
        dump($result->toArray());

        # `orderBy` constraints can be chained to order by multiple rows
        $result = Book::orderBy('published')->orderBy('title', 'desc')->get();
        dump($result->toArray());

        # Chain two `where` constraints
        $result = Book::where('published', '>', '1960')->where('id', '<', 5 )->get();
        dump($result->toArray());

        # Chain a `where` and a `orWhere` constraint
        $result = Book::where('published', '>', '1960')->orWhere('id', '<', 5 )->get();
        dump($result->toArray());

        # `whereIn` constraint
        $result = Book::whereIn('id', [1, 2])->get();
        dump($result->toArray());

        # Get just the first result of a query by using the `first` fetch method
        $result = Book::where('title', 'LIKE', '%Gatsby%')->orderBy('created_at')->first();
        dump($result);

        # Throw an exception if the query fails
        $result = Book::where('title', '=', 'The Great Gatsbyyyyy')->firstOrFail();
        dump($result->toArray());

        # Count how many rows match a `where` constraint using the `count` fetch method
        $result = Book::where('title', 'LIKE', '%Gatsby%')->count();
        dump($result);

        # Limit the amount of results a query will return
        $result = Book::where('published', '>', 1800)->limit(2)->get();
        dump($result->toArray());

        # Get a single column's value from the first result of a query
        $result = Book::where('published', '>', 1800)->orderBy('published')->value('title');
        dump($result);

        # Determine if a row exists using the `exists` fetch method (returns a boolean value)
        $result = Book::where('title', '=', 'The Great Gatsby')->exists();
        dump($result);

        # Execute a raw SQL select
        $result = Book::raw('SELECT * FROM books WHERE title LIKE %Gatsby%')->get();
        dump($result->toArray());

        # Delete a row by id
        $result = Book::destroy(1);
        dump($result);

        # Delete any rows matching a `where` constraint
        $result = Book::where('title', '=', 'The Great Gatsby')->delete();
        dump($result);

        // Retrieve the last 5 books that were added to the books table.
        $result = Book::orderBy('created_at','desc')->limit(5)->get();
        dump($result->toArray());

        // Retrieve all the books published after 1950.
        $result = Book::where('published','>','1950')->get();
        dump($result->toArray());

        // Retrieve all the books in alphabetical order by title.
        $result = Book::orderBy('title')->get();
        dump($result->toArray());

        // Remove any books by the author “J.K. Rowling”.
*/
        // Retrieve all the books in descending order according to published date.
        $result = Book::orderBy('published','desc')->get();
        dump($result->toArray());

    } // end of practice method 99






// http://foobooks.loc/practice/98
public function practice98() {

    // Find any books by the author Carl Sagan and update the author name to be carl sagan (lowercase).

    // To update a row in a table, you first have to select which row(s) you wish to edit.
    // Then you can alter the properties of the row and then save those changes using the save method.

    # First get a book to update
    $book = Book::where('author', 'LIKE', '%Sagan%')->first();

    if(!$book) {
        dump("Book not found, can't update.");
    }
    else {

        # Change one or more properties
        //$book->title = 'The Really Great Gatsby';
        $book->author = strtoupper($book->author);

        # Save the changes
        $book->save();

        dump('Update complete; check the database to confirm the update worked.');
    }

} // end of practice method 98







// http://foobooks.loc/practice/97
public function practice97() {

    // Find any books by the author Carl Sagan and update the author name to be carl sagan (lowercase).

    // To update a row in a table, you first have to select which row(s) you wish to edit.
    // Then you can alter the properties of the row and then save those changes using the save method.

    # this works:
    //$books = Book::where('author', 'LIKE', '%Sagan%')->update(['author' => 'sagantest2']);

    # this doesn't work, it causes error
    // Whoops, looks like something went wrong.
    // ErrorException in PracticeController.php line 179:
    // Use of undefined constant author - assumed 'author'
    //$books = Book::where('author', 'LIKE', '%Sagan%')->update(['author' => strtoupper(author)]);

    # this doesn't work, it changes author field to the string 'AUTHOR'
    //$books = Book::where('author', 'LIKE', '%Sagan%')->update(['author' => strtoupper('author')]);

    # THIS WORKS, IT MAKES THE AUTHOR OF BOTH SAGAN BOOKS LOWER CASE:
    $books = Book::where('author', 'LIKE', '%Sagan%')->get();
    foreach($books as $book) {
        $book->author = strtolower($book->author);
        $book->save();
    }

    dump('Update complete; check the database to confirm the update worked.');

} // end of practice method 97





public function practice96() {
        Book::where('author','LIKE','J.K. Rowling')->delete();
        # Resulting SQL: delete from `books` where `author` LIKE 'J.K. Rowling'
        return 'Deleted all books where author like J.K. Rowling';
    } // end of practice method 96



public function practice95() {

        #Get all rows:
        $tonOfBooks = Book::all();

        // these both work:

        echo 'THIS USES DUMP STATEMENT:<br>';
        dump($tonOfBooks);

        echo '<br><br>THIS USES ECHO STATEMENT:<br>';
        echo($tonOfBooks);

        echo '<br><br>THIS USES ARRAY NOTATION:<br>';
        #this works with array notation:
        foreach($tonOfBooks as $oneSingleBook) {
            dump($oneSingleBook['title']);
        }

        echo '<br><br>THIS USES OBJECT NOTATION:<br>';
        # this works with object notation:
        foreach($tonOfBooks as $oneSingleBook) {
            dump($oneSingleBook->title);
        }

}





    // PRACTICE METHOD 11 from lecture 11 part 3 minute 41
    // (in the video, Susan's 'practice 9 - update', magically turns into
    // practice 10... that's why I have no practice 10.)
    // Delete a row (the 'D' in 'CRUD')
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
