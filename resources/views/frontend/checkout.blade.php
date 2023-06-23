@extends('layouts.front')

@section('title')
    Checkout
@endsection

@section('content')
    <main class="main">
        <div class="page-header text-center"
             style="background-image: url({{asset('user/assets/images/page-header-bg.jpg')}})">
            <div class="container">
                <h1 class="page-title">Xác nhận thông tin<span>Mua sắm</span></h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('cart') }}">Giỏ hàng</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Xác nhận</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="checkout">
                <div class="container">
                    <div class="checkout-discount">
                        <form action="#">
                            <input type="" class="form-control" required id="checkout-discount-input" >
                            <label for="checkout-discount-input" class="text-truncate">Có mã giảm giá? <span>Nhấp vào đây để chọn mã giảm giá</span></label>
                        </form>
                    </div><!-- End .checkout-discount -->
                    <form action="{{ url('place-order') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-9">
                                <h2 class="checkout-title">Thông tin</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Họ *</label>
                                        <input type="text" required class="form-control firstname"
                                               value="{{ Auth::user()->name }}" name="fname"
                                               placeholder="Nhập họ của bạn">
                                        <span id="fname_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="">Tên *</label>
                                        <input type="text" required class="form-control lastname"
                                               value="{{ Auth::user()->lname }}" name="lname"
                                               placeholder="Nhập tên của bạn">
                                        <span id="lname_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label for="">Địa chỉ 1 *</label>
                                <input type="text" required class="form-control address1"
                                       value="{{ Auth::user()->address1 }}" name="address1"
                                       placeholder="Nhập địa chỉ 1">
                                <span id="address1_error" class="text-danger"></span>

                                <label for="">Địa chỉ 2 (phòng hờ)</label>
                                <input type="text" required class="form-control address2"
                                       value="{{ Auth::user()->address2 }}" name="address2"
                                       placeholder="Nhập địa chỉ 2">
                                <span id="address2_error" class="text-danger"></span>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label for="">Thành Phố:  *</label>
                                        <input type="text" required class="form-control city"
                                               value="{{ Auth::user()->city }}" name="city" placeholder="Nhập thành phố">
                                        <span id="city_error" class="text-danger"></span>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label for="">Quốc Gia *</label>
                                        <input type="text" required class="form-control country"
                                               value="{{ Auth::user()->country }}" name="country" placeholder="Nhập Quốc Gia">
                                        <span id="country_error" class="text-danger"></span>
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
                                    <h3 class="summary-title">Hóa đơn của bạn</h3><!-- End .summary-title -->
                                    <table class="table table-summary">
                                        <thead>
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>tổng tiền</th>
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
                                                <td>Tiền:</td>
                                                <td>{{ $subtotal }}</td>
                                            </tr><!-- End .summary-subtotal -->
                                        @endforeach
                                        <tr>
                                            <td>Shipping:</td>
                                            <td>Free shipping</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Tổng tiền:</td>
                                            <td>{{ $total }}VNĐ</td>
                                        </tr><!-- End .summary-total -->
                                        @if ($discountedAmount > 0)
                                            <tr class="summary-discount">
                                                <td>Giảm giá:</td>
                                                <td>-{{ $discountedAmount }}VNĐ</td>
                                            </tr><!-- End .summary-discount -->
                                            <tr class="summary-total">
                                                <td>Tổng tiền đã giảm:</td>
                                                <td>{{ $total - $discountedAmount }}VNĐ</td>
                                            </tr><!-- End .summary-total -->
                                        @endif
                                        </tbody>
                                    </table><!-- End .table table-summary -->
                                    <div class="accordion-summary" id="accordion-payment">
                                        <input type="hidden" name="payment_mode" value="COD">
                                        <button type="submit" class="btn btn-success w-100">Thanh toán tiền mặt | COD</button>
                                        <button type="button" class="btn btn-primary w-100 mt-3 zalopay_btn">thanh toán bằng
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
