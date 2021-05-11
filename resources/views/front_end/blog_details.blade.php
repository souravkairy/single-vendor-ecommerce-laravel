@extends('front_end.master')
@section('f_products')

<section class="breadcrumb-section set-bg" data-setbg="{{asset('public/front_end/img/breadcrumb.jpg')}}">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 text-center">
                 <div class="breadcrumb__text">
                     <h2>Blog Details</h2>
                     <div class="breadcrumb__option">
                         <a href="./index.html">Home</a>
                         <span>Blog</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <section class="blog spad">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 col-md-10">
                <div class="blog__item">
                    <div class="blog__item__pic">
                        <img src="{{asset($data_details->image)}}" alt="">
                    </div>
                    <div class="blog__item__text">
                        <ul>
                            <li><i class="fa fa-calendar-o"></i> {{$data_details->date}}</li>

                        </ul>
                        <h5><a href="#">{{$data_details->heading}}</a></h5>
                        <p>{{$data_details->desc}} </p>

                    </div>
                </div>
             </div>
         </div>
     </div>
 </section>

@endsection
