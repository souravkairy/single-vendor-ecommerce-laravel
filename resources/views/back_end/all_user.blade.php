  @extends('back_end.master')
  @section('dashboard')


 <section class="wrapper">
        <h3 style="float: left;"><i class="fa fa-angle-right"></i> Category table</h3>
        <button style="float: right;  margin-top: 15px;" class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Add User</button>
        
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel" style="padding: 20px;"> 
              
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="myTable">
                  <thead>
                    <tr>
                     
                      <th width="5%">No</th>
                      <th>User-Name</th>
                      <th>User-Email</th>
                      <th>Role</th>
                      <th width="20%">Action</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;

                     foreach ($get_all_user as $row) {
                      # code...
                    ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $row->username; ?></td>
                      <td><?php echo $row->email; ?></td>
                      <td> <span class="badge badge-success">Admin </span></td>
                      
                      <td>
                        <a href="{{ url('Edit-Category/'.$row->id) }}" title="" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        
                        <a href="{{ url('Delete-Category/'.$row->id) }}" title="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                      </td>
           
                    </tr>
                  <?php $i++;  } ?>
                  </tbody>
                </table>
              </section>
            </div>
          </div>
        </div>
      </section>

      @endsection

