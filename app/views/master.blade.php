<!doctype html>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>
		@section('title')
		jobit II
		@show
	</title>

	{{ HTML::style('bootstrap.css') }}
	{{ HTML::style('bootstrap.min.css') }}

	<style type="text/css">
	@section('style')
		body {
			paddin-top:60px;
		}
	@show
	</style>
</head>

<body>
	<div class="container center-block">
		<div calss="row">
			<div class=".col-xs-6 .col-md-4">
				<!-- left empty -->
			<div>

			<div class=".col-xs-6 .col-md-4">
				<div>
				@yield('menu')
				</div>

				<div>
				@yield('content')
				</div>

				<div>
				@yield('footer')
				</div>
			</div>

			<div class=".col-xs-6 .col-md-4">
				<!-- left empty -->
			<div>
		</div>
	</div>

	{{ HTML::script('jquery-2.1.1.min.js') }}
	{{ HTML::script('bootstrap.min.js') }}
	{{ HTML::script('bootstrap.js') }}
</body>
</html>