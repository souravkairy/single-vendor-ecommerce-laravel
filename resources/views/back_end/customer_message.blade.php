  @extends('back_end.master')
  @section('dashboard')


 <section class="wrapper">
        <h3 style="float: left;">Contact Message List</h3>

        
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel" style="padding: 20px;"> 
              
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="myTable">
                  <thead>
                    <tr>
                     
                      <th width="5%">No</th>
                      <th>Sender-Name</th>
                      <th>User-Email</th>
                      <th>Message</th>
                      <th width="20%">Action</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;

                     foreach ($new_messages as $row) {
                      # code...
                    ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $row->user_name; ?></td>
                      <td><?php echo $row->user_email; ?></td>
                      <td>{{$row->message}}</td>
                      
                      <td>
                        <a href="{{-- {{ url('Edit-Category/'.$row->id) }} --}}#" title="" class="btn btn-info">reply</a>
                        
                        <a href="{{-- {{ url('Delete-Category/'.$row->id) }} --}}#" title="" class="btn btn-danger">delete</a>
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

