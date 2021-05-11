    @extends('front_end.master')
    @section('banner_one')

     <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('public/front_end/img/banner/banner-1.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="{{asset('public/front_end/img/banner/banner-2.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>

        @endsection