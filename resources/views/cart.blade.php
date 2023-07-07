@extends("layouts.layout")
@section("main")

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                    <h1 class="mb-0 bread">My Cart</h1>
                </div>
            </div>
        </div>
    </div>
    <h1 style="text-align: center;color: #2ca02c;margin: 30px"><b>My Cart</b></h1>
    <div style="width: 300px;margin: auto;margin-top:20px;text-align: center" class="aside">
        <a style="text-align: center" class="btn btn-primary float-none" href="{{"/"}}">Home</a>
        <a style="text-align: center" class="btn btn-primary float-none" href="{{"/shop"}}">Shopping</a>
        <a style="text-align: center" class="btn btn-primary float-none" href="{{"/cart"}}">Cart</a>
    </div>

        @if(count($products)>0)
        <section  class="ftco-section ftco-cart">
            <div style="margin-top: -50px" class="container">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">
                            <table class="table">
                                <thead class="thead-primary">
                                <tr class="text-center">
                                    <th>&nbsp;</th>
                                    <th>&nbsp;</th>
                                    <th>Product name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                </tr>
                                </thead>
                                @foreach($products as $item)
                                    <tbody>
                                    <tr class="text-center">
                                        <td class="product-remove"><a
                                                href="{{url("/cart/remove", ['product' => $item->id])}}"><span
                                                    class="ion-ios-close"></span></a></td>

                                        <td class="image-prod">
                                            <div class="img" style="background-image:url({{$item->thumbnail}});"></div>
                                        </td>

                                        <td class="product-name">
                                            <h3>{{$item->name}}</h3>
                                        </td>

                                        <td class="price">${{$item->price}}</td>

                                        <td class="quantity">
                                            <div class="input-group mb-3">
                                                <input type="text" name="quantity"
                                                       class="quantity form-control input-number"
                                                       value="{{$item->buy_qty}}">
                                            </div>
                                        </td>
                                        <td class="discount"><b style="color: #0cda9c">{{$item->discount}}%</b></td>

                                        <td class="total"><b
                                                style="color: #a10a0a">${{($item->price-($item->price*$item->discount/100))* $item->buy_qty}}</b>
                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Cart Totals</h3>
                            <p class="d-flex">
                                <span>Subtotal</span>
                                <span>${{$total}}</span>
                            </p>
{{--                            @if($total>100)--}}
{{--                                <p class="d-flex">--}}
{{--                                    <span>Delivery</span>--}}
{{--                                    <span>$0.00(Free ship)</span>--}}
{{--                                <hr>--}}
{{--                                <p class="d-flex total-price">--}}
{{--                                    <span>Total</span>--}}
{{--                                    <span>${{$total}}</span>--}}
{{--                                </p>--}}
{{--                            @else--}}
{{--                                <p class="d-flex">--}}
{{--                                    <span>Delivery</span>--}}
{{--                                    <span>$5.00</span>--}}
{{--                                </p>--}}
{{--                                <hr>--}}
{{--                                <p class="d-flex total-price">--}}
{{--                                    <span>Total</span>--}}
{{--                                    <span>${{$total+5}}</span>--}}
{{--                                </p>--}}
{{--                            @endif--}}
                            <p><a href="{{"/checkout"}}" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
                        </div>

                    </div>
                </div>

            </div>
        </section>
    @else
        <section class="shoping-cart spad">
            <div style="margin-top: 100px;margin-bottom:100px;text-align: center" class="container">
                <h4 style="color: #4a5568">No products were found in the shopping cart!!</h4>
            </div>
        </section>
    @endif

@endsection

