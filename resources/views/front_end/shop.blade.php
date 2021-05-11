   @extends('front_end.master')
   @section('f_products')
   @php

    $f_products = DB::table('product')->where('l_p',1)
                 ->get();
    $p_products = DB::table('product')
                 ->get();
    $t_products = DB::table('product')->where('t_p',1)
                 ->get();
    $category = DB::table('category')->get();
   @endphp

    <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/front_end/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                @foreach ($category as $row)
                                <li><a href="#">{{$row->category_name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        {{-- <div class="sidebar__item">
                            <h4>Price</h4>
                            <div class="price-range-wrap">
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="10" data-max="540">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar__item sidebar__item__color--option">
                            <h4>Colors</h4>
                            <div class="sidebar__item__color sidebar__item__color--white">
                                <label for="white">
                                    White
                                    <input type="radio" id="white">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--gray">
                                <label for="gray">
                                    Gray
                                    <input type="radio" id="gray">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--red">
                                <label for="red">
                                    Red
                                    <input type="radio" id="red">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--black">
                                <label for="black">
                                    Black
                                    <input type="radio" id="black">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--blue">
                                <label for="blue">
                                    Blue
                                    <input type="radio" id="blue">
                                </label>
                            </div>
                            <div class="sidebar__item__color sidebar__item__color--green">
                                <label for="green">
                                    Green
                                    <input type="radio" id="green">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <h4>Popular Size</h4>
                            <div class="sidebar__item__size">
                                <label for="large">
                                    Large
                                    <input type="radio" id="large">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="medium">
                                    Medium
                                    <input type="radio" id="medium">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="small">
                                    Small
                                    <input type="radio" id="small">
                                </label>
                            </div>
                            <div class="sidebar__item__size">
                                <label for="tiny">
                                    Tiny
                                    <input type="radio" id="tiny">
                                </label>
                            </div>
                        </div>
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset('public/front_end/img/latest-product/lp-1.jpg')}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset('public/front_end/img/latest-product/lp-2.jpg')}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset('public/front_end/img/latest-product/lp-3.jpg')}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset('public/front_end/img/latest-product/lp-1.jpg')}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset('public/front_end/img/latest-product/lp-2.jpg')}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="{{asset('public/front_end/img/latest-product/lp-3.jpg')}}" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    {{-- <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Featured Item</h2>
                        </div>
                        <div class="row featured__filter">
                            @foreach ($f_products as $row)
                            <div class="col-lg-4 col-md-4 col-sm-6 mix oranges">
                                 <div class="featured__item">
                                    <div class="featured__item__pic set-bg" data-setbg="{{$row->image1}}">
                                        <ul class="featured__item__pic__hover">
                                            <li>


                                                <a href="{{ url('add_to_wishlist/'.$row->id) }}" ><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{ url('add_to_cart/'.$row->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
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
                    </div> --}}
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Popular Products</h2>
                        </div>
                        <div class="row featured__filter">
                            @foreach ($p_products as $row)
                            <div class="col-lg-4 col-md-4 col-sm-6 mix oranges">
                                 <div class="featured__item">
                                    <div class="featured__item__pic set-bg" data-setbg="{{$row->image1}}">
                                        <ul class="featured__item__pic__hover">
                                            <li>
                                            {{--     <button  class="addwishlist" data-id="{{ $row->id }}"><i class="fa fa-heart"></i></button> --}}

                                                <a href="{{ url('add_to_wishlist/'.$row->id) }}" ><i class="fa fa-heart"></i></a>
                                            </li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="{{ url('add_to_cart/'.$row->id) }}"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
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
                    <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
