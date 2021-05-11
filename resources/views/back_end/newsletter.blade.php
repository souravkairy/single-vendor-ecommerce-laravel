@extends('back_end.master')
@section('dashboard')


<section class="wrapper">
      <h3 style="float: left;"><i class="fa fa-angle-right"></i>Subscribed customers</h3>


      <div class="row mt">
        <div class="col-lg-12">
          <div class="content-panel" style="padding: 20px;">

            <section id="unseen">
              <table class="table table-bordered table-striped table-condensed" id="myTable">
                <thead>
                  <tr>

                    <th width="5%">No</th>
                    <th>Email</th>
                    <th width="20%">Action</th>

                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;

                   foreach ($newsletter as $row) {
                    # code...
                  ?>
                  <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td>
                      <a href="#" title="" class="btn btn-info"><i class="fa fa-edit"></i></a>
                      <a href="#" title="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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



  </div>
</div>
</div>
    </section>

    @endsection

