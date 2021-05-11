  @extends('back_end.master')
  @section('dashboard')


 <section class="wrapper">
        <h3 style="float: left;"><i class="fa fa-angle-right"></i> Coupons table</h3>
        <button style="float: right;  margin-top: 15px;" class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Add Coupons</button>

        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel" style="padding: 20px;">

              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="myTable">
                  <thead>
                    <tr>

                      <th width="5%">No</th>
                      <th>Coupons Name</th>
                      <th>Type</th>
                      <th>Amount/Percentage</th>
                      <th width="20%">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;

                     foreach ($coupons as $row) {
                      # code...
                    ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $row->c_name; ?></td>
                      <td><?php
                          if ($row->c_type == 1) {
                            echo "Flat";
                          }
                          else
                          {
                            echo "Percentage";
                          }


                       ?></td>
                      <td><?php echo $row->c_ammount; ?></td>

                      <td>
                        <a href="" title="" class="btn btn-success"><i class="fa fa-thumbs-up"></i></a>
                        <a href="" title="" class="btn btn-warning"><i class="fa fa-thumbs-down"></i></a>
                        <a href="{{ url('Edit-Coupons/'.$row->c_id) }}" title="" class="btn btn-info"><i class="fa fa-edit"></i></a>

                        <a href="{{ url('Delete-Coupons/'.$row->c_id) }}" title="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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
        <!-- /row -->

        <!-- /row -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Coupons</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
      <div class="modal-body">
         <form method="post" action="{{ url('save_coupons') }}">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Coupons Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="c_name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Coupons Type:</label>
            <select class="form-control" name="c_type" >
              <option value="">Select Coupon Type</option>
              <option value="1">Flat</option>
              <option value="2">Percentage</option>
            </select>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Discount Amount/Percentage</label>
            <input type="text" class="form-control" id="recipient-name" name="c_ammount">

          </div>
          <div class="modal-footer">
        <button type="close" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
        </form>
      </div>

    </div>
  </div>
</div>
      </section>

      @endsection

