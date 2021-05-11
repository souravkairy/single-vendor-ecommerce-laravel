  @extends('back_end.master')
  @section('dashboard')
  <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Add Product</h3>
        <div class="row mt">
          <div class="col-lg-8">
   {{--           <div style="color: green ;">
    <?php
        $message = $this->session->message;
        if (isset($message)) {
            echo $message;
            $this->session->unset_userdata('message');
        }
        else{
            $unmessage = $this->session->unseccessfullmessage; 
            echo $unmessage;
             // $this->session->unset_userdata('message');
        }


     ?>
 </div>  --}}
          
            <div class="form-panel" style="padding: 18px;">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ url('update_category') }}" enctype="multipart/form-data">

                  @csrf

                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Category Name</label>
                    <div class="col-lg-10">
                      <input type="hidden" name="id" value="{{$get_cat_data->id}}">
                      <input class=" form-control" id="firstname" name="category_name" type="text" value="{{$get_cat_data->category_name}}" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="email" class="control-label col-lg-2">Category Descriptions:</label>
                    <div class="col-lg-10">
                      <textarea class="form-control " name="category_desc">{{$get_cat_data->category_desc}}</textarea>                    
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit">Save</button>
                      <button class="btn btn-theme04" type="button">Cancel</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>
        <!-- /row -->
      </section>



      @endsection

