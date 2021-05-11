   @extends('front_end.master') 
   @section('f_products')
    @php
            $cus_id = Session::get('id');
            $c_id = Session::get('c_id');
            $c_ammount = Session::get('c_ammount');
            $c_name = Session::get('c_name');
            $cart=Cart::content();



    @endphp
    {{-- sub_total --}}
    <?php if ($c_id) { 
        $sub_total = $sub = Cart::Subtotal() - $c_ammount;
         } else{ 
        $sub_total = Cart::Subtotal();
      } ?> 
    {{-- tax --}}
    <?php 
        $tax = Cart::tax();
    ?>
    {{-- shipping charge --}}
    <?php 
        $sh_crg = 50;
    ?>
    {{-- total --}}
    <?php if ($c_id) { 
        
        $total =  intval($sub + Cart::tax() +50);
         } else{ 
        $total =  intval(Cart::Total() + 50);
          }
    ?> 


    <style type="text/css" media="screen">
        .StripeElement {
  box-sizing: border-box;

  height: 40px;
  width: 100%;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
    </style>

    <section class="breadcrumb-section set-bg" data-setbg="{{asset('public/front_end/img/breadcrumb.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Stripe Payment</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Stripe Payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="checkout spad">
        <div class="container">
         
            <div class="checkout__form">
                <h4>Check-Out Details</h4>
             
           
                    <div class="row">
                        <div class="col-lg-7 col-md-6">
                            <div class="row">
                                <div class="col-lg-10">
                                    <table class="table table-striped table-dark">
                                      <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Description</th>
                                         
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>                                         
                                          <td>Name : </td>
                                          <td>{{$data['first_name']}} {{$data['last_name']}}</td>                                         
                                        </tr>
                                        <tr>                                         
                                          <td>Country : </td>
                                          <td>{{$data['country']}}</td>                                         
                                        </tr>
                                        <tr>                                         
                                          <td>Address : </td>
                                          <td>{{$data['address1']}}</td>                                         
                                        </tr>
                                        <tr>                                         
                                          <td>Town : </td>
                                          <td>{{$data['town']}}</td>                                         
                                        </tr>
                                        <tr>                                         
                                          <td>Post Code : </td>
                                          <td>{{$data['post_code']}}</td>                                         
                                        </tr>
                                        <tr>                                         
                                          <td>Email : </td>
                                          <td>{{$data['email']}}</td>                                         
                                        </tr>
                                        <tr>                                         
                                          <td>Notes : </td>
                                          <td>{{$data['notes']}}</td>                                         
                                        </tr>
                                          
                                      </tbody>
                                    </table>
                                </div>
                               
                            </div>
                  
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <div class="checkout__order">
                              <h6 style="margin: 0 auto">Stripe payment</h6>
                              <form action="{{ url('stripe_charge') }}" method="post" id="payment-form">
                                  @csrf
                                  <div class="form-row">
                                    <label for="card-element">
                                      Credit or debit card
                                    </label>
                                    <div id="card-element">
                                      <!-- A Stripe Element will be inserted here. -->
                                    </div>

                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                  </div>
                        {{-- Shipping info --}}
                        <input type="hidden" name="first_name" value="{{$data['first_name']}}">
                        <input type="hidden" name="last_name" value="{{$data['last_name']}}">
                        <input type="hidden" name="country" value="{{$data['country']}}">
                        <input type="hidden" name="address1" value="{{$data['address1']}}">
                        <input type="hidden" name="phone" value="{{$data['phone']}}">
                        <input type="hidden" name="town" value="{{$data['town']}}">
                        <input type="hidden" name="post_code" value="{{$data['post_code']}}">
                        <input type="hidden" name="email" value="{{$data['email']}}">
                        <input type="hidden" name="notes" value="{{$data['notes']}}">

                        {{-- paying ammount --}}
                        <input type="hidden" name="sub_total" value="{{$sub_total}}">
                        <input type="hidden" name="tax" value="{{$tax}}">
                        <input type="hidden" name="sh_crg" value="{{$sh_crg}}">
                        <input type="hidden" name="total" value="{{$total}}">

                        {{-- customer ID --}}
                        <input type="hidden" name="c_id" value="{{$cus_id}}">


                                  <button class="btn btn-secondary" type="submit">Submit Payment</button>
                                </form>
                            </div>
                                
                        </div>
                    </div>
            
            </div>
        </div>
    </section>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        
        // Create a Stripe client.
var stripe = Stripe('pk_test_51HeLGOIxGxCTMOQg2Oxi0GDewrwJ0bEqGhdsTZNgiQnkDAXNhQL51VPINry6f1FSFQATjxWb1324vAgtcs3DtddR00Hn96Jwdz');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
    </script>


@endsection