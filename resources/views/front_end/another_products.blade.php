 @extends('front_end.master')
 @section('another_products')
@php
    $f_products = DB::table('product')->where('l_p',1)
                 ->get();
    $p_products = DB::table('product')->where('p_p',1)
                 ->get();
    $t_products = DB::table('product')->where('t_p',1)
                 ->get();
@endphp
 <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Featured Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($f_products as $row)


                            <div class="latest-prdouct__slider__item">
                                <a href="{{ url('Product-Details/'.$row->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: auto;" src="{{asset($row->image1)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$row->p_name}}</h6>
                                        <span>৳ {{$row->s_price }}
                                            @php
                                                if ($row->unit == 1) {
                                                    echo "Per Pieces";
                                                }
                                                else
                                                {
                                                    echo "Per Kg";
                                                }
                                            @endphp</span>
                                    </div>
                                </a>
                                {{-- <a href="#" class="latest-product__item">
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
                                </a> --}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Popular Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($p_products as $row)


                            <div class="latest-prdouct__slider__item">
                                <a href="{{ url('Product-Details/'.$row->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: auto;" src="{{asset($row->image1)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$row->p_name}}</h6>
                                        <span>৳ {{$row->s_price }}
                                            @php
                                                if ($row->unit == 1) {
                                                    echo "Per Pieces";
                                                }
                                                else
                                                {
                                                    echo "Per Kg";
                                                }
                                            @endphp</span>
                                    </div>
                                </a>
                                {{-- <a href="#" class="latest-product__item">
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
                                </a> --}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            @foreach ($t_products as $row)


                            <div class="latest-prdouct__slider__item">
                                <a href="{{ url('Product-Details/'.$row->id) }}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img style="width: auto;" src="{{asset($row->image1)}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$row->p_name}}</h6>
                                        <span>৳ {{$row->s_price }}
                                            @php
                                                if ($row->unit == 1) {
                                                    echo "Per Pieces";
                                                }
                                                else
                                                {
                                                    echo "Per Kg";
                                                }
                                            @endphp</span>
                                    </div>
                                </a>
                                {{-- <a href="#" class="latest-product__item">
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
                                </a> --}}
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated Products</h4>
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
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
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

    @endsection
