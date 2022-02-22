<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="{{ url('R.png') }}" type="image/png">
	<title>SI Bebas Lab</title>

    @include('include.user.style')

</head>

<body>

	@include('include.user.navbar')

	@yield('content')

	@include('include.user.script')
</body>

</html>
