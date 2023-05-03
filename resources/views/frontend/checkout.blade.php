@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center"
             style="background-image: url({{asset('user/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Checkout<span>Shop</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('cart') }}">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">
                        <form action="#">
                            <input type="" class="form-control" required id="checkout-discount-input" >
                            <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                        </form>
                    </div><!-- End .checkout-discount -->
                    <form action="{{ url('place-order') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">First Name *</label>
                                        <input type="text" required class="form-control firstname"
                                               value="{{ Auth::user()->name }}" name="fname"
                                               placeholder="Enter First Name">
                                        <span id="fname_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="">Last Name *</label>
                                        <input type="text" required class="form-control lastname"
                                               value="{{ Auth::user()->lname }}" name="lname"
                                               placeholder="Enter Last Name">
                                        <span id="lname_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label for="">Country *</label>
                                <input type="text" required class="form-control country"
                                       value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                <span id="country_error" class="text-danger"></span>

                                <label for="">address 1 *</label>
                                <input type="text" required class="form-control address1"
                                       value="{{ Auth::user()->address1 }}" name="address1"
                                       placeholder="Enter Address 1">
                                <span id="address1_error" class="text-danger"></span>

                                <label for="">address 2 (option)</label>
                                <input type="text" required class="form-control address2"
                                       value="{{ Auth::user()->address2 }}" name="address2"
                                       placeholder="Enter Address 2">
                                <span id="address2_error" class="text-danger"></span>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Town / City *</label>
                                        <input type="text" required class="form-control city"
                                               value="{{ Auth::user()->city }}" name="city" placeholder="Enter City">
                                        <span id="city_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>State / County *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label for="">state *</label>
                                <input type="text" required class="form-control state" value="{{ Auth::user()->state }}"
                                       name="state" placeholder="Enter State">
                                <span id="state_error" class="text-danger"></span>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Postcode / ZIP *</label>
                                        <input type="text" required class="form-control pincode"
                                               value="{{ Auth::user()->pincode }}" name="pincode"
                                               placeholder="Enter Pin Code">
                                        <span id="pincode_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="">Phone *</label>
                                        <input type="text" required class="form-control phone"
                                               value="{{ Auth::user()->phone }}" name="phone"
                                               placeholder="Enter Phone Number">
                                        <span id="phone_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label for="">Email address *</label>
                                <input type="text" required class="form-control email" value="{{ Auth::user()->email }}"
                                       name="email" placeholder="Enter Email">
                                <span id="email_error" class="text-danger"></span>

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" value="{{ Auth::user()->message }}" name="message"
                                          cols="30" rows="4"
                                          placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            </div><!-- End .col-lg-9 -->

                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->
                                    <table class="table table-summary">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                            @foreach($cartItems as $cartItem)
                                                <tr>
                                                    <td>{{ $cartItem->products->name }}</td>
                                                    <td>${{ $cartItem->products->selling_price }}</td>
                                                </tr>
                                                @php
                                                    $subtotal = $cartItem->products->selling_price * $cartItem->prod_qty;
                                                @endphp
                                                <tr class="summary-subtotal">
                                                    <td>Subtotal:</td>
                                                    <td>{{ $subtotal }}</td>
                                                </tr><!-- End .summary-subtotal -->
                                            @endforeach
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>Free shipping</td>
                                            </tr>
                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>${{ $total }}</td>
                                            </tr><!-- End .summary-total -->
                                            @if ($discountedAmount > 0)
                                                <tr class="summary-discount">
                                                    <td>Discount:</td>
                                                    <td>-${{ $discountedAmount }}</td>
                                                </tr><!-- End .summary-discount -->
                                                <tr class="summary-total">
                                                    <td>Total after discount:</td>
                                                    <td>${{ $total - $discountedAmount }}</td>
                                                </tr><!-- End .summary-total -->
                                            @endif
                                        </tbody>
                                    </table><!-- End .table table-summary -->
                                    <div class="accordion-summary" id="accordion-payment">
                                        <input type="hidden" name="payment_mode" value="COD">
                                        <button type="submit" class="btn btn-success w-100">Place Order | COD</button>
                                        <button type="button" class="btn btn-primary w-100 mt-3 zalopay_btn">Pay with
                                            Razorpay
                                        </button>
                                        <div id="paypal-button-container" class="mt-3"></div>
                                        <img src="{{asset('user/assets/images/payments-summary.png')}}"
                                             alt="payments cards">
                                    </div>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->

@endsection

@section('scripts')
    <script
        src="https://www.paypal.com/sdk/js?client-id=Ac7CsOudM6G-ECxM40Ass9tNOIZn-W8kUxrwiTuhsHeIazgaJFBuz_5G8ZnO6-NNPQzXOIyZe9Q8FNtH"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        paypal.Buttons({
            // Order is created on the server and the order id is returned
            createOrder: function (data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '{{ $total }}'
                        }
                    }]
                });
            },
            onApprove: function (data, actions) {
                return actions.order.capture().then(function (details) {
                    // alert('Transsaction completed by' + details.payer.name.given_name);

                    var firstname = $('.firstname').val();
                    var lastname = $('.lastname').val();
                    var email = $('.email').val();
                    var phone = $('.phone').val();
                    var address1 = $('.address1').val();
                    var address2 = $('.address2').val();
                    var city = $('.city').val();
                    var state = $('.state').val();
                    var country = $('.country').val();
                    var pincode = $('.pincode').val();

                    $.ajax({
                        method: "POST",
                        url: "/place-order",
                        data: {
                            'fname': firstname,
                            'lname': lastname,
                            'email': email,
                            'phone': phone,
                            'address1': address1,
                            'address2': address2,
                            'city': city,
                            'state': state,
                            'country': country,
                            'pincode': pincode,
                            'payment_mode': "Paid by Paypal",
                            'payment_id': details.id,
                        },
                        success: function (response) {
                            swal(response.status);
                            window.location.href = "/my-orders";
                        }
                    })
                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
