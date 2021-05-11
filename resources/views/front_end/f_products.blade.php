    @php
        // $veg = DB::table('product')
        //          ->where('l_p',1)
        //          ->join('category','product.category_id','category.id')
        //          ->select('category.category_name','product.*')
        //          ->where('category.category_name','Vegetables')
        //          ->get();
        // $fruit = DB::table('product')
        //          ->where('l_p',1)
        //          ->join('category','product.category_id','category.id')
        //          ->select('category.category_name','product.*')
        //          ->where('category.category_name','Fruit & Nut Gifts')
        //          ->get();
        // $Ocean_Foods = DB::table('product')
        //          ->where('l_p',1)
        //          ->join('category','product.category_id','category.id')
        //          ->select('category.category_name','product.*')
        //          ->where('category.category_name','Ocean Foods')
        //          ->get();
        // $Fastfood = DB::table('product')
        //          ->where('l_p',1)
        //          ->join('category','product.category_id','category.id')
        //          ->select('category.category_name','product.*')
        //          ->where('category.category_name','Fastfood')
        //          ->get();
        // $Fresh_Meat = DB::table('product')
        //          ->where('l_p',1)
        //          ->join('category','product.category_id','category.id')
        //          ->select('category.category_name','product.*')
        //          ->where('category.category_name','Fresh Meat')
        //          ->get();

    $All = DB::table('product')
                 ->get();


    @endphp




 @extends('front_end.master')
 @section('f_products')

 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <section class="featured spad">
 <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                 {{--    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Fruit & Nut Gifts</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div> --}}
                </div>
            </div>
            <div class="row featured__filter">

                @foreach ($All as $row)
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges">
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
                            <h5>৳ {{$row->s_price }}    @php
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


{{-- @foreach ($veg as $row)
      <div class="col-lg-3 col-md-4 col-sm-6 mix vegetables ">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{$row->image1}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$row->p_name}}</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
@endforeach

                </div>
                @foreach ($Fresh_Meat as $row)

                @endforeach
                <div class="col-lg-3 col-md-4 col-sm-6 mix fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{$row->image1}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$row->p_name}}</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                @foreach ($Fastfood as $row)


                <div class="col-lg-3 col-md-4 col-sm-6 mix fastfood">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{$row->image1}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$row->p_name}}</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                   @endforeach --}}

            </div>
        </div>
 </section>



 <script type="text/javascript">
      $(document).ready(function() {
            $('.addwishlist').on('click', function(){
              var id = $(this).data('id');
              if(id) {
                 $.ajax({
                     url: "{{  url('/add_to_wishlist/') }}/"+id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                       const Toast = Swal.mixin({
                          toast: true,
                          position: 'top-end',
                          showConfirmButton: false,
                          timer: 3000
                        })

                       if($.isEmptyObject(data.error)){
                            Toast.fire({
                              type: 'success',
                              title: data.success
                            })
                       }else{
                             Toast.fire({
                                type: 'error',
                                title: data.error
                            })
                       }

                     },

                 });
             } else {
                 alert('danger');
             }
              e.preventDefault();
         });
     });

</script>
@endsection
