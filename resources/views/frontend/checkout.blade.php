@extends('frontend.layouts.master')
@section('content')

<ul class="breadcrumb">
	<li><a href="{{ route('frontend.home') }}"><i class="fa fa-home"></i></a></li>
	<li><a href="#">Checkout</a></li>
</ul>

<div class="row">
	<div id="column-left" class="col-sm-3 hidden-xs column-left">
		<div class="column-block">

			@include('frontend.partials_details._sidemenu')

		</div>
	</div>
	<div class="col-sm-9">
		<div class="custom">Checkout</div>
		@guest
		<div class="bs-callout bs-callout-info">
			<h4>please <a href="{{ route('login.view') }}">login</a> first to see the checkout page</h4>
		</div>

		@else
		<div class="bs-callout bs-callout-info">
			<h4 style="color: #000">You are ordering as, {{ auth()->user()->name }}</h4>
		</div>

		@endguest
		@include('frontend.partials._messeges')
		<div class="col-md-7">
			<div class="panel panel-default">
				<div class="panel-body">

					<form enctype="multipart/form-data" method="POST" action="{{ route('order.process') }}">
						@csrf
						<div class="form-group">
							<label for="customer_name" class="control-label">Customer Name</label>
							<input type="text" name="customer_name" class="form-control" placeholder="Customer Name" value="{{ auth()->user()->name ?? '' }}">
						</div>

						<div class="form-group">
							<label for="customer_phone" class="control-label">Customer Phone</label>
							<input type="text" class="form-control" placeholder="Customer Phone" value="{{ auth()->user()->phone ?? '' }}" name="customer_phone">
						</div>

						<div class="form-group">
							<label for="city" class="control-label">City</label>
							<input type="text" name="city" class="form-control" placeholder="City" value="{{ old('city') }}">
						</div>

						<div class="form-group">
							<label for="postal_code" class="control-label">Postal Code</label>
							<input type="text" name="postal_code" class="form-control" placeholder="Postal Code" value="{{ old('postal_code') }}">
						</div>

						<div class="form-group">
							<label for="address" class="control-label">Customer Address</label>
							<textarea class="form-control" name="address" placeholder="Customer Address">{{ old('address') }}</textarea>
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-info">Continue to checkout</button>
							
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="col-sm-5">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Your Cart <span class="label label-danger label-2x pull-right">Items:{{ $count }}</span></h4>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<td>Product Name</td>
								<td>Quantity</td>
								<td>Price</td>
							</tr>
						</thead>
						
						<tbody>
							
							@if (empty($cart))
							<tr>
								<td colspan="3" class="text-center">There is no product on your cart</td>
							</tr>
							@else
							@foreach ($cart as $key => $item)
							<tr>
								<td class="text-left"><strong>{{ $item['title'] }}</strong></td>
								<td class="text-left"><strong>{{ $item['quantity'] }}</strong></td>
								<td class="text-left">BDT {{ number_format($item['total_price'], 2) }}</td>
							</tr>
							@endforeach
							@endif
							
						</tbody>
					</table>

					<table class="table table-bordered">
						<tbody>
							<tr>
								<td class="text-left"><strong>Total:</strong></td>
								<td class="text-right">BDT {{ number_format($total, 2) }}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>


	</div>
</div>
@endsection