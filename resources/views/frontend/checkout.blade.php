@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center" style="background-image: url({{asset('user/assets/images/page-header-bg.jpg')}})">
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
                        <form action="#"  >
                            <input type="text" class="form-control" required id="checkout-discount-input">
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
                                        <input type="text"  required class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name">
                                        <span id="fname_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="">Last Name *</label>
                                        <input type="text" required class="form-control lastname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name">
                                        <span id="lname_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label for="">Country *</label>
                                <input type="text" required class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">
                                <span id="country_error" class="text-danger"></span>

                                <label for="">address 1 *</label>
                                <input type="text" required class="form-control address1" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter Address 1">
                                <span id="address1_error" class="text-danger"></span>

                                <label for="">address 2 (option)</label>
                                <input type="text" required class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Enter Address 2">
                                <span id="address2_error" class="text-danger"></span>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Town / City *</label>
                                        <input type="text" required class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City">
                                        <span id="city_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>State / County *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label for="">state *</label>
                                <input type="text" required class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Enter State">
                                <span id="state_error" class="text-danger"></span>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Postcode / ZIP *</label>
                                        <input type="text" required class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code">
                                        <span id="pincode_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="">Phone *</label>
                                        <input type="text" required class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone Number">
                                        <span id="phone_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label for="">Email address *</label>
                                <input type="text" required class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email">
                                <span id="email_error" class="text-danger"></span>

{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="checkout-create-acc">--}}
{{--                                    <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>--}}
{{--                                </div><!-- End .custom-checkbox -->--}}

{{--                                <div class="custom-control custom-checkbox">--}}
{{--                                    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">--}}
{{--                                    <label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>--}}
{{--                                </div><!-- End .custom-checkbox -->--}}

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" value="{{ Auth::user()->message }}" name="message" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                            </div><!-- End .col-lg-9 -->

                            <aside class="col-lg-3">
                                <div class="summary">
                                    <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

{{--                                    @php $total = 0; @endphp--}}
                                    @foreach($cartItems as $cartItem)
                                        <table class="table table-summary">
                                        <thead>
                                        <tr>
                                            <th>Product</th>
{{--                                            <th>Quantity</th>--}}
                                            <th>Total</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
{{--                                            @php $total += ($cartItem->products->selling_price * $item->prod_qty); @endphp--}}
                                            <td>{{ $cartItem->products->name }}</td>
{{--                                            <td>{{ $item->prod_qty }}</td>--}}
                                            <td>${{ $cartItem->products->selling_price }}</td>
                                        </tr>

                                        @php
                                            $subtotal = $cartItem->products->selling_price * $cartItem->prod_qty;
                                            $total += $subtotal;
                                        @endphp

                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>{{ $subtotal }}</td>
                                        </tr><!-- End .summary-subtotal -->
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td>${{ $total }}</td>
                                        </tr><!-- End .summary-total -->
                                        </tbody>
                                    </table><!-- End .table table-summary -->
                                    @endforeach
                                    <div class="accordion-summary" id="accordion-payment">
{{--                                        <div class="card">--}}
{{--                                            <div class="card-header" id="heading-1">--}}
{{--                                                <h2 class="card-title">--}}
{{--                                                    <a role="button" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">--}}
{{--                                                        Direct bank transfer--}}
{{--                                                    </a>--}}
{{--                                                </h2>--}}
{{--                                            </div><!-- End .card-header -->--}}
{{--                                            <div id="collapse-1" class="collapse show" aria-labelledby="heading-1" data-parent="#accordion-payment">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.--}}
{{--                                                </div><!-- End .card-body -->--}}
{{--                                            </div><!-- End .collapse -->--}}
{{--                                        </div><!-- End .card -->--}}

{{--                                        <div class="card">--}}
{{--                                            <div class="card-header" id="heading-2">--}}
{{--                                                <h2 class="card-title">--}}
{{--                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">--}}
{{--                                                        Check payments--}}
{{--                                                    </a>--}}
{{--                                                </h2>--}}
{{--                                            </div><!-- End .card-header -->--}}
{{--                                            <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion-payment">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    Ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Nullam malesuada erat ut turpis.--}}
{{--                                                </div><!-- End .card-body -->--}}
{{--                                            </div><!-- End .collapse -->--}}
{{--                                        </div><!-- End .card -->--}}
                                        <input type="hidden" name="payment_mode" value="COD">
                                        <button type="submit" class="btn btn-success w-100">Place Order | COD</button>
                                        <button type="button" class="btn btn-primary w-100 mt-3 zalopay_btn">Pay with Razorpay</button>
                                        <div id="paypal-button-container" class="mt-3"></div>
{{--                                        <div class="card">--}}
{{--                                            <div class="card-header" id="heading-3">--}}
{{--                                                <h2 class="card-title">--}}
{{--                                                    <a  class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">--}}
{{--                                                        Cash on delivery--}}
{{--                                                    </a>--}}
{{--                                                </h2>--}}
{{--                                            </div><!-- End .card-header -->--}}
{{--                                            <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">--}}
{{--                                                <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros.--}}
{{--                                                </div><!-- End .card-body -->--}}
{{--                                            </div><!-- End .collapse -->--}}
{{--                                        </div><!-- End .card -->--}}

{{--                                        <div class="card">--}}
{{--                                            <div class="card-header" id="heading-4">--}}
{{--                                                <h2 class="card-title">--}}
{{--                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">--}}
{{--                                                        PayPal <small class="float-right paypal-link">What is PayPal?</small>--}}
{{--                                                    </a>--}}
{{--                                                </h2>--}}
{{--                                            </div><!-- End .card-header -->--}}
{{--                                            <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">--}}
{{--                                                <div class="card-body">--}}
{{--                                                    Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.--}}
{{--                                                </div><!-- End .card-body -->--}}
{{--                                            </div><!-- End .collapse -->--}}
{{--                                        </div><!-- End .card -->--}}

{{--                                        <div class="card">--}}
{{--                                            <div class="card-header" id="heading-5">--}}
{{--                                                <h2 class="card-title">--}}
{{--                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">--}}
{{--                                                        Credit Card (Stripe)--}}
                                                       <img src="{{asset('user/assets/images/payments-summary.png')}}" alt="payments cards" >
{{--                                                    </a>--}}
{{--                                                </h2>--}}
{{--                                            </div><!-- End .card-header -->--}}
{{--                                            <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">--}}
{{--                                                <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.--}}
{{--                                                </div><!-- End .card-body -->--}}
{{--                                            </div><!-- End .collapse -->--}}
{{--                                        </div><!-- End .card -->--}}
{{--                                    </div><!-- End .accordion -->--}}

{{--                                    <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">--}}
{{--                                        <span class="btn-text">Place Order</span>--}}
{{--                                        <span class="btn-hover-text">Proceed to Checkout</span>--}}
{{--                                    </button>--}}
                                        </div>
                                </div><!-- End .summary -->
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    </form>
                </div><!-- End .container -->
            </div><!-- End .checkout -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->


{{--    <div class="container mt-3">--}}
{{--        <form action="{{ url('place-order') }}" method="POST">--}}
{{--            {{ csrf_field() }}--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-7">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h6>Basic Details</h6>--}}
{{--                            <hr>--}}
{{--                            <div class="row checkout-form">--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="">First Name</label>--}}
{{--                                    <input type="text"  required class="form-control firstname" value="{{ Auth::user()->name }}" name="fname" placeholder="Enter First Name">--}}
{{--                                    <span id="fname_error" class="text-danger"></span>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <label for="">Last Name</label>--}}
{{--                                    <input type="text" required class="form-control lastname" value="{{ Auth::user()->lname }}" name="lname" placeholder="Enter Last Name">--}}
{{--                                    <span id="lname_error" class="text-danger"></span>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 mt-3">--}}
{{--                                    <label for="">Email</label>--}}
{{--                                    <input type="text" required class="form-control email" value="{{ Auth::user()->email }}" name="email" placeholder="Enter Email">--}}
{{--                                    <span id="email_error" class="text-danger"></span>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 mt-3">--}}
{{--                                    <label for="">Phone Number</label>--}}
{{--                                    <input type="text" required class="form-control phone" value="{{ Auth::user()->phone }}" name="phone" placeholder="Enter Phone Number">--}}
{{--                                    <span id="phone_error" class="text-danger"></span>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 mt-3">--}}
{{--                                    <label for="">Address 1</label>--}}
{{--                                    <input type="text" required class="form-control address1" value="{{ Auth::user()->address1 }}" name="address1" placeholder="Enter Address 1">--}}
{{--                                    <span id="address1_error" class="text-danger"></span>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 mt-3">--}}
{{--                                    <label for="">Address 2</label>--}}
{{--                                    <input type="text" required class="form-control address2" value="{{ Auth::user()->address2 }}" name="address2" placeholder="Enter Address 2">--}}
{{--                                    <span id="address2_error" class="text-danger"></span>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 mt-3">--}}
{{--                                    <label for="">City</label>--}}
{{--                                    <input type="text" required class="form-control city" value="{{ Auth::user()->city }}" name="city" placeholder="Enter City">--}}
{{--                                    <span id="city_error" class="text-danger"></span>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 mt-3">--}}
{{--                                    <label for="">State</label>--}}
{{--                                    <input type="text" required class="form-control state" value="{{ Auth::user()->state }}" name="state" placeholder="Enter State">--}}
{{--                                    <span id="state_error" class="text-danger"></span>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 mt-3">--}}
{{--                                    <label for="">Country</label>--}}
{{--                                    <input type="text" required class="form-control country" value="{{ Auth::user()->country }}" name="country" placeholder="Enter Country">--}}
{{--                                    <span id="country_error" class="text-danger"></span>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6 mt-3 ">--}}
{{--                                    <label for="">Pin Code</label>--}}
{{--                                    <input type="text" required class="form-control pincode" value="{{ Auth::user()->pincode }}" name="pincode" placeholder="Enter Pin Code">--}}
{{--                                    <span id="pincode_error" class="text-danger"></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-md-5">--}}
{{--                    <div class="card">--}}
{{--                        <div class="card-body">--}}
{{--                            <h6>Order Details</h6>--}}
{{--                            <hr>--}}
{{--                            @if($cartitems->count() > 0)--}}
{{--                                <table class="table table-striped table-bordered">--}}
{{--                                    <thead>--}}
{{--                                        <tr>--}}
{{--                                            <th>Name</th>--}}
{{--                                            <th>Quantity</th>--}}
{{--                                            <th>Price</th>--}}
{{--                                        </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                        @php $total = 0; @endphp--}}
{{--                                        @foreach($cartitems as $item)--}}
{{--                                            <tr>--}}
{{--                                                @php $total += ($item->products->selling_price * $item->prod_qty); @endphp--}}
{{--                                                <td>{{ $item->products->name }}</td>--}}
{{--                                                <td>{{ $item->prod_qty }}</td>--}}
{{--                                                <td>{{ $item->products->selling_price }}</td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                                <h6 class="px-2">Grand Total <span class="float-end">Rs {{ $total }}</span></h6>--}}
{{--                                <hr>--}}
{{--                            <input type="hidden" name="payment_mode" value="COD">--}}
{{--                                <button type="submit" class="btn btn-success w-100">Place Order | COD</button>--}}
{{--                                <button type="button" class="btn btn-primary w-100 mt-3 zalopay_btn">Pay with Razorpay</button>--}}
{{--                                <div id="paypal-button-container" class="mt-3"></div>--}}
{{--                            @else--}}
{{--                                <h4 class="text-center">No products in cart</h4>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
@endsection

@section('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=Ac7CsOudM6G-ECxM40Ass9tNOIZn-W8kUxrwiTuhsHeIazgaJFBuz_5G8ZnO6-NNPQzXOIyZe9Q8FNtH"></script>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        paypal.Buttons({
            // Order is created on the server and the order id is returned
            createOrder: function(data, actions) {
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
                            'fname':firstname,
                            'lname':lastname,
                            'email':email,
                            'phone':phone,
                            'address1':address1,
                            'address2':address2,
                            'city':city,
                            'state':state,
                            'country':country,
                            'pincode':pincode,
                            'payment_mode':"Paid by Paypal",
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
