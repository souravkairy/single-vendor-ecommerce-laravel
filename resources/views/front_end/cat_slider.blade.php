 @extends('front_end.master')
 @section('cat_slider')
@php
    $site_setting = DB::table('site_setting')->first();
    $home_slider = DB::table('home_slider')->first();
    $category = DB::table('category')->get();
@endphp
 <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            @foreach ($category as $row)
                                 <li><a href="#">{{$row->category_name}}</a></li>
                            @endforeach


                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{url('search_data')}}" method="POST" >
                            @csrf
                                <input type="text" placeholder="What do yo u need?" name="searchData">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>{{$site_setting->phone}}</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="{{asset($home_slider->image1)}}">
                        <div class="hero__text">
                            <span>{{$home_slider->heading1}}</span>
                            <h2>{{$home_slider->main_heading}}</h2>
                            <p>{{$home_slider->heading2}}</p>
                            <a href="{{ url('Shop') }}" class="primary-btn">{{$home_slider->button_text}}</a>
                        </div>
                    </div>
                </div>
            </div>

    @endsection
