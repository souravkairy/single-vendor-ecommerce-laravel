   @extends('front_end.master')
   @section('f_products')
    @php
            $c_id = Session::get('c_id');
            $c_ammount = Session::get('c_ammount');
            $c_name = Session::get('c_name');
    @endphp

    <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/front_end/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart_item as $row)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img style="width: 60px;" src="{{asset( $row->options->image)}}" alt="">
                                        <h5>{{$row->name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{$price=$row->price}}
                                    </td>
                                    <form action="update_cart" method="post" accept-charset="utf-8">
                                      @csrf

                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="hidden" name="productid" value="{{$row->rowId}}">
                                                <input type="number" name="qty" value="{{$qty = $row->qty}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                      {{$qty * $price}}
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <a href="{{ url('delete_cart/'.$row->rowId) }}" title="">  <span class="icon_close"></span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="{{ url('Shop') }}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <button type="submit" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span> Upadate Cart</button>
                       {{--  <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a> --}}
                    </div>
                     </form>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <div class="shoping__discount">
                            @if ($c_id)
                                 <h5>Coupon : <a href="#" class="primary-btn cart-btn" title="Remove Coupon">{{$c_name}}</a> Applied Successfully</h5>
                                 <h4><a href="{{ url('remove_coupon') }}" title="">Remove Coupon</a></h4>
                           @else
                            <h5>Discount Codes</h5>
                            <form action="{{ url('apply_coupon') }}" method="post">
                                @csrf
                                <input type="text" name="c_name" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>

                            <?php
                            if ($c_id) { ?>

                                 <li>Subtotal(coupon Applied) <span>{{$sub = Cart::Subtotal() - $c_ammount}}</span></li>
                                <li>Tax(5% Tax)<span>{{Cart::tax()}}</span></li>
                                <li>Shipping Cost<span>50</span></li>
                                <li>Total (Including 5% Tax) <span>{{$sub + Cart::tax() +50}}</span></li>

                            <?php }else{
                             ?>
                                <li>Subtotal <span>{{Cart::Subtotal()}}</span></li>
                                <li>Tax(5% Tax)<span>{{Cart::tax()}}</span></li>
                                <li>Shipping Cost<span>50</span></li>
                                <li>Total (Including 5% Tax) <span>{{Cart::Total() + 50}}</span></li>

                           <?php }


                            ?>



                        </ul>
                        <a href="{{ url('Checkout') }}" class="primary-btn">PROCEED TO CHECKOUT</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
