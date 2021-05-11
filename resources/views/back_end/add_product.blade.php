  @php
    $get_category = DB::table('category')
                ->get();
    $get_sub_category = DB::table('sub_category')
                  ->get();
    $get_brand = DB::table('brand')
              ->get();
  @endphp



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
                <form class="cmxform form-horizontal style-form" id="signupForm" method="post" action="{{ url('save_product') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Product Name</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="firstname" name="p_name" type="text" required="" />
                    </div>
                  </div>


                   <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Category & Sub-category</label>
                    <div class="col-lg-5">
                      <select class=" form-control" name="category_id" required="">
                        <option value="">Select Category</option>
                        <?php
                        foreach ($get_category as $row) {  ?>
                          <option value="<?php echo $row->id ?>"><?php echo $row->category_name ?></option>



                        <?php } ?>
                      </select>

                    </div>
                  <div class="col-lg-5">
                      <select class=" form-control" name="sub_cat_id" >
                        <option value="">Select Sub-Category</option>
                         <?php
                         foreach ($get_sub_category as $row) {  ?>
                          <option value="<?php echo $row->id ?>"><?php echo $row->sub_category_name ?></option>

                        <?php } ?>
                      </select>
                    </div>
                  </div>


                   <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Select Brand</label>
                    <div class="col-lg-10">
                     <select class=" form-control" name="brand_id">
                        <option value="">Select Brand</option>
                            <?php
                        foreach ($get_brand as $row) {  ?>
                          <option value="<?php echo $row->id ?>"><?php echo $row->brand_name ?></option>

                        <?php } ?>
                      </select>
                    </div>
                  </div>
                   {{-- <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Color</label>
                    <div class="col-lg-10">
                      <input class=" form-control" id="firstname" name="color" type="text" required="" />
                    </div>
                  </div> --}}
                   {{-- <div class="form-group ">
                    <label for="firstname" class="control-label col-lg-2">Size</label>
                    <div class="col-lg-4">
                      <input class=" form-control" id="firstname" name="size" type="text" required="" />
                    </div>
                     <label for="firstname" class="control-label col-lg-2">Quantity</label>
                    <div class="col-lg-4">
                      <input class=" form-control" id="firstname" name="qty" type="text" required="" />
                    </div>
                  </div> --}}
                  <div class="form-group ">
                    <label for="lastname" class="control-label col-lg-2">Selling Price</label>
                    <div class="col-lg-4">
                      <input class=" form-control" id="lastname" name="s_price" type="number" required="" />
                    </div>
                    <label for="username" class="control-label col-lg-2">Unit Type</label>
                    <div class="col-lg-4">
                     <select class=" form-control" name="unit">
                          <option value="">Select Unit</option>
                          <option value="1">Per Piece</option>
                          <option value="2">Kg</option>


                      </select>
                    </div>
                  </div>

                  <div class="form-group ">
                    <label for="password" class="control-label col-lg-2">Promo code</label>
                    <div class="col-lg-4">
                      <input class="form-control " id="password" name="promo_code" type="text" />
                    </div>
                      <label for="username" class="control-label col-lg-2">Cost Price</label>
                    <div class="col-lg-4">
                      <input class="form-control " id="username" name="c_price" type="number" required="" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="confirm_password" class="control-label col-lg-2">Video</label>
                    <div class="col-lg-10">
                      <input class="form-control " id="confirm_password" name="video" type="text" required="" />
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="email" class="control-label col-lg-2">Product Descriptions:</label>
                    <div class="col-lg-10">
                      <textarea class="form-control " name="p_desc" required=""></textarea>
                    </div>
                  </div>
                  <div class="form-group ">
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Popular Product</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="p_p" value="1" />
                    </div>
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Feature Product</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="l_p" value="1" />
                    </div>
                  </div>
                      <div class="form-group ">
                    {{-- <label for="agree" class="control-label col-lg-2 col-sm-3">Top Product</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="t_p" value="1" />
                    </div> --}}
                    <label for="agree" class="control-label col-lg-2 col-sm-3">Status</label>
                    <div class="col-lg-4 col-sm-3">
                      <input type="checkbox" style="width: 20px" class="checkbox form-control" id="agree" name="status"value="1" required="" />
                    </div>
                  </div>

                <div class="form-group last">
                  <label class="control-label col-md-3">Main Image</label>
                  <div class="col-lg-4 col-sm-3">
                    <div class="fileupload fileupload-new" data-provides="fileupload">

                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>

                        <input type="file" class="btn btn-theme04" name="image1" required="" />

                       <!--  <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a> -->
                      </div>
                    </div>

                  </div>
                </div>
                  <div class="form-group last">
                  <label class="control-label col-md-3">Secondary Image-1</label>
                  <div class="col-lg-4 col-sm-3">
                    <div class="fileupload fileupload-new" data-provides="fileupload">

                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>

                        <input type="file" class="btn btn-theme04" name="image2" />

                       <!--  <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a> -->
                      </div>
                    </div>

                  </div>
                </div>
                  <div class="form-group last">
                  <label class="control-label col-md-3">Secondary Image-2</label>
                  <div class="col-lg-4 col-sm-3">
                    <div class="fileupload fileupload-new" data-provides="fileupload">

                      <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                      <div>

                        <input type="file" class="btn btn-theme04" name="image3" />

                       <!--  <a href="advanced_form_components.html#" class="btn btn-theme04 fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash-o"></i> Remove</a> -->
                      </div>
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

