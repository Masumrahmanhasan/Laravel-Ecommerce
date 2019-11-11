@extends('frontend.layouts.master')

@section('preloader')
  {{-- Preloader Start--}}
  <div class="preloader loader" style="display: block; background:#f2f2f2;">
    <img src="{{ asset('image/loader.gif') }}"  alt="#"/>
  </div>
  {{-- Preloader End --}}
@endsection
{{-- banner section --}}
@section('banner')
@include('frontend.partials._banner')
@endsection
{{-- banner section end --}}

{{-- brand section --}}
@section('brands')
@include('frontend.partials._brands')
@endsection
{{-- brand section end --}}

{{-- main content --}}
@section('content')
<div class="row">
  <div id="content" class="col-sm-12">
    <div class="customtab">
      <div id="tabs" class="customtab-wrapper">
        <ul class='customtab-inner'>
          <li class='tab'><a href="#tab-latest">Latest Product</a></li>
        </ul>
      </div>
      {{-- tab latest --}}
      <div id="tab-latest" class="tab-content">
        <div class="box">
          <div id="latest-slidertab" class="row owl-carousel product-slider">

            @foreach ($products as $product)

            <div class="item">
              <div class="product-thumb transition">

                <div class="image product-imageblock">
                  <a href="{{ route('product.details', $product->slug) }}">
                    <img class="img-responsive" src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->title }}" title="{{ $product->title }}"/>
                  </a>

                  <div class="button-group">
                    <form action="{{ route('cart.add') }}" method="POST">
                      @csrf
                      <input type="hidden" name="product_id" value="{{ $product->id }}">
                      <button type="submit" class="addtocart-btn">Add To Cart</button>
                    </form>
                  </div>
                </div>
                <div class="caption product-detail">
                  <h4 class="product-name"><a href="{{ route('product.details', $product->slug) }}" title="{{ $product->title }}">{{ $product->title }}</a></h4>

                  <p class="price product-price">

                    @if ($product->sell_price != null && $product->sell_price > 0)
                    <strike>BDT {{ $product->price }}</strike> BDT {{ $product->sell_price }}
                    @else
                    BDT {{ $product->price }}
                    @endif
                    
                  </p>
                  
                </div>
              </div>
            </div>

            @endforeach
            

          </div>
        </div>
      </div>
      {{-- tab latest  --}}
      
    </div>

    @include('frontend.partials._testimonials')
    @include('frontend.partials._featured')
    @include('frontend.partials._blogs')

    
    
  </div>
</div>
<div id="subbanner4" class="banner" >
  <div class="item"> <a href="#">
    <img src="{{ asset('image/banners/subbanner4.jpg') }}" alt="Sub Banner4" class="img-responsive" /></a>
  </div>
</div>
@endsection