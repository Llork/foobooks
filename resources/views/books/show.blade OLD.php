<!DOCTYPE html>
<html>
<head>
	<title>Show Book</title>
	<meta charset='utf-8'>
    <link href="/css/foobooks.css" type='text/css' rel='stylesheet'>
</head>
<body>

	<header>
		<img
        src='http://making-the-internet.s3.amazonaws.com/laravel-foobooks-logo@2x.png'
        style='width:300px'
        alt='Foobooks Logo'>
	</header>

	@includeIf('please_include_me')

	<section>
	    <h1>Show book, escaped version: {{ $title }}</h1>

			<h1>Show book, non-escaped version: {!! $title !!}</h1>

	</section>

	<footer>
		&copy; {{ date('Y') }}
	</footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</body>
</html>
