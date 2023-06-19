@extends("layouts.layout")
@section("main")

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span>
                    </p>
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>
    <form action="{{"/checkout"}}" method="post">
        @csrf
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-7 ftco-animate">

                        <h3 class="mb-4 billing-heading">Billing Details</h3>
                        <div class="row align-items-end">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Firt Name</label>
                                    <input type="text" name="firstname" class="form-control">
                                    @error("firstname")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">Last Name</label>
                                    <input type="text" name="lastname" class="form-control">
                                    @error("lastname")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input type="text" name="country" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="address">Street Address</label>
                                    <input type="text" name="address" class="form-control">
                                    @error("address")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="city">Town / City</label>
                                    <input name="city" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="postcodezip">Postcode / ZIP *</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                    @error("phone")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" class="form-control">
                                    @error("email")
                                    <p class="text-danger"><i>{{$message}}</i></p>
                                    @enderror
                                </div>
                            </div>
                            <div class="w-100"></div>
                        </div>

                    </div>
                    <div class="col-xl-5">
                        <div class="row mt-5 pt-3">
                            <div class="col-md-12 d-flex mb-5">
                                <div class="cart-detail cart-total p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Cart Total</h3>
                                    <p class="d-flex">
                                        <span>Subtotal</span>
                                        <span>${{$total}}</span>
                                    </p>
                                    @if($total>100&&$products>0)
                                        <p class="d-flex">
                                            <span>Delivery</span>
                                            <span>$0.00</span>
                                        <hr>
                                        <p class="d-flex total-price">
                                            <span>Total</span>
                                            <span>${{$total}}</span>
                                        </p>
                                    @else
                                        <p class="d-flex">
                                            <span>Delivery</span>
                                            <span>$5.00</span>
                                        </p>
                                        <hr>
                                        <p class="d-flex total-price">
                                            <span>Total</span>
                                            <span>${{$total+5}}</span>
                                        </p>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cart-detail p-3 p-md-4">
                                    <h3 class="billing-heading mb-4">Payment Method</h3>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label for="COD">
                                                    <input name="payment_method" type="radio" id="payment"
                                                           value="VN PAY">
                                                    <span class="checkmark">VN PAY</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label for="COD">
                                                    <input name="payment_method" type="radio" id="COD" value="COD">
                                                    <span class="checkmark">COD</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="radio">
                                                <label for="COD">
                                                    <input name="payment_method" type="radio" id="paypal"
                                                           value="PAYPAL">
                                                    <span class="checkmark">PAYPAL</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="" class="mr-2"> I have read and
                                                    accept the terms and conditions</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button style="background-color: #2ca02c;border: #2ca02c solid 0" type="submit"
                                            class="site-btn">PLACE ORDER
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
@endsection
