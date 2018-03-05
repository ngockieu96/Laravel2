<!DOCTYPE html>
<html lang="en">
	<head>
		<title>@lang('messages.title_html')</title>
		{!! HTML::style('/css/boostrap.min.css') !!}
	</head>
	<body>
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Navbar Contents -->
			</nav>
		</div>
		<div class="container">
			@yield('content')
		</div>
		{!! HTML::script('/js/jquery-1.10.1.min.js') !!}
		{!! HTML::script('/js/boostrap.min.js') !!}
	</body>
</html>
