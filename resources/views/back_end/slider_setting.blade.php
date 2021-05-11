
  @extends('back_end.master')
  @section('dashboard')
  <section class="wrapper">
        <h3>Home Page Slider Setting</h3>
        <div class="row mt">
          <div class="col-lg-8">
            <div class="form-panel" style="padding: 18px;">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ url('update_slider_setting') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group ">
                    <label for="facebook" class="control-label col-lg-2">Heading One</label>
                    <div class="col-lg-10">
                      <input type="hidden" name="id" value="{{$slider_setting->id}}">
                      <input class=" form-control" id="facebook" name="heading1" type="text" required="" value="{{$slider_setting->heading1}}" />
                    </div>
                  </div>
                     <div class="form-group ">
                    <label for="twitter" class="control-label col-lg-2">Main Heading</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="twitter" name="main_heading" type="text" required="" value="{{$slider_setting->main_heading}}" />
                    </div>
                  </div>
                     <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Heading Two</label>
                    <div class="col-lg-10">
      
                      <input class=" form-control" id="linkedin" name="heading2" type="text" required="" value="{{$slider_setting->heading2}}" />
                    </div>
                  </div>
                     <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Button Text</label>
                    <div class="col-lg-10">
                   
                      <input class=" form-control" id="firstname" name="button_text" type="text" required="" value="{{$slider_setting->button_text}}" />
                    </div>
                  </div>
                     
                     
                     
                <div class="form-group last">
                  <label class="control-label col-md-3">Main Slider Logo</label>
                  <div class="col-lg-4 col-sm-3">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <input type="hidden" name="old1" value="{{$slider_setting->image1}}">
                        <input type="file" class="btn btn-theme04" name="image1"/>                  
                      </div>
                        <img src="{{asset($slider_setting->image1)}}" style="height: 37px; width: 80px;">
                    </div>
               
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

