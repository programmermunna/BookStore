@extends('home.layouts.template')
@section('page_title') Eflyer @endsection


@section('banner')
<div class="banner_section layout_padding">
   <div class="container">
      <div id="my_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="row">
                  <div class="col-sm-12">
                     <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                     <div class="buynow_bt"><a href="#">Buy Now</a></div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row">
                  <div class="col-sm-12">
                     <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                     <div class="buynow_bt"><a href="#">Buy Now</a></div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="row">
                  <div class="col-sm-12">
                     <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                     <div class="buynow_bt"><a href="#">Buy Now</a></div>
                  </div>
               </div>
            </div>
         </div>
         <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
         <i class="fa fa-angle-left"></i>
         </a>
         <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
         <i class="fa fa-angle-right"></i>
         </a>
      </div>
   </div>
</div>
@endsection


@section('content')
      <!-- fashion section start -->
      <div class="fashion_section">
         <div id="main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Our Latest Books</h1>
                     <div class="fashion_section_2">                        
                        <div class="row">
                           
                           @php
                            $products = App\Models\Product::latest()->where('product_subcategory_name','New')->limit(3)->get();
                           @endphp
                           @foreach ($products as $product)  
                           <div class="col-lg-4 col-sm-4">
                              <a href="{{ route('singl_product',$product->slug) }}">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">$ {{ $product->price }}</span></p>
                                 <div class="tshirt_img"><img style="height: 300px" src="{{ asset($product->product_img) }}"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="{{ route('singl_product',$product->slug) }}">See More</a></div>
                                 </div>
                              </div>
                              </a>
                           </div>
                           @endforeach

                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <h1 class="fashion_taital">Our Oldest Books</h1>
                     <div class="fashion_section_2">                        
                        <div class="row">
                           
                           @php
                            $products = App\Models\Product::where('product_subcategory_name','Old')->limit(3)->get();
                           @endphp
                           @foreach ($products as $product)  
                           <div class="col-lg-4 col-sm-4">
                              <a href="{{ route('singl_product',$product->slug) }}">
                              <div class="box_main">
                                 <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                 <p class="price_text">Price  <span style="color: #262626;">$ {{ $product->price }}</span></p>
                                 <div class="tshirt_img"><img style="height: 300px" src="{{ asset($product->product_img) }}"></div>
                                 <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="{{ route('singl_product',$product->slug) }}">See More</a></div>
                                 </div>
                              </div>
                              </a>
                           </div>
                           @endforeach

                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- fashion section end -->
      <!-- electronic section start -->
      <div class="fashion_section">
         <div id="electronic_main_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <h1 class="fashion_taital">Electronic</h1>
                     <div class="fashion_section_2">
                        @for ($i=0;$i<6;$i++)                           
                        <div class="row">
                           @php
                            $products = App\Models\Product::inRandomOrder()->limit(3)->get();
                           @endphp
                           @foreach ($products as $product) 
                           <div class="col-lg-4 col-sm-4">
                              <a href="{{ route('singl_product',$product->slug) }}">
                                 <div class="box_main">
                                    <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                    <p class="price_text">Price  <span style="color: #262626;">$ {{ $product->price }}</span></p>
                                    <div class="tshirt_img"><img style="height: 300px" src="{{ asset($product->product_img) }}"></div>
                                    <div class="btn_main">
                                       <div class="buy_bt"><a href="#">Buy Now</a></div>
                                       <div class="seemore_bt"><a href="{{ route('singl_product',$product->slug) }}">See More</a></div>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           @endforeach
                        </div>
                        @endfor

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- electronic section end -->
      <!-- jewellery  section end -->

@endsection
 