<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	@include('_styles')
	@yield('styles')
	<title>To Do List</title>
</head>
<body class="bg-info">
	<div class="container-fluid">
		@yield('body')
	</div>

	@include('_scripts')
	@yield('scripts')
</body>
</html>