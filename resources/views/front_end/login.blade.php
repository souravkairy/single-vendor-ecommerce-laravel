@extends('front_end.master')
@section('f_products')



 <div class="contact-form spad">
        <div class="container">
            <div class="row" >
                <div class="col-lg-6">
                    <div class="contact__form__title">
                        <h2>Sign-In</h2>
                    </div>
            <form action="{{ url('login-auth') }}" method="post">
                @csrf

                    <div class="col-md-10" style="margin: 0 auto">
                        <input type="text" placeholder="Email" name="user_name">
                    </div>
                    <div class="col-md-10" style="margin: 0 auto">
                        <input type="text" placeholder="Password" name="password">
                    </div>
                    <div class="col-md-10 text-center" style="margin: 0 auto">
                        <button type="submit" class="site-btn">Login</button>
                    </div>

            </form>
            {{-- <div class="col-md-10 text-center" style="margin: 0 auto">
                <h4>Login With Social Account</h4>
            <a class="btn btn-secondary" href="{{ url('auth/facebook') }}" title=""><i class="fa fa-facebook-square"></i></a>
            <a class="btn btn-secondary"  href="#" title=""><i class="fa fa-google"></i></a>
            <a class="btn btn-secondary"  href="#" title=""><i class="fa fa-twitter-square"></i></a>
            <a class="btn btn-secondary"  href="#" title=""><i class="fa fa-linkedin"></i></a>
            </div> --}}

            </div>


               <div class="col-lg-6">
                    <div class="contact__form__title">
                        <h2>Sign-Up</h2>
                    </div>
            <form action="{{ url('Sign-Up') }}" method="post">
             @csrf
                    <div class="col-md-10" style="margin: 0 auto">
                        <input type="text" placeholder="Your name" name="name">
                    </div>
                    <div class="col-md-10" style="margin: 0 auto">
                        <input type="text" placeholder="Your Email" name="email">
                    </div>
                      <div class="col-md-10" style="margin: 0 auto">
                        <input type="text" placeholder="User Name" name="user_name">
                    </div>
                      <div class="col-md-10" style="margin: 0 auto">
                        <input type="text" placeholder="Password" name="password">
                    </div>
                    <div class="col-md-10 text-center" style="margin: 0 auto">
                       {{--  <textarea placeholder="Your message"></textarea> --}}
                        <button type="submit" class="site-btn">Register</button>
                    </div>

            </form>
            </div>
            </div>
        </div>
    </div>

@endsection
