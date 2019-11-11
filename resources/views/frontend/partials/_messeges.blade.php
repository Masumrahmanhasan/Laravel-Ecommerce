@if ($errors->any())
<div class="alert alert-danger alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

	@if (count($errors) > 1)
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>

	@else
	{{  $errors->first() }}
	@endif
</div>
@endif

@if (session()->has('message'))
<div class="alert alert-{{ session('type') }} alert-dismissable">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>{{ session()->get('message') }}</strong>
</div>
@endif
