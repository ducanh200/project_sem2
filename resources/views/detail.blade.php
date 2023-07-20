@extends("layouts.layout")
@section("main")

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a
                                href="index.html">Product</a></span> <span>Product Single</span></p>
                    <h1 class="mb-0 bread">Product Single</h1>
                </div>
            </div>
        </div>
    </div>

    {{--    @include("html.shop.type")--}}

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="images/product-1.jpg" class="image-popup"><img src="{{$product->thumbnail}}"
                                                                            class="img-fluid"
                                                                            alt="Colorlib Template"></a>
                </div>

                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                    <form action="{{url("/add-to-cart",["product"=>$product->id])}}" method="get">
                        <h3>{{$product->name}}</h3>
                        <div class="rating d-flex">
                            <p class="text-left">
                                <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
                            </p>
                        </div>
                        <p class="price"><span
                                style="text-decoration: line-through;color: #94969a">${{$product->price}}</span>
                            <span>${{$product->price-($product->price*$product->discount/100)}}</span></p>
                        <p>{{$product->description}}</p>
                        <div class="row mt-4">
                            <div class="w-100"></div>
                            <div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">

	            		</span>
                                @if($product->qty >0)
                                <input name="qty" type="number" max="{{$product->qty}}" value="1" min="1">
                                <span class="input-group-btn ml-2">
                                    @else
                                    @endif

	             	</span>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-12">
                                @if($product->qty >0)
                                    <p style="color: #000;">{{$product->qty}} available</p>
                                @else
                                    <h4 style="color: #e50606;">Out of stock</h4>
                                @endif
                            </div>
                        </div>
                        @if($product->qty >0)
                        <button type="submit" class="primary-btn">ADD TO CART</button>
                        @else
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{--    @include("html.home.products")--}}

@endsection
