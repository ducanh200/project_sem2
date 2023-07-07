@extends("layouts.layout")
@section("main")

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Products</span>
                    </p>
                    <h1 class="mb-0 bread">Products:{{app("request")->input('q')}} </h1>
                </div>
            </div>
        </div>
    </div>
    <section class="ftco-section">

        <div class="container">
            <div style="margin-top:30px; margin-left: 5%;margin-right: 70px">
                @include("html.shop.type")
            </div>
            @if(count($products) > 0)
                <div class="row">
                    @foreach($products as $item)
                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="product">
                                <a href="{{url("/detail",["product"=>$item->slug])}}" class="img-prod"><img style="max-height: 202.71px;min-height: 202.71px;max-width: 253.4px;min-width: 253.4px" class="img-fluid" src="{{$item->thumbnail}}"
                                                                  alt="Colorlib Template">
                                    <span class="status">{{$item->discount}}%</span>
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="{{url("/detail",["product"=>$item->slug])}}">{{$item->name}}</a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="mr-2 price-dc">${{$item->price}}</span><span
                                                        class="price-sale">${{($item->price-($item->price*$item->discount/100))}}</span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex">
                                            <a href="{{"/shop"}}"
                                               class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                <span><i class="ion-ios-menu"></i></span>
                                            </a>
                                            @if($item->qty > 0)
                                            <a href="{{url("/add-to-cart",["product"=>$item->id])}}"
                                               class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                            @else
                                                <a style="background-color: #9fa0a1" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                    <span><i class="ion-ios-cart"></i></span>
                                                </a>
                                            @endif
                                            <a href="{{url("/add-to-wishlist",["product"=>$item->id])}}" class="heart d-flex justify-content-center align-items-center ">
                                                <span><i class="ion-ios-heart"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <h4 style="color: #7b7d81;text-align: center">Không có sản phẩm thích hợp!</h4>
            @endif
            <div style="margin-left: 33%">
                {!! $products->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
            </div>
        </div>
    </section>
@endsection
