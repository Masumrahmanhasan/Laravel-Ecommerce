@extends('frontend.layouts.master')
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
    <div class="parallax">
      <ul id="testimonial" class="row owl-carousel product-slider">
        <li class="item">
          <div class="panel-default">
            <div class="testimonial-image"><img src="image/t1.jpg" alt="#"></div>
            <div class="testimonial-name"><h2>Janet Wilson</h2></div>
            <div class="testimonial-designation"><p>Web Designer</p></div>
            <div class="testimonial-desc">Rem ipsum doLoremRem ipsum doLorem ipsum ut labore et dolore ma ipsum ut labore et <br> dolore  Rem ipsum doLorem ipsum ut labore et dolore mamagna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur adipisicing.</div>
          </div>
        </li>
        <li class="item">
          <div class="panel-default">
            <div class="testimonial-image"><img src="image/t2.jpg" alt="#"></div>
            <div class="testimonial-name"><h2>Linda Howard</h2></div>
            <div class="testimonial-designation"><p>Web Deweloper</p></div>
            <div class="testimonial-desc">Rem ipsum doLoremRem ipsum doLorem ipsum ut labore et dolore ma ipsum ut labore et <br> dolore  Rem ipsum doLorem ipsum ut labore et dolore mamagna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur adipisicing.</div>
          </div>
        </li>
        <li class="item">
          <div class="panel-default">
            <div class="testimonial-image"><img src="image/t3.jpg" alt="#"></div>
            <div class="testimonial-name"><h2>Janet Wilson</h2></div>
            <div class="testimonial-designation"><p>Web Designer</p></div>
            <div class="testimonial-desc">Rem ipsum doLoremRem ipsum doLorem ipsum ut labore et dolore ma ipsum ut labore et <br> dolore  Rem ipsum doLorem ipsum ut labore et dolore mamagna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur adipisicing.</div>

          </div>
        </li>
        <li class="item">
          <div class="panel-default">
            <div class="testimonial-image"><img src="image/t4.jpg" alt="#"></div>
            <div class="testimonial-name"><h2>Linda Howard</h2></div>
            <div class="testimonial-designation"><p>Web Deweloper</p></div>
            <div class="testimonial-desc">Rem ipsum doLoremRem ipsum doLorem ipsum ut labore et dolore ma ipsum ut labore et <br> dolore  Rem ipsum doLorem ipsum ut labore et dolore mamagna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur adipisicing.</div>

          </div>
        </li>
      </ul>
    </div>
    <h3 class="productblock-title">Featured Products</h3>
    <div class="box">
      <div id="feature-slider" class="row owl-carousel product-slider">
        <div class="item product-slider-item">
          <div class="product-thumb transition">
            <div class="image product-imageblock"> <a href="product.html"> <img src="image/product/product4.jpg" alt="lorem ippsum dolor dummy" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
              <div class="button-group">
                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                <button type="button" class="addtocart-btn" >Add To Cart</button>
                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
              </div>
            </div>
            <div class="caption product-detail">
              <h4 class="product-name"><a href="product.html" title="lorem ippsum dolor dummy">lorem ippsum dolor dummy</a></h4>
              <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
            </div>
            <div class="button-group">
              <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
              <button type="button" class="addtocart-btn" >Add To Cart</button>
              <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <div class="item product-slider-item">
          <div class="product-thumb transition">
            <div class="image product-imageblock"> <a href="product.html"> <img src="image/product/product5.jpg" alt="lorem ippsum dolor dummy" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
              <div class="button-group">
                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                <button type="button" class="addtocart-btn" >Add To Cart</button>
                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
              </div>
            </div>
            <div class="caption product-detail">
              <h4 class="product-name"><a href="product.html" title="lorem ippsum dolor dummy">lorem ippsum dolor dummy</a></h4>
              <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
            </div>
            <div class="button-group">
              <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
              <button type="button" class="addtocart-btn" >Add To Cart</button>
              <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <div class="item product-slider-item">
          <div class="product-thumb transition">
            <div class="image product-imageblock"> <a href="product.html"> <img src="image/product/product6.jpg" alt="lorem ippsum dolor dummy" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
              <div class="button-group">
                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                <button type="button" class="addtocart-btn" >Add To Cart</button>
                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
              </div>
            </div>
            <div class="caption product-detail">
              <h4 class="product-name"><a href="product.html" title="lorem ippsum dolor dummy">lorem ippsum dolor dummy</a></h4>
              <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
            </div>
            <div class="button-group">
              <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
              <button type="button" class="addtocart-btn" >Add To Cart</button>
              <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <div class="item product-slider-item">
          <div class="product-thumb transition">
            <div class="image product-imageblock"> <a href="#"> <img src="image/product/product7.jpg" alt="lorem ippsum dolor dummy" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
              <div class="button-group">
                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                <button type="button" class="addtocart-btn" >Add To Cart</button>
                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
              </div>
            </div>
            <div class="caption product-detail">
              <h4 class="product-name"><a href="product.html" title="lorem ippsum dolor dummy">lorem ippsum dolor dummy</a></h4>
              <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
            </div>
            <div class="button-group">
              <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
              <button type="button" class="addtocart-btn" >Add To Cart</button>
              <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <div class="item product-slider-item">
          <div class="product-thumb transition">
            <div class="image product-imageblock"> <a href="#"> <img src="image/product/product8.jpg" alt="lorem ippsum dolor dummy" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
              <div class="button-group">
                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                <button type="button" class="addtocart-btn" >Add To Cart</button>
                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
              </div>
            </div>
            <div class="caption product-detail">
              <h4 class="product-name"><a href="product.html" title="lorem ippsum dolor dummy">lorem ippsum dolor dummy</a></h4>
              <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
            </div>
            <div class="button-group">
              <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
              <button type="button" class="addtocart-btn" >Add To Cart</button>
              <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
        <div class="item product-slider-item">
          <div class="product-thumb transition">
            <div class="image product-imageblock"> <a href="#"> <img src="image/product/product1.jpg" alt="lorem ippsum dolor dummy" title="lorem ippsum dolor dummy" class="img-responsive" /> </a>
              <div class="button-group">
                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                <button type="button" class="addtocart-btn" >Add To Cart</button>
                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
              </div>
            </div>
            <div class="caption product-detail">
              <h4 class="product-name"><a href="product.html" title="lorem ippsum dolor dummy">lorem ippsum dolor dummy</a></h4>
              <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
            </div>
            <div class="button-group">
              <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
              <button type="button" class="addtocart-btn" >Add To Cart</button>
              <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="blog">
      <div class="blog-heading">
        <h3>Latest Blogs</h3>
      </div>
      <div class="blog-inner box">
        <ul class="list-unstyled blog-wrapper" id="latest-blog">
          <li class="item blog-slider-item">
            <div class="panel-default">
              <div class="blog-image"> <a href="#" class="blog-imagelink"><img src="image/blog/blog_1.jpg" alt="#"></a> <span class="blog-hover"></span> <span class="blog-date">06/07/2015</span> <span class="blog-readmore-outer"><a href="#" class="blog-readmore">Read More</a></span> </div>
              <div class="blog-content"> <a href="#" class="blog-name">
                <h2>Artisan wines from Napa Valley</h2>
              </a>
              <div class="blog-desc">Rem ipsum doLorem ipsum ut labore et dolore magna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur Lorem ipsum doLorem ipsum dolor sit amet doLorem ipsum dolor sit amet adipisicing...</div>
              <a href="#" class="blog-readmore">Read More</a> <span class="blog-date">06/07/2015</span> </div>
            </div>
          </li>
          <li class="item blog-slider-item">
            <div class="panel-default">
              <div class="blog-image"> <a href="#" class="blog-imagelink"><img src="image/blog/blog_2.jpg" alt="#"></a> <span class="blog-hover"></span> <span class="blog-date">06/07/2015</span> <span class="blog-readmore-outer"><a href="#" class="blog-readmore">Read More</a></span> </div>
              <div class="blog-content"> <a href="#" class="blog-name">
                <h2>350000+ expert wine ratings</h2>
              </a>
              <div class="blog-desc">Rem ipsum doLorem ipsum ut labore et dolore magna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur Lorem ipsum doLorem ipsum dolor sit amet doLorem ipsum dolor sit amet adipisicing...</div>
              <a href="singale-blog.html" class="blog-readmore">Read More</a> <span class="blog-date">06/07/2015</span> </div>
            </div>
          </li>
          <li class="item blog-slider-item">
            <div class="panel-default">
              <div class="blog-image"> <a href="#" class="blog-imagelink"><img src="image/blog/blog_3.jpg" alt="#"></a> <span class="blog-hover"></span> <span class="blog-date">06/07/2015</span> <span class="blog-readmore-outer"><a href="singale-blog.html" class="blog-readmore">Read More</a></span> </div>
              <div class="blog-content"> <a href="#" class="blog-name">
                <h2>A large and rich guide to wine</h2>
              </a>
              <div class="blog-desc">Rem ipsum doLorem ipsum ut labore et dolore magna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur Lorem ipsum doLorem ipsum dolor sit amet doLorem ipsum dolor sit amet adipisicing...</div>
              <a href="singale-blog.html" class="blog-readmore">Read More</a> <span class="blog-date">06/07/2015</span> </div>
            </div>
          </li>
          <li class="item blog-slider-item">
            <div class="panel-default">
              <div class="blog-image"> <a href="#" class="blog-imagelink"><img src="image/blog/blog_4.jpg" alt="#"></a> <span class="blog-hover"></span> <span class="blog-date">06/07/2015</span> <span class="blog-readmore-outer"><a href="#" class="blog-readmore">Read More</a></span> </div>
              <div class="blog-content"> <a href="#" class="blog-name">
                <h2>Have your favorite Wine</h2>
              </a>
              <div class="blog-desc">Rem ipsum doLorem ipsum ut labore et dolore magna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur Lorem ipsum doLorem ipsum dolor sit amet doLorem ipsum dolor sit amet adipisicing...</div>
              <a href="#" class="blog-readmore">Read More</a> <span class="blog-date">06/07/2015</span> </div>
            </div>
          </li>
          <li class="item blog-slider-item">
            <div class="panel-default">
              <div class="blog-image"> <a href="#" class="blog-imagelink"><img src="image/blog/blog_5.jpg" alt="#"></a> <span class="blog-hover"></span> <span class="blog-date">06/07/2015</span> <span class="blog-readmore-outer"><a href="#" class="blog-readmore">Read More</a></span> </div>
              <div class="blog-content"> <a href="#" class="blog-name">
                <h2>Fast and easy Wine delivery</h2>
              </a>
              <div class="blog-desc">Rem ipsum doLorem ipsum ut labore et dolore magna.Lorem ipsum doLorem ipsum dolor sit amet, consectetur Lorem ipsum doLorem ipsum dolor sit amet doLorem ipsum dolor sit amet adipisicing...</div>
              <a href="#" class="blog-readmore">Read More</a> <span class="blog-date">06/07/2015</span> </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
    
  </div>
</div>
<div id="subbanner4" class="banner" >
  <div class="item"> <a href="#">
    <img src="image/banners/subbanner4.jpg" alt="Sub Banner4" class="img-responsive" /></a>
  </div>
</div>
@endsection