@extends("layouts.layout")
@section("main")

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Wishlist</span>
                    </p>
                    <h1 class="mb-0 bread">My Wishlist</h1>
                </div>
            </div>
        </div>
    </div>
    <h1 style="text-align: center;color: #2ca02c;margin: 30px"><b>My Wishlist</b></h1>
    <div style="width: 300px;margin: auto;margin-top: 30px;text-align: center" class="aside">
        <a style="text-align: center" class="btn btn-primary float-none" href="{{"/"}}">Home</a>
        <a style="text-align: center" class="btn btn-primary float-none" href="{{"/shop"}}">Shopping</a>
        <a style="text-align: center" class="btn btn-primary float-none" href="{{"/cart"}}">Cart</a>
    </div>
    @if(count($products)>0)
        <section class="ftco-section ftco-cart">
            <div style="margin-top: -50px" class="container">
                <div class="row">
                    <div class="col-md-12 ftco-animate">
                        <div class="cart-list">

                            <table class="table">
                                <thead class="thead-primary">
                                <tr class="text-center">
                                    <th></th>
                                    <th>Product List</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>


                                @foreach($products as $item)

                                    <tbody>

                                    <tr class="text-center">
                                        <td class="product-remove"><a
                                                href="{{ url("/wishlist/remove", ['product' => $item->id]) }}"><span
                                                    class="ion-ios-close"></span></a></td>

                                        <td class="image-prod"><img style="max-width: 20%" src="{{$item->thumbnail}}">
                                        </td>

                                        <td class="product-name">
                                            <h3>{{$item->name}}</h3>
                                        </td>

                                        <td class="price">${{$item->price}}</td>
                                        <td>
                                            <button style="width: 100px"><a
                                                    href="{{url("/detail",["product"=>$item->slug])}}">DETAIL</a>
                                            </button>
                                        </td>
                                        <td>
                                            <button style="width: 100px"><a
                                                    href="{{url("/add-to-cart",["product"=>$item->id])}}">ADD TO
                                                    CARD</a></button>
                                        </td>
                                        @endforeach
                                    </tr><!-- END TR-->
                                    </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @else
        <h4 style="color: #4a5568;margin-top: 100px;margin-bottom: 100px;text-align: center">Không có sản phẩm yêu thích
            nào!</h4>
    @endif

@endsection
