   @extends('front_end.master')
   @section('f_products')
   @php
           $products = DB::table('product')->limit(4)
                 ->get();
   @endphp
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/front_end/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Details</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <a href="./index.html">Product</a>
                            <span>Details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="{{asset($all_details->image1)}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                            <img src="{{$all_details->image1}}" alt="">
                            {{-- <img data-imgbigurl="{{asset('public/front_end/img/product/details/product-details-3.jpg')}}"
                                src="{{asset('public/front_end/img/product/details/thumb-2.jpg')}}" alt="">
                            <img data-imgbigurl="{{asset('public/front_end/img/product/details/product-details-5.jpg')}}"
                                src="{{asset('public/front_end/img/product/details/thumb-3.jpg')}}" alt="">
                            <img data-imgbigurl="{{asset('public/front_end/img/product/details/product-details-4.jpg')}}"
                                src="{{asset('public/front_end/img/product/details/thumb-4.jpg')}}" alt=""> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3>{{$all_details->p_name}}</h3>
                        {{-- <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-half-o"></i>
                            <span>(18 reviews)</span>
                        </div> --}}
                        <div class="product__details__price">৳ {{$all_details->s_price}}</div>

                         <form action="{{ url('add_to_cart_from_p_details') }}" method="post" accept-charset="utf-8">
                        @csrf
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="hidden" name="productid" value="{{$all_details->id}}">
                                    <input type="number" name="qty" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="primary-btn">ADD TO CARD</button>
                       {{--  <a href="#" class="primary-btn"></a> --}}
                    </form>
                        <a href="{{ url('add_to_wishlist/'.$all_details->id) }}" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <ul>
                            <li><b>Availability</b> <span>In Stock</span></li>
                            <li><b>Shipping</b> <span>01 day shipping. <samp>Free pickup today</samp></span></li>
                            {{-- <li><b>Weight</b> <span>0.5 kg</span></li> --}}
                            <li><b>Share on</b>
                                <div class="share">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="product__details__tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                    aria-selected="true">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab"
                                    aria-selected="false">Comments</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tabs-1" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                                    <p>{{$all_details->p_desc}}</p>

                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-2" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>

                                    <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                                        ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                                        elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                                        porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                                        nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.</p>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-3" role="tabpanel">
                                <div class="product__details__tab__desc">
                                    <h6>Products Infomation</h6>
                           <div class="fb-comments" data-href="{{Request::url()}}" data-numposts="8" data-width=""></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Related Product</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($products as $row)


                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{asset($row->image1)}}">
                            <ul class="product__item__pic__hover">
                                <li><a href="{{ url('add_to_wishlist/'.$row->id) }}"><i class="fa fa-heart"></i></a></li>
                                {{-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> --}}
                                <li><a href="{{ url('add_to_cart/'.$row->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ url('Product-Details/'.$row->id) }}">{{$row->p_name}}</a></h6>
                            <h5>৳ {{$row->s_price }}
                            @php
                                if ($row->unit == 1) {
                                    echo "Per Pieces";
                                }
                                else
                                {
                                    echo "Per Kg";
                                }
                            @endphp</h5>
                        </div>
                    </div>
                </div>



                @endforeach
            </div>
        </div>
    </section>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v9.0" nonce="vpI2Jiv6"></script>
@endsection
