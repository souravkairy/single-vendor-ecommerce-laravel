   @extends('front_end.master') 
   @section('f_products')
    @php
            $cus_id = Session::get('id');
            $all_info = DB::table('customer_info')->where('id',$cus_id)->first();
            $order_info = DB::table('order')->where('c_id',$cus_id)->get();
         
    @endphp
    <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/front_end/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Customer Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Customer Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout spad">
        <div class="container">
         
            <div class="checkout__form">
                <h4>Details Of Your Order</h4>
                    <div class="row">
                        <div class="col-lg-9 col-md-6">
                            <div class="row">
                                <div class="col-lg-12">
                                    <table class="table table-striped table-dark">
                                      <thead>
                                        <tr>
                                          <th scope="col">PaymentType</th>
                                          <th scope="col">Amount</th>
                                          <th scope="col">Date</th>
                                          <th scope="col">Status</th>
                                          <th scope="col">StatusCode</th>
                                          <th scope="col">Action</th>
                                         
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach ($order_info as $row)
                                        <tr>                                         
                                          <td>{{$row->payment_method}}</td>
                                          <td>{{$row->total}}</td>                                         
                                          <td>{{$row->date}}</td>
                                          @if ($row->status == 0)
                                            <td><span class="badge badge-warning">Pending</span></td>                                        
                                          @elseif($row->status == 1)
                                            <td><span class="badge badge-info">Payment Accepted</span></td>
                                          @elseif($row->status == 2)
                                            <td><span class="badge badge-secondary">Delivery Progress</span></td>
                                          @elseif($row->status == 3)
                                            <td><span class="badge badge-success">Delivery Done</span></td>
                                          @elseif($row->status == 4)
                                            <td><span class="badge badge-danger">Cancel</span></td>
                                          @elseif($row->status == 5)
                                            <td><span class="badge badge-primary">Pending Cancel Order Request</span></td>  

                                          @endif                                         
                                                                                  
                                          <td>{{$row->tracking_code}}</td>                                         
                                          <td>
                                              <a href="#" class="btn btn-sm btn-info">View</a>
                                            @if ($row->status != 3 && $row->status != 5)
                                              <a href="{{ url('cancel_order/'.$row->order_id) }}" class="btn btn-sm btn-danger">Cancel Order</a>
                                          {{--   @elseif($row->status == 5 )
                                              <a href="{{ url('cancel_order/'.$row->order_id) }}" class="btn btn-sm btn-danger">Pending Cancel Order Request</a>  --}}  
                                            @endif
                                          </td>                                         
                                        </tr>
                                        @endforeach
                                       
                        
                             
                                          
                                      </tbody>
                                    </table>
                                </div>
                               
                            </div>
                  
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="checkout__order">
                              <h6 style="margin: 0 auto">Customer Profile</h6>
                              <img style="display: block;margin: 0 auto;" src="{{asset('public/front_end/img/user.png')}}" alt="">

                                  <button class="btn btn-secondary" type="submit">{{$all_info->name}}</button>
                                  <p style="text-align: center;">{{$all_info->email}}</p>
                                  <a href="#" title="">Logout</a>
                            
                            </div>
                                
                        </div>
                    </div>
            
            </div>
        </div>
    </section>
@endsection