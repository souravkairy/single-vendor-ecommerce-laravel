  @extends('back_end.master')
  @section('dashboard')


 <section class="wrapper">
        <h3 style="float: left;">Cancel Orders</h3>
  
        
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel" style="padding: 20px;"> 
              
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

                     foreach ($cancel_order_request as $row) {
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
                      <td><span class="badge badge-warning">Pending Cancel Orders</span></td>
                      
                      <td>                       
                        <a href="{{ url('View-Order/'.$row->order_id) }}#" title="" class="btn btn-info">View</a>                       
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

