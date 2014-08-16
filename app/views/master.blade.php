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

	{{ HTML::style('css/bootstrap.css') }}
	{{ HTML::style('css/bootstrap.min.css') }}
	{{ HTML::style('css/corect.css') }}

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
				<div id="top_menu">
				@yield('menu')
				</div>

				<div id="center_content">
				@yield('content')
				</div>

				<div id="footer">
				@yield('footer')
				</div>
			</div>

			<div class=".col-xs-6 .col-md-4">
				<!-- left empty -->
			<div>
		</div>
	</div>

	{{ HTML::script('js/jquery-2.1.1.min.js') }}
	{{ HTML::script('js/bootstrap.js') }}
</body>
</html>