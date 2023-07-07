<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Featured Products</span>
                <h2 class="mb-4">Our featured products</h2>
                <p>These are our most popular products recently, they are all healthy products with reasonable prices.</p>

                <div class="col-lg-9" style="width: 500px;margin-top: 0px;margin-left: 360px;margin-bottom: 50px">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form style="float: left;width: 300px;height: 20px;margin: 20px" action="/search" method="get">
                                <input type="text" value="{{app("request")->input('q')}}" name="q" placeholder="What do you need?">
                                <button style="float: right;background-color: #82ae46;border: 0 solid ;margin-left: -15px ;height: 34px" type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">



        <div class="row">
            @foreach($products as $item)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{url("/detail",["product"=>$item->slug])}}" class="img-prod"><img class="img-fluid" src="{{$item->thumbnail}}" alt="Colorlib Template">
                        <span class="status">{{$item->discount}}%</span>
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{url("/detail",["product"=>$item->slug])}}">{{$item->name}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span class="mr-2 price-dc">${{$item->price}}</span><span class="price-sale">${{($item->price-($item->price*$item->discount/100))}}</span></p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="{{url("/detail",["product"=>$item->slug])}}" class="add-to-cart d-flex justify-content-center align-items-center text-center">
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

                                <a href="{{url("/add-to-wishlist",["product"=>$item->id])}}" class="heart d-flex justify-content-center align-items-center  ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
