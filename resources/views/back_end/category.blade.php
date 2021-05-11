  @extends('back_end.master')
  @section('dashboard')


 <section class="wrapper">
        <h3 style="float: left;"><i class="fa fa-angle-right"></i> Category table</h3>
        <button style="float: right;  margin-top: 15px;" class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">Add category</button>
        
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel" style="padding: 20px;"> 
              
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="myTable">
                  <thead>
                    <tr>
                     
                      <th width="5%">No</th>
                      <th>Category Name</th>
                      <th width="20%">Action</th>
                   
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;

                     foreach ($get_category as $row) {
                      # code...
                    ?>
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $row->category_name; ?></td>
                      
                      <td>
                        <a href="" title="" class="btn btn-success"><i class="fa fa-thumbs-up"></i></a>
                        <a href="" title="" class="btn btn-warning"><i class="fa fa-thumbs-down"></i></a>
                        <a href="{{ url('Edit-Category/'.$row->id) }}" title="" class="btn btn-info"><i class="fa fa-edit"></i></a>
                        
                        <a href="{{ url('Delete-Category/'.$row->id) }}" title="" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
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
         <form method="post" action="{{ url('save_category') }}">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category Name:</label>
            <input type="text" class="form-control" id="recipient-name" name="category_name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Category Description</label>
            <textarea class="form-control" id="message-text" name="category_desc"></textarea>
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

