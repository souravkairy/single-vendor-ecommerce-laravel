<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Image;

class Backend extends Controller
{

	public function AuthCheck()
    {
        $admin_name = Session::get('username');
        $email = Session::get('email');

        if ($admin_name) {
            return;
        }
        else
        {
            return Redirect::to('/admin')->send();
        }
    }
    public function index()
    {
    	$this->AuthCheck();
    	$sidebar = view('back_end.sidebar');
    	$dashboard = view('back_end.dashboard');
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$dashboard);

    }
    public function Category()
    {
    	$this->AuthCheck();

    	$get_category = DB::table('category')
    						->get();



    	$sidebar = view('back_end.sidebar');
    	$Category = view('back_end.category')
    					->with('get_category' , $get_category);
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$Category);
    }
    public function save_category(request $request)
    {
    	$this->AuthCheck();
    	 $validatedData = $request->validate([
        'category_name' => 'required|unique:category|max:55',
        'category_desc' => 'required',
    ]);
    	 $data = array();
    	 $data['category_name'] = $request->category_name;
    	 $data['category_desc'] = $request->category_desc;
    	 $data['status'] = 1;

    	 DB:: table('category') -> insert($data);
    	 // $notification = array(
    	 // 	'message' => 'category insert done',
    	 // 	'alert-type' => 'success'

    	 // );

    	 // return Redirect()->back()->with($notification);

    	  return Redirect()->back();

    }
    public function edit_category($id)
    {
    	$this->AuthCheck();

    	$get_cat_data = DB::table('category')
    						->where('id',$id)
    						->first();


    	$sidebar = view('back_end.sidebar');
    	$Category_data = view('back_end.edit_category')
    					->with('get_cat_data',$get_cat_data);
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$Category_data);
    }
    public function update_category(request $request)
    {
    	$this->AuthCheck();
    	 $data = array();
    	 $id = $request->id;
    	 $data['category_name'] = $request->category_name;
    	 $data['category_desc'] = $request->category_desc;
    	 $data['status'] = 1;

    	 DB:: table('category')
    	 			->where('id',$id)
    	 			->update($data);

    	return Redirect::to('Category');
    }

    public function delete_category($id)
    {
    	$this->AuthCheck();

    	DB::table('category')
    				->where('id',$id)
    				->delete();
    	return Redirect()->back();

    }

    public function sub_category()
    {
    	$this->AuthCheck();

    	$sub_category = DB::table('sub_category')
    					->join('category','sub_category.category_id','category.id')
    					->select('sub_category.*','category.category_name')
    					->get();
    	$category = DB::table('category')
    			        ->get();

    	$sidebar = view('back_end.sidebar');
    	$sub_category = view('back_end.sub_category')
    								->with('sub_category',$sub_category)
    								->with('category',$category);
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$sub_category);
    }
    public function save_sub_category(request $request)
    {
    	$this->AuthCheck();
    	 $validatedData = $request->validate([
        'sub_category_name' => 'required|unique:sub_category|max:55',
        'category_id' => 'required',

    ]);
    	 $data = array();
    	 $data['sub_category_name'] = $request->sub_category_name;
    	 $data['category_id'] = $request->category_id;
    	 $data['status'] = 1;

    	 DB:: table('sub_category') -> insert($data);
    	 // $notification = array(
    	 // 	'message' => 'category insert done',
    	 // 	'alert-type' => 'success'

    	 // );

    	 // return Redirect()->back()->with($notification);

    	  return Redirect()->back();

    }
    public function edit_sub_category($id)
    {
    	$this->AuthCheck();

    	$get_sub_cat_data = DB::table('sub_category')
                                ->where('id',$id)
                                ->first();
         $get_category = DB::table('category')
         						->get();

    	$sidebar = view('back_end.sidebar');
    	$Sub_category_data = view('back_end.edit_sub_category')
    					->with('get_sub_cat_data',$get_sub_cat_data)
    					->with('category',$get_category);
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$Sub_category_data);
    }
    public function update_sub_category(request $request)
    {
    	$this->AuthCheck();
    	 $data = array();
    	 $id = $request->id;
    	 $data['sub_category_name'] = $request->sub_category_name;
    	 $data['category_id'] = $request->category_id;
    	 $data['status'] = 1;

    	 DB:: table('sub_category')
    	 			->where('id',$id)
    	 			->update($data);

    	return Redirect::to('Sub-Category');
    }
    public function delete_sub_category($id)
    {
    	$this->AuthCheck();

    	DB::table('sub_category')
    				->where('id',$id)
    				->delete();
    	return Redirect()->back();

    }


    public function brand()
    {
    	$this->AuthCheck();
    	$get_brand = DB::table('brand')
    					->get();
    	$sidebar = view('back_end.sidebar');
    	$brand = view('back_end.brand')
    				->with('all_brand',$get_brand);
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$brand);
    }
    public function save_brand(request $request)
    {
    	$this->AuthCheck();
    	 $validatedData = $request->validate([
        'brand_name' => 'required|unique:brand|max:55',
        'brand_desc' => 'required',
    ]);
    	 $data = array();
    	 $data['brand_name'] = $request->brand_name;
    	 $data['brand_desc'] = $request->brand_desc;
    	 $data['status'] = 1;

    	 DB:: table('brand') -> insert($data);
    	 // $notification = array(
    	 // 	'message' => 'category insert done',
    	 // 	'alert-type' => 'success'

    	 // );

    	 // return Redirect()->back()->with($notification);

    	  return Redirect()->back();

    }
    public function edit_brand($id)
    {
    	$this->AuthCheck();

    	$get_brand_data = DB::table('brand')
    						->where('id',$id)
    						->first();


    	$sidebar = view('back_end.sidebar');
    	$Brand_data = view('back_end.edit_brand')
    					->with('get_brand_data',$get_brand_data);
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$Brand_data);
    }
    public function update_brand(request $request)
    {
    	$this->AuthCheck();
    	 $data = array();
    	 $id = $request->id;
    	 $data['brand_name'] = $request->brand_name;
    	 $data['brand_desc'] = $request->brand_desc;
    	 $data['status'] = 1;

    	 DB:: table('brand')
    	 			->where('id',$id)
    	 			->update($data);

    	return Redirect::to('Brand');
    }

    public function delete_brand($id)
    {
    	$this->AuthCheck();

    	DB::table('brand')
    				->where('id',$id)
    				->delete();
    	return Redirect()->back();

    }


    public function add_products()
    {
    	$this->AuthCheck();


    	$sidebar = view('back_end.sidebar');
    	$dashboard = view('back_end.add_product');
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$dashboard);
    }
    public function save_product(request $request)
    {
    	$this->validate($request,[

    		'p_name' => 'required|unique:product',
            'category_id' => 'required',
            // 'color' => 'required',
            // 'size' => 'required',
            // 'qty' => 'required',
            's_price' => 'required',
            'unit' => 'required',
            'c_price' => 'required',
            'p_desc' => 'required',
            'status' => 'required',
            'image1' => 'required',
    	]);
    	$data = array();
    	$data['p_name'] = $request->p_name;
        $data['category_id'] = $request->category_id;
        $data['sub_cat_id'] = $request->sub_cat_id;
        $data['brand_id'] = $request->brand_id;
        // $data['color'] = $request->color;
        // $data['size'] = $request->size;
        // $data['qty'] = $request->qty;
        $data['unit'] = $request->unit;
        $data['s_price'] = $request->s_price;
        $data['c_price'] = $request->c_price;
        $data['promo_code'] = $request->promo_code;
        $data['video'] = $request->video;
        $data['p_desc'] = $request->p_desc;
        $data['l_p'] = $request->l_p;
        $data['p_p'] = $request->p_p;
        // $data['t_p'] = $request->t_p;
        $data['status'] = $request->status;

        $image_one=$request->image1;
        $image_two=$request->image2;
        $image_three=$request->image3;

        if ($image_one && $image_two && $image_three) {
             $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(270,270)->save('public/product_image/'.$image_one_name);
                $data['image1']='public/product_image/'.$image_one_name;

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(270,270)->save('public/product_image/'.$image_two_name);
                $data['image2']='public/product_image/'.$image_two_name;

            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(270,270)->save('public/product_image/'.$image_three_name);
                $data['image3']='public/product_image/'.$image_three_name;

                $product=DB::table('product')
                          ->insert($data);

                Session::put('message','Product Saved Successfully !!');
                return Redirect::to('Add-Products');
        }
        elseif ($image_one && $image_two) {
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(270,270)->save('public/product_image/'.$image_one_name);
                $data['image1']='public/product_image/'.$image_one_name;

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(270,270)->save('public/product_image/'.$image_two_name);
                $data['image2']='public/product_image/'.$image_two_name;

                $product=DB::table('product')
                          ->insert($data);

                Session::put('message','Product Saved Successfully !!');
                return Redirect::to('Add-Products');

        }
         elseif ($image_one) {
            $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(270,270)->save('public/product_image/'.$image_one_name);
                $data['image1']='public/product_image/'.$image_one_name;

                $product=DB::table('product')
                          ->insert($data);

                Session::put('message','Product Saved Successfully !!');
                return Redirect::to('Add-Products');

        }
        else
        {
        	echo "vull";
            // return Redirect::to('Add-Products');
        }
    }
    public function delete_product($id)
    {
    	  $data =  DB::table('product')
                    ->where('id',$id)
                    ->first();

        $image1 =  $data->image1;
        $image2 =  $data->image2;
        $image3 =  $data->image3;

            if ($image1) {
           unlink($image1);
        }
        elseif ($image1 && $image2) {
             unlink($image1);
             unlink($image2);
        }
        elseif ($image1 && $image2 && $image3) {
            unlink($image1);
            unlink($image2);
            unlink($image3);
        }

        // unlink($image1);
        // unlink($image2);
        // unlink($image3);



        DB::table('product')->where('id',$id)->delete();
        return Redirect::to('All-Products');

    }
    public function all_products()
    {
    	$this->AuthCheck();
    	$sidebar = view('back_end.sidebar');
    	$dashboard = view('back_end.all_products');
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$dashboard);
    }
      public function f_products()
    {
    	$this->AuthCheck();
    	$sidebar = view('back_end.sidebar');
    	$dashboard = view('back_end.f_products');
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$dashboard);
    }
      public function l_products()
    {
    	$this->AuthCheck();
    	$sidebar = view('back_end.sidebar');
    	$dashboard = view('back_end.l_products');
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$dashboard);
    }
      public function t_products()
    {
    	$this->AuthCheck();
    	$sidebar = view('back_end.sidebar');
    	$dashboard = view('back_end.t_products');
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$dashboard);
    }
      public function r_products()
    {
    	$this->AuthCheck();
    	$sidebar = view('back_end.sidebar');
    	$dashboard = view('back_end.r_products');
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$dashboard);
    }
    public function coupon()
    {
    	$this->AuthCheck();

    	$get_coupon = DB::table('coupons')
    					->get();
    	$sidebar = view('back_end.sidebar');
    	$coupons = view('back_end.coupon')
    					->with('coupons',$get_coupon);
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$coupons);
    }
    public function save_coupons(request $request)
    {
    	$this->AuthCheck();
    	 $validatedData = $request->validate([
        'c_name' => 'required|unique:coupons|max:55',
        'c_type' => 'required',
        'c_ammount' => 'required',
    ]);
    	 $data = array();
    	 $data['c_name'] = $request->c_name;
    	 $data['c_type'] = $request->c_type;
    	 $data['c_ammount'] = $request->c_ammount;
    	 $data['status'] = 1;

    	 DB:: table('coupons') -> insert($data);
    	 // $notification = array(
    	 // 	'message' => 'category insert done',
    	 // 	'alert-type' => 'success'

    	 // );

    	 // return Redirect()->back()->with($notification);

    	  return Redirect()->back();

    }
    public function edit_coupons($id)
    {
    	// $this->AuthCheck();

    	// $get_brand_data = DB::table('brand')
    	// 					->where('id',$id)
    	// 					->first();


    	// $sidebar = view('back_end.sidebar');
    	// $Brand_data = view('back_end.edit_brand')
    	// 				->with('get_brand_data',$get_brand_data);
    	// return view('back_end.master')
    	// 			->with('sidebar',$sidebar)
    	// 			->with('dashboard',$Brand_data);
    }
    public function update_coupons(request $request)
    {
    	$this->AuthCheck();
    	//  $data = array();
    	//  $id = $request->id;
    	//  $data['brand_name'] = $request->brand_name;
    	//  $data['brand_desc'] = $request->brand_desc;
    	//  $data['status'] = 1;

    	//  DB:: table('brand')
    	//  			->where('id',$id)
    	//  			->update($data);

    	// return Redirect::to('Brand');
    }

    public function delete_coupons($id)
    {
    	$this->AuthCheck();

    	DB::table('coupons')
    				->where('id',$id)
    				->delete();
    	return Redirect()->back();

    }
    public function n_p_orders()
    {
        $this->AuthCheck();

        $n_p_orders = DB::table('order')
                            ->join('customer_info','order.c_id','customer_info.id')
                            ->select('customer_info.name','order.*')
                            ->where('order.status',0)
                            ->get();

        $sidebar = view('back_end.sidebar');
        $n_p_orders = view('back_end.n_p_orders')
                         ->with('n_p_orders',$n_p_orders);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$n_p_orders);
    }
    public function view_order($id)
    {
        $this->AuthCheck();

        $n_p_orders_details = DB::table('order_details')
                            ->where('order_details.order_id',$id)
                            ->join('product','order_details.product_id','product.id')
                            ->select('product.*','order_details.*')
                            ->get();

        $order_tbl = DB::table('order')->where('order_id',$id)->first();
        $shiping_details = DB::table('shipping')->where('order_id',$id)->first();

        $user_id = $order_tbl->c_id;

        $customer_info = DB::table('customer_info')->where('id',$user_id)->first();

        $sidebar = view('back_end.sidebar');
        $n_p_orders_details = view('back_end.n_p_orders_details')
                         ->with('n_p_orders_details',$n_p_orders_details)
                         ->with('order_tbl',$order_tbl)
                         ->with('customer_info',$customer_info)
                         ->with('shiping_details',$shiping_details);

        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$n_p_orders_details);
    }
    public function p_accepted($id)
    {
        DB::table('order')->where('order_id',$id)->update(['status'=>1]);
        return Redirect('New-Pending-Orders');
    }
    public function a_orders()
    {
        $this->AuthCheck();

        $f_a_orders = DB::table('order')
                            ->join('customer_info','order.c_id','customer_info.id')
                            ->select('customer_info.name','order.*')
                            ->where('order.status',1)
                            ->get();

        $sidebar = view('back_end.sidebar');
        $a_orders = view('back_end.a_orders')
                         ->with('n_p_orders',$f_a_orders);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$a_orders);
    }
    public function payment_complete_order_details($id)
    {
        $this->AuthCheck();

        $n_p_orders_details = DB::table('order_details')
                            ->where('order_details.order_id',$id)
                            ->join('product','order_details.product_id','product.id')
                            ->select('product.*','order_details.*')
                            ->get();

        $order_tbl = DB::table('order')->where('order_id',$id)->first();
        $shiping_details = DB::table('shipping')->where('order_id',$id)->first();

        $user_id = $order_tbl->c_id;

        $customer_info = DB::table('customer_info')->where('id',$user_id)->first();

        $sidebar = view('back_end.sidebar');
        $p_c_orders_details = view('back_end.p_c_orders_details')
                         ->with('n_p_orders_details',$n_p_orders_details)
                         ->with('order_tbl',$order_tbl)
                         ->with('customer_info',$customer_info)
                         ->with('shiping_details',$shiping_details);

        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$p_c_orders_details);

    }
    public function d_progress($id)
    {
        DB::table('order')->where('order_id',$id)->update(['status'=>2]);
        return Redirect('/Accept-Payments');
    }
    public function p_delivery()
    {
        $this->AuthCheck();

        $f_p_delivery = DB::table('order')
                            ->join('customer_info','order.c_id','customer_info.id')
                            ->select('customer_info.name','order.*')
                            ->where('order.status',2)
                            ->get();

        $sidebar = view('back_end.sidebar');
        $p_delivery = view('back_end.p_delivery')
                         ->with('n_p_orders',$f_p_delivery);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$p_delivery);
    }
    public function progress_delivery_order_details($id)
    {
        $this->AuthCheck();

        $n_p_orders_details = DB::table('order_details')
                            ->where('order_details.order_id',$id)
                            ->join('product','order_details.product_id','product.id')
                            ->select('product.*','order_details.*')
                            ->get();

        $order_tbl = DB::table('order')->where('order_id',$id)->first();
        $shiping_details = DB::table('shipping')->where('order_id',$id)->first();

        $user_id = $order_tbl->c_id;

        $customer_info = DB::table('customer_info')->where('id',$user_id)->first();

        $sidebar = view('back_end.sidebar');
        $d_p_order_details = view('back_end.d_p_order_details')
                         ->with('n_p_orders_details',$n_p_orders_details)
                         ->with('order_tbl',$order_tbl)
                         ->with('customer_info',$customer_info)
                         ->with('shiping_details',$shiping_details);

        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$d_p_order_details);

    }
    public function delivery_done($id)
    {
        DB::table('order')->where('order_id',$id)->update(['status'=>3]);
        return Redirect('/Progress-Delivery');
    }
    public function d_success()
    {
        $this->AuthCheck();

        $f_p_delivery = DB::table('order')
                            ->join('customer_info','order.c_id','customer_info.id')
                            ->select('customer_info.name','order.*')
                            ->where('order.status',3)
                            ->get();

        $sidebar = view('back_end.sidebar');
        $d_success = view('back_end.d_success')
                         ->with('n_p_orders',$f_p_delivery);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$d_success);
    }
    public function done_order_details($id)
    {
        $this->AuthCheck();

        $n_p_orders_details = DB::table('order_details')
                            ->where('order_details.order_id',$id)
                            ->join('product','order_details.product_id','product.id')
                            ->select('product.*','order_details.*')
                            ->get();

        $order_tbl = DB::table('order')->where('order_id',$id)->first();
        $shiping_details = DB::table('shipping')->where('order_id',$id)->first();

        $user_id = $order_tbl->c_id;

        $customer_info = DB::table('customer_info')->where('id',$user_id)->first();

        $sidebar = view('back_end.sidebar');
        $done_order_details = view('back_end.done_order_details')
                         ->with('n_p_orders_details',$n_p_orders_details)
                         ->with('order_tbl',$order_tbl)
                         ->with('customer_info',$customer_info)
                         ->with('shiping_details',$shiping_details);

        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$done_order_details);

    }
    public function c_orders()
    {
        $this->AuthCheck();

        $f_p_delivery = DB::table('order')
                            ->join('customer_info','order.c_id','customer_info.id')
                            ->select('customer_info.name','order.*')
                            ->where('order.status',4)
                            ->get();

        $sidebar = view('back_end.sidebar');
        $c_orders = view('back_end.c_orders')
                         ->with('n_p_orders',$f_p_delivery);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$c_orders);
    }
    public function cancel_orders($id)
    {
        DB::table('order')->where('order_id',$id)->update(['status'=>4]);
        return Redirect('New-Pending-Orders');
    }
    public function seo()
    {
        $this->AuthCheck();
        $seo_data =  DB::table('seo')->first();
        $sidebar = view('back_end.sidebar');
        $dashboard = view('back_end.seo')
                        ->with('seo_data',$seo_data);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$dashboard);
    }
    public function update_seo(request $request)
    {
        $id = $request->id;

        $data = array();
        $data['title'] = $request->title;
        $data['share_title'] = $request->share_title;
        $data['description'] = $request->description;
        $data['keyword'] = $request->keyword;

        DB::table('seo')->where('id',$id)->update($data);
        return Redirect('/SEO');


    }
    public function today_order()
    {
        $this->AuthCheck();
        $today = date('y-m-d');
        $today_order = DB::table('order')
                            ->join('customer_info','order.c_id','customer_info.id')
                            ->select('customer_info.name','order.*')
                            ->where('order.status',0)
                            ->where('order.date',$today)
                            ->get();

        $sidebar = view('back_end.sidebar');
        $t_orders = view('back_end.today_order')
                         ->with('t_order',$today_order);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$t_orders);
    }
    public function v_t_o_details($id)
    {
        $this->AuthCheck();

        $n_p_orders_details = DB::table('order_details')
                            ->where('order_details.order_id',$id)
                            ->join('product','order_details.product_id','product.id')
                            ->select('product.*','order_details.*')
                            ->get();

        $order_tbl = DB::table('order')->where('order_id',$id)->first();
        $shiping_details = DB::table('shipping')->where('order_id',$id)->first();

        $user_id = $order_tbl->c_id;

        $customer_info = DB::table('customer_info')->where('id',$user_id)->first();

        $sidebar = view('back_end.sidebar');
        $v_t_o_details = view('back_end.v_t_o_details')
                         ->with('n_p_orders_details',$n_p_orders_details)
                         ->with('order_tbl',$order_tbl)
                         ->with('customer_info',$customer_info)
                         ->with('shiping_details',$shiping_details);

        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$v_t_o_details);
    }
    public function today_delivery()
    {
        $this->AuthCheck();
        $today = date('y-m-d');
        $today_order = DB::table('order')
                            ->join('customer_info','order.c_id','customer_info.id')
                            ->select('customer_info.name','order.*')
                            ->where('order.status',3)
                            ->where('order.date',$today)
                            ->get();

        $sidebar = view('back_end.sidebar');
        $t_orders = view('back_end.today_order')
                         ->with('t_order',$today_order);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$t_orders);
    }
    public function this_month()
    {
        $this->AuthCheck();
        $this_month = date('F');
        $today_order = DB::table('order')
                            ->join('customer_info','order.c_id','customer_info.id')
                            ->select('customer_info.name','order.*')
                            ->where('order.status',3)
                            ->where('order.month',$this_month)
                            ->get();

        $sidebar = view('back_end.sidebar');
        $t_orders = view('back_end.today_order')
                         ->with('t_order',$today_order);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$t_orders);
    }
    public function data_search()
    {
        $this->AuthCheck();

        $sidebar = view('back_end.sidebar');
        $data_search = view('back_end.data_search');

        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$data_search);
    }
     public function search_by_date(request $request)
    {
        $this->AuthCheck();
        $dt = $request->date;
        $new_date = date("y-m-d", strtotime($dt));
        $today = date('y-m-d');
        $search_result = DB::table('order')
                            ->join('customer_info','order.c_id','customer_info.id')
                            ->select('customer_info.name','order.*')
                            ->where('order.status',3)
                            ->where('order.date',$new_date)
                            ->get();
        $total = DB::table('order')->where('date',$new_date)->where('status',3)->sum('total');
        $sidebar = view('back_end.sidebar');
        $t_orders = view('back_end.search_result')
                         ->with('t_order',$search_result)
                         ->with('total',$total);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$t_orders);
    }
    public function search_by_month(request $request)
    {
        $this->AuthCheck();
        $month = $request->month;




        $today = date('y-m-d');
        $search_result = DB::table('order')
                            ->join('customer_info','order.c_id','customer_info.id')
                            ->select('customer_info.name','order.*')
                            ->where('order.status',3)
                            ->where('order.month',$month)
                            ->get();
        $total = DB::table('order')->where('month',$month)->where('status',3)->sum('total');
        $sidebar = view('back_end.sidebar');
        $t_orders = view('back_end.search_result')
                         ->with('t_order',$search_result)
                         ->with('total',$total);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$t_orders);
    }

     public function search_by_year(request $request)
    {
        $this->AuthCheck();
        $year = $request->year;
        $search_result = DB::table('order')
                            ->join('customer_info','order.c_id','customer_info.id')
                            ->select('customer_info.name','order.*')
                            ->where('order.status',3)
                            ->where('order.year',$year)
                            ->get();
        $total = DB::table('order')->where('year',$year)->where('status',3)->sum('total');
        $sidebar = view('back_end.sidebar');
        $t_orders = view('back_end.search_result')
                         ->with('t_order',$search_result)
                         ->with('total',$total);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$t_orders);
    }
    public function all_user()
    {
        $this->AuthCheck();

        $get_all_user = DB::table('admin_user')
                            ->get();



        $sidebar = view('back_end.sidebar');
        $all_user = view('back_end.all_user')
                        ->with('get_all_user' , $get_all_user);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$all_user);
    }
    public function create_user()
    {
        $this->AuthCheck();
        $sidebar = view('back_end.sidebar');
        $all_user = view('back_end.create_user');
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$all_user);
    }
    public function add_user(request $request)
    {
        $data = array();
        $data['username'] = $request->username;

        $data['email'] = $request->email;
        $data['p_category'] = $request->p_category;
        $data['coupon'] = $request->coupon;
        $data['product'] = $request->product;
        $data['blog'] = $request->blog;
        $data['order'] = $request->order;
        $data['others'] = $request->others;
        $data['report'] = $request->report;
        $data['user_role'] = $request->user_role;
        $data['return_order'] = $request->return_order;
        $data['product_stock'] = $request->product_stock;
        $data['contact_message'] = $request->contact_message;
        $data['product_comment'] = $request->product_comment;
        $data['site_setting'] = $request->site_setting;
        $data['status'] = 1;

        $password = $request->password;
        $data['password'] = md5($password);

        DB::table('admin_user')->insert($data);
        return Redirect('/All-User');
    }
    public function site_setting()
    {
        $this->AuthCheck();

        $site_setting = DB::table('site_setting')->first();
        $sidebar = view('back_end.sidebar');
        $dashboard = view('back_end.site_setting')
                      ->with('site_setting' ,$site_setting);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$dashboard);
    }
    public function update_site_setting(request $request)
    {
        $id = $request->id;
        $data = array();
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['linkedin'] = $request->linkedin;
        $data['pinterest'] = $request->pinterest;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['status'] = 1;


        $old_one=$request->old1;
        $old_two=$request->old2;
        $old_two=$request->old3;

        $image_one=$request->banner1;
        $image_two=$request->banner2;
        $image_three=$request->main_logo;

        if ($image_one && $image_two &&  $image_three) {
             unlink($old_one);
             unlink($old_two);
             unlink($image_three);
             $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(570,270)->save('public/product_image/'.$image_one_name);
                $data['banner1']='public/product_image/'.$image_one_name;

            $image_two_name= hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
                Image::make($image_two)->resize(570,270)->save('public/product_image/'.$image_two_name);
                $data['banner2']='public/product_image/'.$image_two_name;
            $image_three_name= hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
                Image::make($image_three)->resize(119,50)->save('public/product_image/'.$image_three_name);
                $data['main_logo']='public/product_image/'.$image_three_name;


                $product=DB::table('site_setting')
                          ->where('id',$id)
                          ->update($data);

                // Session::put('message','Product Saved Successfully !!');
                return Redirect::to('site_setting');
        }




    }
    public function slider_setting()
    {
        $this->AuthCheck();

        $slider_setting = DB::table('home_slider')->first();

        $sidebar = view('back_end.sidebar');
        $dashboard = view('back_end.slider_setting')
                      ->with('slider_setting' ,$slider_setting);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$dashboard);
    }
    public function update_slider_setting(request $request)
    {
        $id = $request->id;
        $data = array();
        $data['heading1'] = $request->heading1;
        $data['main_heading'] = $request->main_heading;
        $data['heading2'] = $request->heading2;
        $data['button_text'] = $request->button_text;
        $data['image1'] = $request->image1;

        $old_one=$request->old1;
        $image_one=$request->image1;


        if ($image_one) {
             unlink($old_one);
             $image_one_name= hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
                Image::make($image_one)->resize(570,270)->save('public/product_image/'.$image_one_name);
                $data['image1']='public/product_image/'.$image_one_name;
                $product=DB::table('home_slider')
                          ->where('id',$id)
                          ->update($data);

                // Session::put('message','Product Saved Successfully !!');
                return Redirect::to('slider_setting');
        }




    }





    public function return_order_request()
    {
         $this->AuthCheck();

        $cancel_order_request = DB::table('order')
                                 ->join('customer_info','order.c_id','customer_info.id')
                                 ->select('customer_info.name','order.*')
                                 ->where('order.status',5)
                                 ->get();
        $sidebar = view('back_end.sidebar');
        $cancel_orders = view('back_end.cancel_order_request')
                        ->with('cancel_order_request' , $cancel_order_request);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$cancel_orders);
    }
    public function all_r_o_request()
    {
        $this->AuthCheck();

        $get_all_user = DB::table('order')
                            ->get();



        $sidebar = view('back_end.sidebar');
        $all_user = view('back_end.all_user')
                        ->with('get_all_user' , $get_all_user);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$all_user);
    }
    public function new_message()
    {
        $this->AuthCheck();

        $new_messages = DB::table('contact_info')->get();

        $sidebar = view('back_end.sidebar');
        $dashboard = view('back_end.customer_message')
                      ->with('new_messages' ,$new_messages);
        return view('back_end.master')
                    ->with('sidebar',$sidebar)
                    ->with('dashboard',$dashboard);
    }
    public function all_post()
    {
        $this->AuthCheck();

    	$post = DB::table('blog_post')
    						->get();
    	$sidebar = view('back_end.sidebar');
    	$blog_post = view('back_end.post')
    					->with('get_post' , $post);
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$blog_post);
    }
    public function save_post(request $request)
    {

        $data = array();
    	$data['heading'] = $request->heading;
        $data['desc'] = $request->desc;
        $data['date'] = date('y-m-d');
        $data['status'] = 1;


        $image =$request->image;
        $image_name= hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(370,266)->save('public/blog_image/'.$image_name);
        $data['image']='public/blog_image/'.$image_name;

        $success =DB::table('blog_post')
                      ->insert($data);
        if ($success) {
            Session::put('message','POST Saved Successfully !!');
            return Redirect::to('All-Post');
        }



    }
    public function Newslater()
    {
        $this->AuthCheck();

    	$newsletter = DB::table('newsletter')
    					->get();
    	$sidebar = view('back_end.sidebar');
    	$newsletter = view('back_end.newsletter')
    					->with('newsletter',$newsletter);
    	return view('back_end.master')
    				->with('sidebar',$sidebar)
    				->with('dashboard',$newsletter);
    }





}
