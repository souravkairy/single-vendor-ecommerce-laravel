  @extends('back_end.master')
  @section('dashboard')

 <section class="wrapper">

        <h3 style="float: left;"><i class="fa fa-angle-right"></i>Product table</h3>
        <a style="float: right;  margin-top: 15px;" href="#" class="btn btn-primary">Add Products</a>
        
        
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel" style="padding: 20px;">
              
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="myTable">
                  <thead>
                    <tr> 
                     
                      <th width="3%">No</th>
                      <th>Image</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Sub-Category</th>
                      <th>Brand</th>
                      <th>QTY</th>
                      <th>CP</th>
                      <th>SP</th>
                      <th width="20%">Action</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                   {{--  <?php
                    $i = 1;

                     foreach ($all_products as $row) {
                      # code...
                    ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><img style="height: 50px; width :50px ;" src="<?php echo $row->image1 ?>" alt=""></td>
                      <td><?php echo $row->p_name; ?></td>
                      <td><?php echo $row->category_name ?></td>
                      <td><?php echo $row->sub_cat_name ?></td>
                      <td><?php echo $row->brand_name ?></td>
                      <td><?php echo $row->quantity?></td>
                      <td><?php echo $row->c_price?></td>
                      <td><?php echo $row->s_price?></td>
                      
                      <td>
                        <a href="" title="" class="btn btn-success"><i class="fa fa-thumbs-up"></i></a>
                        <a href="" title="" class="btn btn-warning"><i class="fa fa-thumbs-down"></i></a>
                        <a href="" title="" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        
                        <a href="" title="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                      </td>
           
                    </tr>
                  <?php $i++;  } ?> --}}
           
                  </tbody>
                </table>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>
        <!-- /row -->
      
        <!-- /row -->
    
      </section>

      @endsection

