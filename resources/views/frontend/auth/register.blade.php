@extends('frontend.layouts.master')
@section('content')

<ul class="breadcrumb">
	<li><a href="{{ route('frontend.home') }}"><i class="fa fa-home"></i></a></li>
	<li><a href="#">Login</a></li>
</ul>
<div class="col-sm-6 col-md-offset-3">
	<div class="well">
		<h2 align="center">User Registration</h2>
		@include('frontend.partials._messeges')
		<form method="post" action="{{ route('register.process') }}">
			@csrf
			{{-- Full name --}}
			<div class="form-group">
				<label for="full-name" class="control-label">Full Name</label>
				<input type="text" class="form-control" id="name" placeholder="Full Name" value="{{ old('name') }}" name="name">
			</div>

			{{-- Email --}}
			<div class="form-group">
				<label for="input-email" class="control-label">E-Mail Address</label>
				<input type="text" class="form-control" id="email" placeholder="E-Mail Address" value="{{ old('email') }}" name="email">
			</div>

			{{-- phone --}}
			<div class="form-group">
				<label for="phone" class="control-label">Phone Number</label>
				<input type="text" class="form-control" id="phone" placeholder="Phone Number" value="{{ old('phone') }}" name="phone">
			</div>


			<div class="form-group">
				<label for="input-password" class="control-label">Password</label>
				<input type="password" class="form-control" id="password" placeholder="Password" value="" name="password">
			</div>
				<button type="submit" class="btn btn-primary">Register</button>

			</form>
		</div>
	</div>
	@endsection