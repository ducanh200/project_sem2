@extends("layouts.layout")
@section("main")

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{"/"}}">Home</a></span> <span>Thank you</span>
                    </p>
                    <h1 class="mb-0 bread">Thank you</h1>
                </div>
            </div>
        </div>
    </div>


    <div class="thank">
        <h1 style="text-align: center;color: #2ca02c">Cảm ơn bạn đã mua hàng!</h1>

        <a href="{{url("/")}}" class="btn btn-outline-primary">
            Home
        </a>
        <a href="{{url("/invoice",[$order->id])}}" class="btn btn-outline-primary">
            Order Details
        </a>
        <a href="{{url("/ordered")}}" class="btn btn-outline-primary">
            Order History
        </a>
    </div>
@endsection
    <style>
        .thank{
            text-align: center;
            margin-bottom: 50px;
            margin-top: 20px;
        }
        .thank a{
            margin: 10px;
        }
    </style>
