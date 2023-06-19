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

    <body>
    <div class="thank">
        <h1>Cảm ơn bạn đã mua hàng!</h1>

        <p>Thông tin sản phẩm:</p>
        @foreach($order->products as $item)
            <div class="row_product">
            <div class="product">
            <p>Tên sản phẩm: <b style="color: #2ca02c">{{$item->name}}</b></p>
            <p>Giảm giá: <b style="color: #2ca02c">{{$item->discount}}%</b></p>
            <p>Số lượng: <b style="color: #2ca02c">{{$item->pivot->buy_qty}}</b></p>
            <p>Giá tiền: <i style="text-decoration: line-through">${{$item->price}}</i> <b style="color: red">${{($item->price-($item->price*$item->discount/100))}}</b> </p>
            </div>
            </div>
        @endforeach
        <h4 style="color: red">Tổng thanh toán: <b>${{$order->total}}</b></h4>

        <p style="color: #2ca02c;font-size: 20px">Cảm ơn bạn đã tin tưởng và mua hàng của chúng tôi!</p>
    </div>
    </body>

    <style>
        .thank {
            width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        p {
            color: #666;
            margin-bottom: 10px;
        }

    </style>

@endsection
