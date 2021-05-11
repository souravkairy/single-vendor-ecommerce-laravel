  @extends('back_end.master')
  @section('dashboard')


<section class="wrapper site-min-height">
        <div class="row">
          <div class="col-lg-12">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4>Order details</h4>
                  <hr>
                </div>
                <div class="icn-main-container">
                  <span class="icn-container">{{ sizeof($n_p_orders_details)}}P</span>
                </div>
                <ul class="pricing">
                  <li>Name : {{$customer_info->name}}</li>
                  <li>Email : {{$customer_info->email}}</li>
                  <li>Payment : {{$order_tbl->payment_method}}</li>
                  <li>Paymetnt Id : {{$order_tbl->payment_id}}</li>
                  <li>Total : {{$order_tbl->total}}</li>
                  <li>Month : {{$order_tbl->month}}</li>
                  <li>Date : {{$order_tbl->date}}</li>
                </ul>
                <a class="btn btn-theme" href="{{ url('Delivery-Progress/'.$order_tbl->order_id) }}">Delivery Progress</a>
                 
              </div>
              <!-- end custombox -->
            </div>
            <!-- end col-4 -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="custom-box">
                <div class="servicetitle">
                  <h4>Shipping Details</h4>
                  <hr>
                </div>
                <div class="icn-main-container">
                  <span class="icn-container">{{$order_tbl->total}}</span>
                </div>
               
                <ul class="pricing">
                  <li>Name : {{$shiping_details->first_name}} {{$shiping_details->last_name}}</li>
                  <li>Country : {{$shiping_details->country}}</li>
                  <li>Town : {{$shiping_details->town}}</li>
                  <li>Address : {{$shiping_details->address1}}</li>
                  <li>Post Code : {{$shiping_details->post_code}}</li>
                  <li>Phone : {{$shiping_details->phone}}</li>
                  <li>Email : {{$shiping_details->email}}</li>
                  <li>Status  : <span class="badge badge-warning">Payment Accepted</span></li>
                  <li>Note : {{$shiping_details->notes}}</li>
             
                </ul>
              </div>
              <!-- end custombox -->
            </div>
            <!-- end col-4 -->
            
            <!-- end col-4 -->
          </div>
          <!--  /col-lg-12 -->
        </div>
        <!--  /row -->

            <h3 style="float: left;">Accepted Orders</h3>
       {{--  <button style="float: right;  margin-top: 15px;" class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Add Coupons</button> --}}
        
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel" style="padding: 20px;"> 
              
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="myTable">
                  <thead>
                    <tr>
                      <th width="5%">No</th>
                      <th>Product Name</th>
                      <th>Image</th>
                      <th>Color</th>
                      <th>Size</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;

                     foreach ($n_p_orders_details as $row) {
                      # code...
                    ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><img style="height: 50px; width :50px ;" src="<?php echo asset($row->image1)?>" alt=""></td>
                      <td><?php echo $row->p_name; ?></td>
                      <td><?php echo $row->color; ?></td>
                      <td><?php echo $row->size; ?></td>
                      <td><?php echo $row->s_price; ?></td>
                    </tr>
                  <?php $i++;  } ?> 
           
                  </tbody>
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>
      </section>

      @endsection

