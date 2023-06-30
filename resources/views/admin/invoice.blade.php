@extends("admin.layout")
@section("main")
    <div class="row" >
        <div class="col-12" >
            <div class="callout callout-info" style="background-color: #454d55;color: #fff">
                <h5><i class="fas fa-info"></i> Note:</h5>
                This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3" style="background-color: #454d55;color: #fff">
                <!-- title row -->
                <div class="row">
                    <div class="col-12" >
                        <h4>
                            <i class="fas fa-globe"></i> AdminLTE, Inc.
                            <small class="float-right">Date: 2/10/2014</small>
                        </h4>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>Admin, Inc.</strong><br>
                            795 Folsom Ave, Suite 600<br>
                            San Francisco, CA 94107<br>
                            Phone: (804) 123-5432<br>
                            Email: anguyenduc075@gmail.com
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        To
                        <address>
                            <strong>{{$order->firstname.", ".$order->lastname}}</strong><br>
                            {{$order->address}}<br>
                            {{$order->city.",".$order->country}}<br>
                            Phone: {{$order->phone}}<br>
                            Email: {{$order->email}}
                        </address>
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4 invoice-col">
                        <b>Invoice #{{$order->id}}</b><br>
                        <br>
                        <b>Order ID:</b> {{$order->id}}<br>
                        <b>Payment Due:</b> {{$order->created_at}}<br>
                        <b>Account:</b> 968-34567
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- Table row -->
                <div class="row">
                    <div class="col-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Serial #</th>
                                <th>Subtotal</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->products as $item)
                                <tr>
                                    <td>{{$item->pivot->buy_qty}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>455-981-221</td>
                                    <td>${{$item->pivot->price * $item->pivot->buy_qty}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <div class="row">
                    <!-- accepted payments column -->
                    <div class="col-6">
                        <p class="lead">Payment Methods:</p>
                        <img src="../../dist/img/credit/visa.png" alt="Visa">
                        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                        <img src="../../dist/img/credit/american-express.png" alt="American Express">
                        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                            plugg
                            dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                        </p>
                    </div>
                    <!-- /.col -->
                    <div class="col-6">
                        <p class="lead">Amount Due 2/22/2014</p>

                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th style="width:50%">Subtotal:</th>
                                    <td>${{$order->total}}</td>
                                </tr>
                                <tr>
                                    <th>Tax (0)</th>
                                    <td>$0</td>
                                </tr>
                                <tr>
                                    <th>Shipping:</th>
                                    @if($order->total >100)
                                        <td>$0(Free shipping on order over $100)</td>
                                    @else
                                        <td>$5</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Total:</th>
                                    @if($order->total >100)
                                        <td>${{$order->total}}</td>
                                    @else
                                        <td>${{$order->total + 5.00}}</td>
                                    @endif

                                </tr>
                            </table>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- this row will not appear when printing -->
                <div class="row no-print">
                    <div class="col-12">
                        <a href="{{url("/admin/orders")}}" rel="noopener" target="_blank" class="btn btn-default"><i class="nav-icon fas fa-th"></i> Orders</a>
                        <b>
                            @switch($order->status)
                                @case(0)<span class="text text-dark">Pending</span>@break
                                @case(1)<span class="text text-blue">Confirmed</span>@break
                                @case(2)<span class="text text-warning">Shipping</span>@break
                                @case(3)<span class="text text-warning">Shipped</span>@break
                                @case(4)<span class="text text-success">Completed</span>@break
                                @case(5)<span class="text text-warning">Cancelled</span>@break
                            @endswitch
                        </b>
                        @switch($order->status)
                            @case(0)
                                <a href="{{url("admin/orders/confirm",["order"=>$order->id])}}" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Confirm
                                </a>
                                <a href="{{url("admin/orders/cancel",["order"=>$order->id])}}" class="btn btn-danger float-right"><i class="far fa-credit-card"></i> Submit
                                    Cancelled
                                </a>
                                @break
                            @case(1)
                                <a href="{{url("admin/orders/shipping",["order"=>$order->id])}}" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Shipping
                                </a>
                                @break
                            @case(2)
                                <a href="{{url("admin/orders/shipped",["order"=>$order->id])}}" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Shipped
                                </a>
                                @break
                            @case(3)
                                <a href="{{url("admin/orders/complete",["order"=>$order->id])}}" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Complete
                                </a>
                                @break
                            @case(4)
                                @break
                            @case(5)

                                @break
                        @endswitch


                    </div>
                </div>
            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
@endsection


