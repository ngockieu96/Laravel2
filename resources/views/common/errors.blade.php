@if (count($errors))
	<div class="alert alert-danger">
		<strong>@lang('messages.errors')</strong>
		<br><br>
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
