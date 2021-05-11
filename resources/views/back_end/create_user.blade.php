  @extends('back_end.master')
  @section('dashboard')
  <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i>Add New User</h3>
        <div class="row mt">
          <div class="col-lg-10">         
            <div class="form-panel" style="padding: 18px;">
              <div class="form">
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ url('add_user') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">User Name</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="firstname" name="username" type="text" required="" />
                    </div>
                  </div>
                   <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Password</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="firstname" name="  password" type="password" required="" />
                    </div>
                  </div>
                   <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Email</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="firstname" name="email" type="text" required="" />
                    </div>
                  </div>
               
                   <div class="form-group ">
                    <label for="agree" class="control-label col-lg-2 ">Product Category</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="p_category" value="1" />
                    </div>
                    <label for="agree" class="control-label col-lg-2 ">Coupons</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="coupon" value="1" />
                    </div>
                  </div>
                    <div class="form-group ">
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Products</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="product" value="1" />
                    </div>
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Blogs</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="blog" value="1" />
                    </div>
                  </div>
                       <div class="form-group ">
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Orders</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="order" value="1" />
                    </div>
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Other</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="  others" value="1" />
                    </div>
                  </div>
                       <div class="form-group ">
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Report</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="report" value="1" />
                    </div>
                    <label for="agree" class="control-label col-lg-2 col-sm-3">User Role</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="user_role" value="1" />
                    </div>
                  </div>
                    <div class="form-group ">
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Return Order</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="return_order" value="1" />
                    </div>
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Product Stock</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="product_stock" value="1" />
                    </div>
                  </div>

                    <div class="form-group ">
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Contact Message</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="contact_message" value="1" />
                    </div>
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Product Comment</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="product_comment" value="1" />
                    </div>
                  </div>
                    <div class="form-group ">
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Site Setting</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="site_setting" value="1" />
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

