<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
	<link rel="stylesheet" href="{{asset('../css/main.css')}}">
	<link rel="icon" type="image/png" href="{{asset('../image/icon.png')}}" />
	<title>@yield("title")</title>
</head>

<body class="text-secondary">
	{{-- @include('navigation') --}}

	<div class="container pt-5">
		@yield('main_content')
	</div>
</body>

</html>