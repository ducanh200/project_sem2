<html>

<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
<table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">
    <thead>
    <tr>
        <th style="text-align:left;height: 160px;width: 500px">
            <img style="max-width: 200px;" src="https://fbcd.co/images/products/75ff08c4edd77315ff923c0a8ac6c413_resize.png" >
            <b style="font-size: 20px;text-align: center;margin-bottom: 30px;margin-top: 0;margin-left: 25px">HEALTHY FOOD</b>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="height:35px;"></td>
    </tr>
    <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
            <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:150px">Order status</span><b style="color:green;font-weight:normal;margin:0;font-size: 18px">
                    @switch($order->status)
                        @case(0)<span class="text text-dark">Pending</span>@break
                        @case(1)<span class="text text-blue">Confirmed</span>@break
                        @case(2)<span class="text text-warning">Shipping</span>@break
                        @case(3)<span class="text text-warning">Shipped</span>@break
                        @case(4)<span class="text text-success">Completed</span>@break
                        @case(5)<span class="text text-warning">Cancel</span>@break
                        @case(6)<span class="text text-danger">Pending Returns Confirm</span>
                        @case(7)<span class="text text-blue">Return Confirmed</span>@break
                        @case(8)<span class="text text-success">Return Completed</span>@break
                        @case(9)<span class="text text-success">Completed <br>(<b style="color: #c82333">Return failed</b>)</span>@break

                    @endswitch
                </b></p>
            <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Price total</span> ${{$order->total}}</p>
            <p style="font-size:14px;margin:0 0 6px 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Is Paid</span>
                @if($order->is_paid || $order->status==3)
                    <b style="color: #2ca02c"><span class="text-success">Paid</span></b>
                @elseif($order->is_paid || $order->status==8)
                    <b style="color: #11ab1d"><span class="text-success">refunded</span></b>
                @else
                    <b style="color: #e50606"><span class="text-danger">unPaid</span></b>
                @endif
            </p>
{{--            @foreach($order->products as $item)--}}
{{--            <p style="font-size:14px;margin:0 0 0 0;"><span style="font-weight:bold;display:inline-block;min-width:146px">Order amount</span>  {{$item->pivot->buy_qty}}</p>--}}
{{--            @endforeach--}}
        </td>

    </tr>
    <tr>
        <td style="height:35px;"></td>
    </tr>
    <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px">Name</span> {{$order->lastname}} {{$order->firstname}}</p>
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Email</span> {{$order->email}}</p>
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Phone</span> {{$order->phone}}</p>
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Address</span> {{$order->address}}-{{$order->city}}-{{$order->country}}</p>
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;"><span style="display:block;font-weight:bold;font-size:13px;">Duration of your vacation</span> {{$order->created_at}} to {{$order->updated_at}}</p>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;">Items</td>
    </tr>
    <tr>

        <td colspan="2" style="padding:15px;">
            @foreach($order->products as $item)
            <p style="font-size:14px;padding:10px;border:solid 1px #ddd;font-weight:bold;margin-bottom: 20px">
                <span style="display:block;font-size:13px;font-weight:normal;">Name Product : <b>{{$item->name}}</b></span>
                <span style="display:block;font-size:13px;font-weight:normal;">Quantity : <b>{{$item->pivot->buy_qty}}</b></span>
                <span style="display:block;font-size:13px;font-weight:normal;">Price : <b>${{$item->pivot->price}}</b></span>
            </p>
            @endforeach
        </td>

    </tr>
    </tbody>
    <h4 style="color: #2ca02c;margin-left: 20px">Cám ơn quý khách hàng đã tin tưởng ủng hộ HEALTHY FOOD .Trân trọng!</h4>
    <tfooter>
        <tr>
            <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                <strong style="display:block;margin:0 0 10px 0;">Mọi chi tiết xin liên hệ :</strong> Healthy food<br>8A-Tôn Thất Thuyết-Hà Nội<br>
                <b>Phone:</b> 09999999999<br>
                <b>Email:</b>  healthyfood@gmail.com
            </td>
        </tr>
    </tfooter>
</table>
</body>

</html>
