
  @extends('back_end.master')
  @section('dashboard')
  <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Site Setting</h3>
        <div class="row mt">
          <div class="col-lg-8">
            <div class="form-panel" style="padding: 18px;">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ url('update_site_setting') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group ">
                    <label for="facebook" class="control-label col-lg-2">Facebook Link</label>
                    <div class="col-lg-10">
                      <input type="hidden" name="id" value="{{$site_setting->id}}">
                      <input class=" form-control" id="facebook" name="facebook" type="text" required="" value="{{$site_setting->facebook}}" />
                    </div>
                  </div>
                     <div class="form-group ">
                    <label for="twitter" class="control-label col-lg-2">Twitter Link</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="twitter" name="twitter" type="text" required="" value="{{$site_setting->twitter}}" />
                    </div>
                  </div>
                     <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">linkedin Link</label>
                    <div class="col-lg-10">
      
                      <input class=" form-control" id="linkedin" name="linkedin" type="text" required="" value="{{$site_setting->linkedin}}" />
                    </div>
                  </div>
                     <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Pinterest Link</label>
                    <div class="col-lg-10">
                   
                      <input class=" form-control" id="firstname" name="pinterest" type="text" required="" value="{{$site_setting->pinterest}}" />
                    </div>
                  </div>
                     <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Email Id</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="firstname" name="email" type="text" required="" value="{{$site_setting->email}}" />
                    </div>
                  </div>
                     <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Phone Number</label>
                    <div class="col-lg-10">
                   
                      <input class=" form-control" id="phone" name="phone" type="text" required="" value="{{$site_setting->phone}}" />
                    </div>
                  </div>
                     <div class="form-group ">
                    <label for="address" class="control-label col-lg-2">Address</label>
                    <div class="col-lg-10">
                   
                      <input class=" form-control" id="address" name="address" type="text" required="" value="{{$site_setting->address}}" />
                    </div>
                  </div>
                <div class="form-group last">
                  <label class="control-label col-md-3">Main Site Logo</label>
                  <div class="col-lg-4 col-sm-3">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <input type="hidden" name="old3" value="{{$site_setting->main_logo}}">
                        <input type="file" class="btn btn-theme04" name="main_logo" required=""/>                  
                      </div>
                        <img src="{{asset($site_setting->main_logo)}}" style="height: 37px; width: 80px;">
                    </div>
               
                  </div>
                </div>
                <div class="form-group last">
                  <label class="control-label col-md-3">Banner Image 1</label>
                  <div class="col-lg-4 col-sm-3">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <input type="hidden" name="old1" value="{{$site_setting->banner1}}">
                        <input type="file" class="btn btn-theme04" name="banner1" required=""/>                  
                      </div>
                        <img src="{{asset($site_setting->banner1)}}" style="height: 37px; width: 80px;">
                    </div>
               
                  </div>
                </div>
                <div class="form-group last">
                  <label class="control-label col-md-3">Banner Image 2</label>
                  <div class="col-lg-4 col-sm-3">
                    <div class="fileupload fileupload-new" data-provides="fileupload">
                      
                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>
                        <input type="hidden" name="old2" value="{{$site_setting->banner2}}">
                        <input type="file" class="btn btn-theme04" name="banner2" required="" />                  
                      </div>
                      <img src="{{asset($site_setting->banner2)}}" style="height: 37px; width: 80px;">
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

