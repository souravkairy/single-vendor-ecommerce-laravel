<?php

namespace App\Http\Controllers;

use Cart;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class Frontend extends Controller
{
    public function index()
    {

        $seoData = DB::table('seo')->first();
        $site_setting = DB::table('site_setting')->first();


        //seo
        SEOMeta::setTitle($seoData->title);
        SEOMeta::setDescription($seoData->description);
        SEOMeta::setCanonical('http://ogani.mypprojects.com/');

        OpenGraph::setDescription($seoData->description);
        OpenGraph::setTitle($seoData->share_title);
        OpenGraph::setUrl('http://ogani.mypprojects.com/');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle($seoData->title);
        TwitterCard::setSite($seoData->title);

        JsonLd::setTitle($seoData->title);
        JsonLd::setDescription($seoData->description);
        JsonLd::addImage($site_setting->main_logo);



        $header = view('front_end.header');
        $cat_slider = view('front_end.cat_slider');
        $slider_two = view('front_end.slider_two');
        $f_products = view('front_end.f_products');
        $banner_one = view('front_end.banner_one');
        $another_products = view('front_end.another_products');
        $blog = view('front_end.blog');
        $footer = view('front_end.footer');
        return view('front_end.master')
            ->with('header', $header)
            ->with('cat_slider', $cat_slider)
            ->with('slider_two', $slider_two)
            ->with('f_products', $f_products)
            ->with('banner_one', $banner_one)
            ->with('another_products', $another_products)
            ->with('blog', $blog)
            ->with('footer', $footer);
    }
    public function login()
    {
        $header = view('front_end.header');
        $login = view('front_end.login');
        $footer = view('front_end.footer');
        return view('front_end.master')
            ->with('header', $header)
            ->with('login', $login)
            ->with('footer', $footer);

    }
    public function profile()
    {
        $header = view('front_end.header');
        $profile = view('front_end.profile');
        $footer = view('front_end.footer');
        return view('front_end.master')
            ->with('header', $header)
            ->with('f_products', $profile)
            ->with('footer', $footer);
    }
    public function cancel_request($id)
    {
        DB::table('order')->where('order_id', $id)->update(['status' => 5]);
        return Redirect()->back();
    }
    public function sign_up(request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'user_name' => 'required',
            'password' => 'required',
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['user_name'] = $request->user_name;
        $data['status'] = 1;
        $password = $request->password;

        $data['password'] = md5($password);

        DB::table('customer_info')->insert($data);
        $last = DB::getPdo()->lastInsertId();

        $result = DB::table('customer_info')->where('id', $last)
            ->first();

        if ($result) {
            session::put('name', $result->name);
            session::put('user_name', $result->user_name);

            session::put('id', $result->id);
            session::put('email', $result->email);

            return Redirect::to('/');
        } else {
            return Redirect::to('/');

        }
    }
    public function login_auth(request $request)
    {
        $this->validate($request, [
            'user_name' => 'required',
            'password' => 'required',
        ]);

        $user_name = $request->user_name;
        $password = $request->password;

        $result = DB::table('customer_info')->where('user_name', $user_name)
            ->where('password', md5($password))
            ->first();

        if ($result) {

            session::put('name', $result->name);
            session::put('user_name', $result->user_name);

            session::put('id', $result->id);
            session::put('email', $result->email);

            return Redirect::to('/Shop');
        } else {
            session::put('message', 'Please enter valid email or password');
            return Redirect::to('/login-auth');
        }

    }
    public function cus_logout()
    {
        Session::put('id', '');
        Session::put('name', '');
        Session::put('email', '');
        Session::put('user_name', '');
        Session::put('email', '');
        Cart::destroy();
        return Redirect::to('/');

    }

    public function shop()
    {
        $header = view('front_end.header');
        $shop = view('front_end.shop');
        $footer = view('front_end.footer');
        return view('front_end.master')
            ->with('header', $header)
            ->with('f_products', $shop)
            ->with('footer', $footer);

    }
    public function contact()
    {
        $header = view('front_end.header');
        $contact = view('front_end.contact');
        $footer = view('front_end.footer');
        return view('front_end.master')
            ->with('header', $header)
            ->with('f_products', $contact)
            ->with('footer', $footer);

    }
    public function store_contact_info(request $request)
    {
        $cus_id = Session::get('id');
        if ($cus_id) {
            $data['user_name'] = $request->user_name;
            $data['user_email'] = $request->user_email;
            $data['message'] = $request->message;

            DB::table('contact_info')->insert($data);
            return Redirect::to('/');
        } else {
            return Redirect::to('/Login');
        }

    }
    public function blog()
    {
        $header = view('front_end.header');
        $blog = view('front_end.blog_page');
        $footer = view('front_end.footer');
        return view('front_end.master')
            ->with('header', $header)
            ->with('f_products', $blog)
            ->with('footer', $footer);

    }
    public function p_details($id)
    {
        $p_details = DB::table('product')
            ->where('id', $id)
            ->first();
        $header = view('front_end.header');
        $p_details = view('front_end.p_details')
            ->with('all_details', $p_details);
        $footer = view('front_end.footer');
        return view('front_end.master')
            ->with('header', $header)
            ->with('f_products', $p_details)
            ->with('footer', $footer);

    }
    public function add_to_wishlist($id)
    {
        $cus_id = Session::get('id');

        if ($cus_id) {

            $all_item = DB::table('wishlist')->where('product_id', $id)->first();
            if ($all_item) {
                return Redirect::to('/');
            } else {
                $data = array();
                $data['product_id'] = $id;
                $data['user_id'] = $cus_id;
                $data['status'] = 1;

                DB::table('wishlist')->insert($data);

                return Redirect::to('/');
            }

        } else {
            return Redirect::to('/Login');
        }

    }
    public function add_to_cart($id)
    {

        $product = DB::table('product')->where('id', $id)->first();

        if ($product) {
            $data['id'] = $product->id;
            $data['name'] = $product->p_name;
            $data['qty'] = 1;
            $data['price'] = $product->s_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image1;
            $data['options']['color'] = $product->color;
            $data['options']['size'] = $product->size;
            Cart::add($data);
            return Redirect::to('/');
        }

    }
    public function add_to_cart_from_p_details(request $request)
    {

        $p_id = $request->productid;
        $p_qty = $request->qty;
        $product = DB::table('product')->where('id', $p_id)->first();

        if ($product) {
            $data['id'] = $product->id;
            $data['name'] = $product->p_name;
            $data['qty'] = $p_qty;
            $data['price'] = $product->s_price;
            $data['weight'] = 1;
            $data['options']['image'] = $product->image1;
            $data['options']['color'] = $product->color;
            $data['options']['size'] = $product->size;
            Cart::add($data);
            return Redirect::to('/Shop');
        } else {
            echo "nai kisy";
        }

    }
    public function ck()
    {
        $content = Cart::content();
        return response()->json($content);
    }
    public function show_cart()
    {
        $cart = Cart::content();
        $header = view('front_end.header');
        $show_cart = view('front_end.show_cart')
            ->with('cart_item', $cart);
        $footer = view('front_end.footer');
        return view('front_end.master')
            ->with('header', $header)
            ->with('f_products', $show_cart)
            ->with('footer', $footer);

        // $cart=Cart::content();
        // return view('pages.cart',compact('cart'));
    }
    public function update_cart(request $request)
    {
        $rowId = $request->productid;
        $qty = $request->qty;
        Cart::update($rowId, $qty);
        return redirect()->back();
    }
    public function delete_cart($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function checkout()
    {
        $cus_id = Session::get('id');
        if ($cus_id) {
            $cart = Cart::content();
            $header = view('front_end.header');
            $checkout = view('front_end.checkout')
                ->with('cart_item', $cart);
            $footer = view('front_end.footer');
            return view('front_end.master')
                ->with('header', $header)
                ->with('f_products', $checkout)
                ->with('footer', $footer);
        } else {
            return Redirect::to('/Login');
        }

        // $cart=Cart::content();
        // return view('pages.cart',compact('cart'));
    }
    public function apply_coupon(request $request)
    {
        $coupon = $request->c_name;
        $ck_coupon = DB::table('coupons')->where('c_name', $coupon)->first();

        if ($ck_coupon) {

            session::put('c_id', $ck_coupon->c_id);
            session::put('c_ammount', $ck_coupon->c_ammount);
            session::put('c_name', $ck_coupon->c_name);

            $cart = Cart::content();
            $header = view('front_end.header');
            $show_cart = view('front_end.show_cart')
                ->with('cart_item', $cart);
            $footer = view('front_end.footer');
            return view('front_end.master')
                ->with('header', $header)
                ->with('f_products', $show_cart)
                ->with('footer', $footer);
        } else {

            $cart = Cart::content();
            $header = view('front_end.header');
            $show_cart = view('front_end.show_cart')
                ->with('cart_item', $cart);
            $footer = view('front_end.footer');
            return view('front_end.master')
                ->with('header', $header)
                ->with('f_products', $show_cart)
                ->with('footer', $footer);

        }
        // $cart=Cart::content();
        // return view('pages.cart',compact('cart'));
    }
    public function remove_coupon()
    {
        Session::put('c_id', '');
        Session::put('c_ammount', '');
        Session::put('c_name', '');
        return redirect()->back();

    }
    public function track_orders(request $request)
    {
        $track_number = $request->tracking_code;
        $trac_info = DB::table('order')->where('tracking_code', $track_number)->first();

        $order_id = $trac_info->order_id;
        $product_details = DB::table('order_details')->where('order_id', $order_id)->get();
        return view('front_end.order_tracking')
            ->with('trac_info', $trac_info)
            ->with('order_products', $product_details);
    }
    public function blog_details($id)
    {
        $data_details = DB::table('blog_post')->where('id', $id)->first();
        $header = view('front_end.header');
        $blog = view('front_end.blog_details')
                    ->with('data_details',$data_details);

        $footer = view('front_end.footer');
        return view('front_end.master')
            ->with('header', $header)
            ->with('f_products', $blog)
            ->with('footer', $footer);

    }
    public function search_data(request $request)
    {
        print_r($request->all());
    }
    public function newsletter(request $request)
    {
        $data['email'] = $request->email;
        $data['status'] = 1;
        DB::table('newsletter')->insert($data);
        return Redirect::to('/');
    }

}
