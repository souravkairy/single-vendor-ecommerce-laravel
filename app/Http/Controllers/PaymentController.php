<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use DB;
use Cart;
use Session; 


class PaymentController extends Controller
{
        public function check_payment(request $request)
	    {
	    	// $cus_id = Session::get('id');
	    	$data = array();
	        $data['first_name'] = $request->first_name;
	        $data['last_name'] = $request->last_name;
	        $data['country'] = $request->country;
	        $data['address1'] = $request->address1;
	        $data['town'] = $request->town;
	        $data['post_code'] = $request->post_code;
	        $data['phone'] = $request->phone;
	        $data['email'] = $request->email;
	        $data['notes'] = $request->notes;
	        $data['payment_method'] = $request->payment_method;
	        $data['cus_id'] = $request->cus_id;


	        if ($request->payment_method == 'stripe') {
	        	
	            $header = view('front_end.header');
	            $payment_stripe = view('payment.stripe',compact('data'));
	            					
	                            
	            $footer = view('front_end.footer');
	            return view('front_end.master')
	                        ->with('header',$header)
	                        ->with('f_products',$payment_stripe)
	                        ->with('footer',$footer);
	            
	        }
	        elseif ($request->payment_method =='paypal') {
	            return view('payment.paypal');
	        }
	        elseif ($request->payment_method =='mollie') {
	            return view('payment.mollie');
	        }
	        else
	        {
	            return view('payment.cash_in_hand');
	        }




	    }
	    public function stripe_charge(request $request)
	    {
	    	// echo "<pre>";
	    	// $request = $request->all();
	    	// print_r($request);
	    	// exit();
	    	$total = $request->total;

		    // Set your secret key. Remember to switch to your live secret key in production!
			// See your keys here: https://dashboard.stripe.com/account/apikeys
			\Stripe\Stripe::setApiKey('sk_test_51HeLGOIxGxCTMOQgEUNZyHCVOsjDfEyPHE3zeKoy5MrQUu3GKxMmEL0yOtt6TiIS8DoLTvSlw9R1o4JUmoGfg4Oz00ERt5PukI');

			// Token is created using Checkout or Elements!
			// Get the payment token ID submitted by the form:
			$token = $_POST['stripeToken'];

			$charge = \Stripe\Charge::create([
			  'amount' => $total*100,
			  'currency' => 'usd',
			  'description' => 'Example charge',
			  'source' => $token,
			  'metadata' => ['order_id' => uniqid()],
			]);
            //insert data in order table
			$data=array();
			$data['c_id']=$request->c_id;
			$data['payment_id']=$charge->payment_method;
			$data['paying_amount']=$charge->amount/100;
			$data['bln_transection']=$charge->balance_transaction;
			$data['stripe_order_id']=$charge->metadata->order_id;
			$data['shipping_cost']=$request->sh_crg;
			$data['vat']=$request->tax;
			$data['total']=$request->total;
            $data['payment_method']='Stripe';
            $data['sub_total']=$request->sub_total;
    	    $data['status']=0;
    	    $data['date']=date('y-m-d');
    	    $data['month']=date('F');
    	    $data['year']=date('Y');
    	    $data['tracking_code']= mt_rand(100000, 999999);;

    	    $order_id=DB::table('order')->insertGetId($data);

    	    //insert data in shipping table

    	    $shipping=array();
    	    $shipping['order_id']=$order_id;
    	    $shipping['first_name']=$request->first_name;
    	    $shipping['last_name']=$request->last_name;
    	    $shipping['country']=$request->country;
    	    $shipping['address1']=$request->address1;
    	    $shipping['town']=$request->town;
    	    $shipping['post_code']=$request->post_code;
    	    $shipping['email']=$request->email;
    	    $shipping['phone']=$request->phone;
    	    $shipping['notes']=$request->notes;
    	    DB::table('shipping')->insert($shipping);

    	    //insert data into orderdeatils
    	    $content=Cart::content();
    	    $details=array();
    	    	foreach ($content as $row) {
    	    		$details['order_id']= $order_id;
    	    		$details['product_id']=$row->id;
    	    		$details['product_name']=$row->name;
    	    		$details['color']=$row->options->color;
    	    		$details['size']=$row->options->size;
    	    		$details['qty']=$row->qty;
    	    		$details['single_price']=$row->price;
    	    		$details['total_price']=$row->qty * $row->price;
    	    		DB::table('order_details')->insert($details);
    	    	}

    	    	Cart::destroy();
    	    	 if (Session::has('c_id')) {
			 	 Session::forget('c_id');
			 	
    	     }
    	      return Redirect::to('/');



	    }
}
