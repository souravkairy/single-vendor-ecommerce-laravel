  @extends('front_end.master')
  @section('footer')
@php
    $site_setting = DB::table('site_setting')->first();
@endphp
  <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="{{asset('public/front_end/img/logo.png')}}" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: {{$site_setting->phone}}</li>
                            <li>Email:  {{$site_setting->email}}</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Privacy Policy</a></li>

                        </ul>
                        <ul>

                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="{{url('newsletter')}}" method="POST">
                            @csrf
                            <input type="text" placeholder="Enter your mail" name="email">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="{{$site_setting->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a href="{{$site_setting->linkedin}}"><i class="fa fa-linkedin"></i></a>
                            <a href="{{$site_setting->twitter}}"><i class="fa fa-twitter"></i></a>
                            <a href="{{$site_setting->pinterest}}"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed By <b>SOURAV KAIRY</b> & <b>MD NAEEM UDDIN</b>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                        <div class="footer__copyright__payment"><img src="{{asset('public/front_end/img/payment-item.png')}}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    <script src="{{asset('public/front_end/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/front_end/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/front_end/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('public/front_end/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('public/front_end/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('public/front_end/js/mixitup.min.js')}}"></script>
    <script src="{{asset('public/front_end/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/front_end/js/main.js')}}"></script>
        @endsection
