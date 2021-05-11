    @extends('back_end.master')
    @section('sidebar')


    <?php
      $username = Session::get('username');
      $user = DB::table('admin_user')->where('username',$username)->first();


    ?>

    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="{{asset('public/back_end/img/ui-sam.jpg')}}" class="img-circle" width="80"></a></p>
          <h5 class="centered">{{Session::get('username')}}</h5>
          <li class="mt">
            <a class="active" href="{{url('admin_dashboard')}}">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          @if ($user->p_category == 1)
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bars"></i>
              <span>Product Category</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('Category') }}">Category</a></li>
              <li><a href="{{ url('Sub-Category') }}">Sub-Category</a></li>
              <li><a href="{{ url('Brand') }}">Brand</a></li>

            </ul>
          </li>
          @else
          @endif
         @if ($user->coupon == 1)
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bars"></i>
              <span>Coupons</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('Coupon') }}">Coupons</a></li>

            </ul>
          </li>
          @else
          @endif

         @if ($user->blog == 1)
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bars"></i>
              <span>Blogs</span>
              </a>
            <ul class="sub">
              {{-- <li><a href="#">Category</a></li> --}}
              <li><a href="{{ url('All-Post') }}">All-Post</a></li>


            </ul>
          </li>
          @else
          @endif
          @if ($user->product == 1)
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-briefcase"></i>
              <span>Products</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('Add-Products') }}">Add Products</a></li>
              <li><a href="{{ url('All-Products') }}">All Products</a></li>
              <li><a href="{{ url('Features-Product') }}">Features Product</a></li>
              <li><a href="{{ url('Latest-Product') }}">Latest Product</a></li>
              <li><a href="{{ url('Top-Products') }}">Top Products</a></li>
              <li><a href="{{ url('Review-Products') }}">Review Products</a></li>


            </ul>
          </li>
          @else
          @endif
          {{-- @if ($user->product_stock == 1)
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bars"></i>
              <span>Product Stock</span>
              </a>
            <ul class="sub">
              <li><a href="#">Stock</a></li>
            </ul>
          </li>
          @else
          @endif --}}
          @if ($user->order == 1)
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-money"></i>
              <span>Orders</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('New-Pending-Orders') }}">New Pending Order</a></li>
              <li><a href="{{ url('Accept-Payments') }}">Accept Payments</a></li>
              <li><a href="{{ url('Progress-Delivery') }}">Progress Delivery</a></li>
              <li><a href="{{ url('Delivery-Success') }}">Delivery Success</a></li>
              <li><a href="{{ url('Cancel-Orders') }}">Cancel Orders</a></li>

            </ul>
          </li>
          @else
          @endif
           @if ($user->return_order == 1)
            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bars"></i>
              <span>Return Order</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('return_order_request') }}">Return Request</a></li>
              {{-- <li><a href="{{ url('all_r_o_request') }}">All-Returns</a></li> --}}

            </ul>
          </li>
          @else
          @endif

          @if ($user->report == 1)
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-money"></i>
              <span>Reports</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('Todays-Orders') }}">Today's Order</a></li>
              <li><a href="{{ url('Todays-Delivered') }}">Today's delivered</a></li>
              <li><a href="{{ url('This-Month') }}">This Month</a></li>
              <li><a href="{{ url('Data-Search') }}">Search Report</a></li>
            </ul>
          </li>
          @else
          @endif
          {{-- @if ($user->others == 1)
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bars"></i>
              <span>Others</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('Newslater') }}">Newslater</a></li>
              <li><a href="{{ url('SEO') }}">SEO</a></li>

            </ul>
          </li>
          @else
          @endif --}}
          @if ($user->mail == 1)
          <li>
            <a href="{{ url('Newslater') }}">
              <i class="fa fa-envelope"></i>
              <span>Newslater </span>
              <!-- <span class="label label-theme pull-right mail-info">2</span> -->
              </a>
          </li>
          @else
          @endif
          @if ($user->mail == 1)
          <li>
            <a href="{{ url('SEO') }}">
              <i class="fa fa-search"></i>
              <span>SEO </span>
              <!-- <span class="label label-theme pull-right mail-info">2</span> -->
              </a>
          </li>
          @else
          @endif

          @if ($user->user_role == 1)
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bars"></i>
              <span>User Role</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('Create-User') }}">Create User</a></li>
              <li><a href="{{ url('All-User') }}">All-User</a></li>

            </ul>
          </li>
          @else
          @endif
          {{-- @if ($user->contact_message  == 1)
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bars"></i>
              <span>Contact Message</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('new_message') }}">New-Message</a></li>
               <li><a href="#">All-Message</a></li>
            </ul>
          </li>
          @else
          @endif --}}
          {{-- @if ($user->product_comment == 1)
            <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-bars"></i>
              <span>Product-Comment</span>
              </a>
            <ul class="sub">
              <li><a href="#">New-Comment</a></li>
              <li><a href="#">All-Comment</a></li>
            </ul>
          </li>
          @else
          @endif --}}
           @if ($user->site_setting == 1)
              <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Site Setting</span>
              </a>
            <ul class="sub">
              <li><a href="{{ url('site_setting') }}">Site Setting</a></li>
              <li><a href="{{ url('slider_setting') }}">Slider(Home-Page)</a></li>

            </ul>
          </li>
       @else
          @endif
      @if ($user->mail == 1)
          <li>
            <a href="{{ url('new_message') }}">
              <i class="fa fa-envelope"></i>
              <span>Message</span>
              <!-- <span class="label label-theme pull-right mail-info">2</span> -->
              </a>
          </li>
          @else
          @endif
     {{-- @if ($user->chat_room == 1)
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-comments-o"></i>
              <span>Chat Room</span>
              </a>
            <ul class="sub">
              <li><a href="lobby.html">Lobby</a></li>
              <li><a href="chat_room.html"> Chat Room</a></li>
            </ul>
          </li>
     @else
          @endif --}}

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    @endsection
