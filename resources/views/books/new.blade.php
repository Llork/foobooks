{{-- /resources/views/books/new.blade.php --}}
@extends('layouts.master')

@section('title')
    New book
@endsection

@section('content')
    <h1>Add a new book</h1>

    <form method='POST' action='/books/new'>
        {{ csrf_field() }}

        <small>* Required fields</small><br><br>

        <label for='title'>* Title</label><br>
        <input type='text' name='title' id='title' value='{{ old('title', 'Green Eggs & Ham') }}'><br><br>

        <label for='published'>* Published Year</label><br>
        <input type='text' name='published' id='published' value='{{ old('published', 1960) }}'><br><br>

        <label for='cover'>* URL to a cover image</label><br>
        <input type='text' name='cover' id='cover' value='{{ old('cover', 'http://prodimage.images-bn.com/pimages/9780394800165_p0_v4_s192x300.jpg') }}'><br><br>

        <label for='purchase_link'>* Purchase Link</label><br>
        <input type='text' name='purchase_link' id='purchase_link' value='{{ old('purchase_link', 'http://www.barnesandnoble.com/w/green-eggs-and-ham-dr-seuss/1100170349') }}'><br><br>

        <br>
        <input type='submit' value='Add new book'><br><br>
    </form>


    @if(count($errors) > 0)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
