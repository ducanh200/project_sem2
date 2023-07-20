<div class="py-1 bg-primary">
    <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
            <div class="col-lg-12 d-block">
                <div class="row d-flex">
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                        <span class="text">+ 1235 2355 98</span>
                    </div>
                    <div class="col-md pr-4 d-flex topper align-items-center">
                        <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                        <span class="text">youremail@email.com</span>
                    </div>
                    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                        <span class="text">3-5 Business days delivery &amp; Free Returns</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a style="margin-left: -50px" class="navbar-brand" href="{{url("/")}}">Healthy foods</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul style="margin-right: 50px" class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="{{url("/")}}" class="nav-link">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="{{url("/shop")}}">Shopping</a>
                        @if(session("wishlist")==0)
                            <a class="dropdown-item" href="{{url("/wishlist")}}">Wishlist<sup style="color: #2ca02c"> [0]</sup></a>
                        @else
                        <a class="dropdown-item" href="{{url("/wishlist")}}">Wishlist<sup style="color: #2ca02c"> [{{count(session("wishlist"))}}]</sup></a>
                        @endif
                        <a class="dropdown-item" href="{{url("/cart")}}">Cart</a>
                        <a class="dropdown-item" href="{{url("/ordered")}}">Orders history</a>
                        <a class="dropdown-item" href="{{url("/checkout")}}">Checkout</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        @foreach($categories as $item)
                        <a class="dropdown-item" href="{{url("/category",["category"=>$item->slug])}}">{{$item->name}}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item"><a href="{{url("/event")}}" class="nav-link">Events</a></li>
                <li class="nav-item"><a href="{{url("/about")}}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{url("/contact")}}" class="nav-link">Contact & support</a></li>
                @if(session("cart")==0)
                    <li class="nav-item cta cta-colored"><a href="{{url("/cart")}}" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>
                @else
                <li class="nav-item cta cta-colored"><a href="{{url("/cart")}}" class="nav-link"><span class="icon-shopping_cart"></span>[{{count(session("cart"))}}]</a></li>
                @endif


            </ul>

        </div>
        <div class="header__top__right__auth" style="text-align: left;width:190px;float: left;margin-right: -200px">
            @guest()
                <a href="{{url("/login")}}"><i class="fa fa-user"></i> Login</a>
            @endguest
            @auth()
{{--                    <a href="{{url("/account",auth()->user()->name)}}"><i class="fa fa-user"></i> {{auth()->user()->name}}</a>--}}
                <a href="#"><i class="fa fa-user"></i> {{auth()->user()->name}}</a>
                <form action="{{route("logout")}}" method="post">
                    @csrf
                    <button style="float: right;margin-top: -27.5px;margin-right: 30px" type="submit" ><i class="ion-ios-log-out"></i></button>
                </form>
            @endauth
        </div>
    </div>
</nav>
