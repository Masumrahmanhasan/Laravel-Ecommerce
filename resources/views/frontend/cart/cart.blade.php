@extends('frontend.layouts.master')
@section('content')

<div class="container">
  <ul class="breadcrumb">
    <li><a href="{{ route('frontend.home') }}"><i class="fa fa-home"></i></a></li>
    <li><a href="#">Shopping Cart</a></li>
  </ul>

  <div class="row">
    <div id="column-left" class="col-sm-3 hidden-xs column-left">
      <div class="column-block">

        @include('frontend.partials_details._sidemenu')

      </div>
    </div>
    <div class="col-sm-9" id="content">
      <h1>Shopping Cart</h1>

      @include('frontend.partials._messeges')

      <div class="table-responsive">
        <table class="table table-bordered" style="border: 2px solid lightblue">
          <thead>
            <tr>
              <td class="text-center">#SR</td>
              <td class="text-left">Product Name</td>
              <td class="text-left">Unit Price</td>
              <td class="text-left">Quantity</td>
              <td class="text-right">Total</td>
              <td class="text-center">Action</td>
            </tr>
          </thead>



          <tbody>
            @if (empty($cart))

            <div class="alert alert-info">
              <i class="fa fa-exclamation-triangle"></i><strong>There is no product on your cart...</strong>
            </div>

            @else

            @foreach ($cart as $key => $item)
            <tr>
              <td class="text-center">
               {{ $loop->iteration }}
             </td>

             <td class="text-left">{{ $item['title'] }}</td>
             <td class="text-left">BDT {{ $item['unit_price'] }}</td>

             <td class="text-left">
              <div style="max-width: 200px;" class="input-group btn-block">
                <input type="text" class="form-control quantity" size="1" value="{{ $item['quantity'] }}" name="quantity">
              </div>
            </td>
            <td class="text-right">BDT {{ number_format($item['total_price'], 2) }}</td>

            <td class="text-center">
              <form action="{{ route('cart.remove') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $key }}">
                <button type="submit" class="btn btn-primary btn-lg">Remove</button>
              </form>
            </td>

          </tr>
          @endforeach

          @endif

        </tbody>



      </table>
    </div>

    <div class="row">
      <div class="col-sm-4 col-sm-offset-8">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td class="text-right"><strong>Total:</strong></td>
              <td class="text-right">BDT {{ number_format($total, 2) }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="buttons">
      <div class="pull-left">
        <a class="btn btn-default" href="{{ route('frontend.home') }}">Continue Shopping</a>
        <a class="btn btn-default" href="{{ route('cart.clear') }}">Clear Cart</a>
      </div>

      <div class="pull-right"><a class="btn btn-primary" href="{{ route('checkout') }}">Checkout</a></div>
    </div>
  </div>
</div>
</div>

@endsection
