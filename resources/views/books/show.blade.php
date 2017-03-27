@extends('layouts.master')

@push('head')
	<link rel='stylesheet' href='/css/books/show.css'>
@endpush

@section('title')
	Show book: {{ $title }}
@endsection

@section('content')
	<h1>Show book: {{ $title }}</h1>
@endsection

@push('body')
  <h1>This uses push instead of section: {{ $title }}</h1>
	<script src='/js/books/show.js'></script>
@endpush

@push('body')
  can one push to body twice in the same page?  After all, there's a stack on the receiving end, which implies allowing for multiple pushes...
@endpush
