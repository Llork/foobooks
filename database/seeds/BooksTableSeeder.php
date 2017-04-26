<?php

use Illuminate\Database\Seeder;

use App\Book; # <------ kroll ADDED THIS per lecture 11 part 4

class BooksTableSeeder extends Seeder
{
        /**
        * Run the database seeds.
        *
        * @return void
        */
        public function run()
        {
            # 2017-04-20: I optimized this seeder so the content is pulled from
            # the books.json file we used earlier in the semester.
            # Also made it so created_at/updated_at timestamps are unique.
            #
            # If you want to recall how it was originally done in Lecture 11:
            # https://github.com/susanBuck/foobooks/blob/3ac08d4c6b0e45aec4e3aa380073366e3f8b6222/database/seeds/BooksTableSeeder.php

            # Load json file into PHP array
            $books = json_decode(file_get_contents(database_path().'/books.json'), True);

            # Initiate a new timestamp we can use for created_at/updated_at fields
            $timestamp = Carbon\Carbon::now()->subDays(count($books));

            foreach($books as $title => $book) {

                # Set the created_at/updated_at for each book to be one day less than
                # the book before. That way each book will have unique timestamps.
                $timestampForThisBook = $timestamp->addDay()->toDateTimeString();
                Book::insert([
                    'created_at' => $timestampForThisBook,
                    'updated_at' => $timestampForThisBook,
                    'title' => $title,
                    'author' => $book['author'],
                    'published' => $book['published'],
                    'cover' => $book['cover'],
                    'purchase_link' => $book['purchase_link'],
                ]);
            }
        }


    /**
     * Run the database seeds.
     *
     * @return void
     */
     /*  THIS IS THE OLD VERSION, WHICH GIVES EVERYTHING THE SAME TIME STAMP, THUS MAKING THE DATA
         USELESS FOR TESTING 'ORDER BY':

     public function run()
     {
         Book::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'title' => 'The Great Gatsby',
             'author' => 'Crazy Chicken Gravy',
             'published' => 1925,
             'cover' => 'http://img2.imagesbn.com/p/9780743273565_p0_v4_s114x166.JPG',
             'purchase_link' => 'http://www.barnesandnoble.com/w/the-great-gatsby-francis-scott-fitzgerald/1116668135?ean=9780743273565',
         ]);

         Book::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'title' => 'The Bell Jar',
             'author' => 'Sylvia Plath',
             'published' => 1963,
             'cover' => 'http://img1.imagesbn.com/p/9780061148514_p0_v2_s114x166.JPG',
             'purchase_link' => 'http://www.barnesandnoble.com/w/bell-jar-sylvia-plath/1100550703?ean=9780061148514',
         ]);

         Book::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'title' => 'I Know Why the Caged Bird Sings',
             'author' => 'Maya Angelou',
             'published' => 1969,
             'cover' => 'http://img1.imagesbn.com/p/9780345514400_p0_v1_s114x166.JPG',
             'purchase_link' => 'http://www.barnesandnoble.com/w/i-know-why-the-caged-bird-sings-maya-angelou/1100392955?ean=9780345514400',
         ]);

         Book::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'title' => 'Harry Potter and the Sorcerer\'s Stone',
             'author' => 'J.K. Rowling',
             'published' => 1997,
             'cover' => 'http://prodimage.images-bn.com/pimages/9780590353427_p0_v1_s484x700.jpg',
             'purchase_link' => 'http://www.barnesandnoble.com/w/harry-potter-and-the-sorcerers-stone-j-k-rowling/1100036321?ean=9780590353427',
         ]);

         Book::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'title' => 'Harry Potter and the Chamber of Secrets',
             'author' => 'J.K. Rowling',
             'published' => 1998,
             'cover' => 'http://prodimage.images-bn.com/pimages/9780439064873_p0_v1_s192x300.jpg',
             'purchase_link' => 'http://www.barnesandnoble.com/w/harry-potter-and-the-chamber-of-secrets-j-k-rowling/1004338523?ean=9780439064873',
         ]);

         Book::insert([
             'created_at' => Carbon\Carbon::now()->toDateTimeString(),
             'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
             'title' => 'Harry Potter and the The Prisoner of Azkaban',
             'author' => 'J.K. Rowling',
             'published' => 1999,
             'cover' => 'http://prodimage.images-bn.com/pimages/9780439136365_p0_v1_s192x300.jpg',
             'purchase_link' => 'http://www.barnesandnoble.com/w/harry-potter-and-the-prisoner-of-azkaban-j-k-rowling/1100178339?ean=9780439136365',
         ]);
     }*/


}
