
  @extends('back_end.master')
  @section('dashboard')
  <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>SEO Setting</h3>
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
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ url('update_seo') }}">
                  @csrf
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Title</label>
                    <div class="col-lg-10">
                       <input type="hidden" name="id" value="{{$seo_data->id}}">
                      <input class=" form-control" name="title" value="{{$seo_data->title}}" type="text" required="" />
                    </div>
                  </div>
                   <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Share Title</label>
                    <div class="col-lg-10">
                      <input class=" form-control"  name="share_title" value="{{$seo_data->share_title}}" type="text"  />
                    </div>
                  </div>
                   <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">keywords</label>
                    <div class="col-lg-10">
                      <input class=" form-control" name="keyword" value="{{$seo_data->keyword}}" type="text"/>
                    </div>
                  </div>
                   <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Description</label>
                    <div class="col-lg-10">

                      <textarea class=" form-control" name="description" value="{{$seo_data->description}}" type="text">{{$seo_data->description}}</textarea>
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

