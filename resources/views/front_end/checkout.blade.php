   @extends('front_end.master')
   @section('f_products')
    @php
            $c_id = Session::get('c_id');
            $c_ammount = Session::get('c_ammount');
            $c_name = Session::get('c_name');
            $cart=Cart::content();
    @endphp

    <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/front_end/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="{{ url('Show-Cart') }}">Click here</a> to enter your code
                    </h6>
                </div>
            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{ url('check_payment') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name="country">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" class="checkout__input__add" name="address1">
                                <input type="text" placeholder="Apartment, suite, unite ect (optinal)" name="address2">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town">
                            </div>
                            {{-- <div class="checkout__input">
                                <p>Country/State<span>*</span></p>
                                <input type="text">
                            </div> --}}
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="post_code">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email">
                                    </div>
                                </div>
                            </div>

                          {{--   <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Ship to a different address?
                                    <input type="checkbox" id="diff-acc">
                                    <span class="checkmark"></span>
                                </label>
                            </div> --}}
                            <div class="checkout__input">
                                <p>Order notes<span>*</span></p>
                                <textarea name="notes"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    @foreach ($cart as $row)
                                       <li>{{$row->name}} ({{$row->qty}}) <span>{{$price=$row->price}}</span></li>
                                    @endforeach


                                </ul>
                             <?php if ($c_id) {

                              ?>
                                <div class="checkout__order__subtotal">Subtotal(coupon Applied) <span>{{$sub = Cart::Subtotal() - $c_ammount}}</span></div>
                              <?php } else{ ?>
                                    <div class="checkout__order__subtotal">Subtotal <span>{{Cart::Subtotal()}}</span></div>
                             <?php  } ?>
                              <div class="checkout__order__subtotal">Tax(5%) <span>{{Cart::tax()}}</span></div>
                            <div class="checkout__order__subtotal">Shipping Cost <span>50</span></div>

                            <?php if ($c_id) {

                              ?>
                                <div class="checkout__order__total">Total <span>{{ intval($sub + Cart::tax() +50)}}</span></div>
                              <?php } else{ ?>
                                    <div class="checkout__order__total">Total <span>{{ intval(Cart::Total() + 50)}}</span></div>
                             <?php  } ?>

                                <div class="form-check" style="margin-top: 10px;">
                                      <input style="margin-top: .8rem;" class="form-check-input" type="radio" name="payment_method" id="exampleRadios1" value="stripe" >
                                      <label class="form-check-label" for="exampleRadios1">
                                          <h4>Online Payments</h4>
                                     {{-- <img style="width: 80px;" src="{{asset('public/front_end/img/Stripe-logo-blue.png')}}" alt=""> --}}
                                      </label>

                                </div>
                                {{-- <div class="form-check" style="margin-top: 10px;">
                                      <input style="margin-top: .8rem;" class="form-check-input" type="radio" name="payment_method" id="exampleRadios1" value="paypal" >
                                      <label class="form-check-label" for="exampleRadios1">
                                     <img style="width: 80px;" src="{{asset('public/front_end/img/paypal.png')}}" alt="">
                                      </label>

                                </div> --}}
                                {{-- <div class="form-check" style="margin-top: 10px;">
                                      <input style="margin-top: .8rem;" class="form-check-input" type="radio" name="payment_method" id="exampleRadios1" value="mollie" >
                                      <label class="form-check-label" for="exampleRadios1">
                                     <img style="width: 80px;" src="{{asset('public/front_end/img/mole.png')}}" alt="">
                                      </label>

                                </div> --}}
                                  <div class="form-check" style="margin-top: 10px;">
                                      <input style="margin-top: .8rem;" class="form-check-input" type="radio" name="payment_method" id="exampleRadios1" value="cash_on_delivery" checked>
                                      <label class="form-check-label" for="exampleRadios1">
                                        <h4>Cash On Delivery</h4>

                                     {{-- <img style="width: 80px;" src="{{asset('public/front_end/img/7196078_preview.png')}}" alt="">
                                      </label> --}}

                                </div>




                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
