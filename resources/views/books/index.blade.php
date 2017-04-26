{{-- /resources/views/books/index.blade.php --}}
@extends('layouts.master')

@section('title')
    Display all books
@endsection


@section('content')
    <h1>New Books</h1>

    @foreach($newBooks as $newBook)
        <div style="background-color:yellow">
            <h2>{{ $newBook['title'] }}</h2>
            by {{ $newBook['author'] }}
        </div>
    @endforeach


    <h1>All the books</h1>

    @foreach($books as $book)
        <div class='book'>
            <h2>{{ $book['title'] }}</h2>
            by {{ $book['author'] }}<br>
            <img src='{{ $book['cover'] }}' alt='Book cover photo for {{ $book['title'] }}'>
        </div>
    @endforeach
@endsection
