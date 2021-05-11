  @extends('back_end.master')
  @section('dashboard')


 <section class="wrapper">
        <h3 style="float: left;">Report</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel" style="padding: 20px;"> 
              <h3>Total Sell : {{$total}}</h3>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="myTable">
                  <thead>
                    <tr>
                     
                      <th width="5%">No</th>
                      <th>Customer Name</th>
                      <th>Payment Type</th>
                      <th>Sub-Total</th>
                      <th>Sh-Charge</th>
                      <th>Vat</th>
                    
                      <th>Amount</th>
                      <th>Order Date</th>
                      <th>Status</th>
                      <th width="5%">Action</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;

                     foreach ($t_order as $row) {
                      # code...
                    ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $row->name; ?></td>
                      <td><?php echo $row->payment_method; ?></td>
                      <td><?php echo $row->sub_total; ?></td>
                      <td><?php echo $row->shipping_cost; ?></td>
                      <td><?php echo $row->vat; ?></td>
                     
                      <td><?php echo $row->total; ?></td>
                      <td><?php echo $row->date; ?></td>
                      <td>  
                           @if($row->status == 0)
                           <span class="badge badge-warning">Pending</span>
                           @elseif($row->status == 1)
                           <span class="badge badge-info">Payment Accept</span>
                           @elseif($row->status == 2) 
                           <span class="badge badge-info">Progress </span>
                           @elseif($row->status == 3)  
                           <span class="badge badge-success">Delevered </span>
                           @else
                           <span class="badge badge-danger">Cancel </span>
                           @endif
                      </td>
                      
                      <td>                       
                        <a href="{{ url('View-Today-Order-Details/'.$row->order_id) }}" title="" class="btn btn-info">View</a>                       
                      </td>
           
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

