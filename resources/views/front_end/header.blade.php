@extends('front_end.master')
@section('header')

@php
    $site_setting = DB::table('site_setting')->first();
@endphp
<!DOCTYPE html>
<html lang="zxx">

<head>
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <title>Ogani</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('public/front_end/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/front_end/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/front_end/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/front_end/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/front_end/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/front_end/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/front_end/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('public/front_end/css/style.css')}}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
 {{--    <div id="preloder">
        <div class="loader"></div>
    </div> --}}


@php
    $cus_id = Session::get('id');
    $wishlist = DB::table('wishlist')->where('user_id',$cus_id)->get();
@endphp
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="{{asset($site_setting->main_logo)}}" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>@php
                    echo sizeof($wishlist);
                @endphp</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="{{asset('public/front_end/img/language.png')}}" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="{{url('/')}}">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
        {{--         <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li> --}}
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="" title="">Track Order</a>
            <a href="{{$site_setting->facebook}}"><i class="fa fa-facebook"></i></a>
            <a href="{{$site_setting->twitter}}"><i class="fa fa-twitter"></i></a>
            <a href="{{$site_setting->linkedin}}"><i class="fa fa-linkedin"></i></a>

        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i>{{$site_setting->email}}</li>
                <li>Free Shipping for all Order of $99</li>
            </ul>
        </div>
    </div>

<header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>{{$site_setting->email}}</li>
                                <li><button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">Track Your Order</button></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="header__top__right">
                            <div class="header__top__right__social">

                                <a href="{{$site_setting->facebook}}"><i class="fa fa-facebook"></i></a>
                                <a href="{{$site_setting->twitter}}"><i class="fa fa-twitter"></i></a>
                                <a href="{{$site_setting->linkedin}}"><i class="fa fa-linkedin"></i></a>

                            </div>
                            {{-- <div class="header__top__right__language">
                                 <img src="{{asset('public/front_end/img/language.png')}}" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div> --}}
                            <div class="header__top__right__auth">
                <?php
                if(Session::get('id')) { ?>

                <div class="header__top__right__language">
                {{-- <img src="{{asset('public/front_end/img/language.png')}}" alt=""> --}}
                <div><a href="#"><i class="fa fa-user"></i>{{Session::get('name')}}</a></div>
                <ul>
                    <li><a href="{{ url('Profile/'.$cus_id) }}">Profile</a></li>

                    <li><a href="{{ url('cus_logout') }}">Log-Out</a></li>
                </ul>
            </div>
                <?php  } else{ ?>
                       <a href="{{ url('Login') }}"><i class="fa fa-user"></i>Login</a>
                     <?php }  ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="{{url('/')}}"><img src="{{asset($site_setting->main_logo)}}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="{{ request()->is('/*') ? 'active' : '' }}"><a href="{{ url('/') }}">Home</a></li>
                            <li><a class="{{ request()->is('/Shop*') ? 'active' : '' }}" href="{{ url('Shop') }}">Shop</a></li>
                     {{--        <li><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="./shop-details.html">Shop Details</a></li>
                                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                                    <li><a href="./checkout.html">Check Out</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> --}}


                            <li><a class="{{ request()->is('/blog*') ? 'active' : '' }}" href="{{ url('blog') }}">Blog</a></li>
                            <li><a class="{{ request()->is('/contact*') ? 'active' : '' }}" href="{{ url('contact') }}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>@php
                    echo sizeof($wishlist);
                @endphp</span></a></li>
                            <li><a href="{{ url('Show-Cart') }}"><i class="fa fa-shopping-bag"></i> <span>{{Cart::count()}}</span></a></li>
                        </ul>
                        <div class="header__cart__price">item:<span>৳ {{Cart::total()}}</span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Track Your Order</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ url('Track-Orders') }}" >
            @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tracking Code</label>
            <input type="text" name="tracking_code" class="form-control" id="recipient-name" required="">
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Find</button>
      </div>
        </form>
      </div>

    </div>
  </div>
</div>

    @endsection

