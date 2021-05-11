 @extends('front_end.master')
 @section('blog')
 @php
     $fetch_data = DB::table('blog_post')->orderBy('id', 'desc')->limit(3)->get();
 @endphp

 <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($fetch_data as $row)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="{{asset($row->image)}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i>{{$row->date}}</li>
                                {{-- <li><i class="fa fa-comment-o"></i> 5</li> --}}
                            </ul>
                            <h5><a href="#">{{$row->heading}}</a></h5>
                            <p>{{$row->desc}}</p>
                            <a href="{{ url('Post-Details/'.$row->id) }}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        @endsection
