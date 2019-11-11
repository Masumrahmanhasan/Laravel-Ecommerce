@extends('frontend.layouts.master')

@section('content')
	<div class="container">
	  <ul class="breadcrumb">
	    <li><a href="{{ route('frontend.home') }}"><i class="fa fa-home"></i></a></li>
	    <li><a href="#">{{ $product->title }}</a></li>
	  </ul>

  <div class="row">
    <div id="column-left" class="col-sm-3 hidden-xs column-left">
      <div class="column-block">

        @include('frontend.partials_details._sidemenu')
        {{-- @include('frontend.partials_details._bestseller')
        @include('frontend.partials_details._latestproduct') --}}

      </div>
    </div>

    <div id="content" class="col-sm-9">
      <div class="row">
        <div class="col-sm-6">
          <div class="thumbnails">
            <div>
            	<a class="thumbnail" href="#" title="lorem ippsum dolor dummy">
            		<img src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->title }}" title="{{ $product->title }}" />
            	</a>
            </div>
            
          </div>
        </div>
        <div class="col-sm-6">
          <h1 class="productpage-title">{{ $product->title }}</h1>
          <hr>
          <ul class="list-unstyled productinfo-details-top">
            <li>
              <h2 class="productpage-price">BDT ৳
              	{{ $product->price }}</h2>
            </li>
          </ul>
          <hr>
          <ul class="list-unstyled product_info">
            
              <label>Availability:</label>
              @if ($product->in_stock == 1)
              	<span> In Stock</span></li>
              @endif
              
          </ul>
          <hr>
          <p class="product-desc">
          	{{ $product->description }}
          </p>
          <div id="product">
            <div class="form-group">
              <label class="control-label qty-label" for="input-quantity">Qty</label>
              <input type="text" name="quantity" value="{{ $cart[$product->id]['quantity'] ?? '1' }}" size="2" id="input-quantity" class="form-control productpage-qty" />
              <input type="hidden" name="product_id" value="48" />
              <div class="btn-group">

                <form action="{{ route('cart.add') }}" method="POST">
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                  <button type="submit" id="button-cart" data-loading-text="Loading..." class="btn btn-primary btn-lg addtocart">Add to Cart</button>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
	
@endsection