<div class="row">
    @foreach($products as $item)
    <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
            <a href="{{url("/detail",["product"=>$item->slug])}}" class="img-prod"><img style="max-height: 202.71px;min-height: 202.71px;max-width: 253.4px;min-width: 253.4px" class="img-fluid" src="{{$item->thumbnail}}" alt="Colorlib Template">
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
<div style="margin-left: 36%;margin-bottom: -30px">
    {!! $products->appends(app("request")->input())->links("pagination::bootstrap-4") !!}
</div>
