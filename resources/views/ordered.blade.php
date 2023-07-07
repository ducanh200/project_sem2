@extends("layouts.layout")
@section("main")

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
                        <span>Contact us</span></p>
                    <h1 class="mb-0 bread">ORDERED</h1>
                </div>
            </div>
        </div>
    </div>

<h1 style="text-align: center;color: #2ca02c;margin: 30px"><b>Products ordered</b></h1>
<div style="width: 300px;margin: auto;margin-top: -20px;margin-bottom: 30px;text-align: center" class="aside">
    <a style="text-align: center" class="btn btn-primary float-none" href="{{"/"}}">Home</a>
    <a style="text-align: center" class="btn btn-primary float-none" href="{{"/shop"}}">Shopping</a>
    <a style="text-align: center" class="btn btn-primary float-none" href="{{"/cart"}}">Cart</a>
</div>
{{--@if(Auth::check() && isset($user))--}}
{{--    <h1>Bạn phải đăng nhập trước khi xem hóa đơn hoặc mua hàng!</h1>--}}
{{--@else--}}
    @if (count($orders)>0)
        <table>
            <thead>
            <tr>
                <th>ORDER_ID</th>
                <th>User</th>
                <th>Address</th>
                <th>Product</th>
                <th>Total money</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td style="text-align: center">{{ $order->id }}</td>
                    <td>{{ auth()->user()->name}}</td>
                    <td>{{ $order->address }}-{{ $order->city }}-{{ $order->country }}</td>
                    <td>
                        <ul>
                            @foreach ($order->products as $product)
                                <li>{{ $product->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>${{ $order->total }}  @if($order->is_paid || $order->status==3)
                            (<b style="color: #2ca02c"><span class="text-success">Paid</span></b>)
                        @else
                           (<b style="color: #e50606"><span class="text-danger">unPaid</span></b>)
                        @endif
                    </td>
                    <td style="text-align: center">
                        @if($order->status==0)
                            <span class="text text-dark">Pending</span><a href="{{url("/ordered/cancel",["order"=>$order->id])}}" class="btn btn-danger float-none ">Cancel Order</a>
                        @else
                            @switch($order->status)
                                @case(0)<span class="text text-dark">Pending</span>@break
                                @case(1)<span style="color: #0c84ff" >Confirmed</span>@break
                                @case(2)<span class="text text-warning">Shipping </span><br><a href="{{url("/ordered/received",["order"=>$order->id])}}" class="btn btn-success float-none "> Received</a>@break
                                @case(3)<span class="text text-warning">Shipped </span><br><a href="{{url("/ordered/received",["order"=>$order->id])}}" class="btn btn-success float-none "> Received</a>@break
                                @case(4)<span class="text text-success">Completed</span> <br><a href="{{url("/ordered/returns",["order"=>$order->id])}}" class="btn btn-danger float-none ">Returns</a>@break
                                @case(5)<span style="color: red" >Cancelled</span>@break
                                @case(6)<span class="text text-danger">Pending Returns Confirm</span><a href="{{url("/ordered/received",["order"=>$order->id])}}" class="btn btn-primary float-none"> Returns Cancel</a>@break
                                @case(7)<span class="text text-blue">Returns Confirmed</span>@break
                                @case(8)<span class="text text-success">Returns Completed</span>@break
                                @case(9)<span class="text text-success">Completed <br>(<b style="color: #c82333">Returns failed</b>)</span>@break

                            @endswitch
                        @endif
                    </td>
                    <td>
                        <a href="{{url("/invoice",["order"=>$order->id])}}" class="btn btn-outline-success " style="height: 35px">View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    @else
        <h3 style="color: #4a5568;margin-bottom: 50px;text-align: center">No invoices have been found before!.</h3>
@endif

{{--@endif--}}
@endsection
<style>
    table {
        width: 75%;
        border-collapse: collapse;
        margin: auto;
        margin-bottom: 50px;
        color: black;
        font-size: 14px;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border: 1px solid #070707;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    ul {
        margin-left: 10px;
        /*list-style: none;*/
        padding: 0;
    }

    li {
        margin-bottom: 5px;

    }
</style>
