@extends("admin.layout")
@section("main")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Confirmed Orders</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{"/admin"}}">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                        <li style="margin-left: 20px" class="nav-item dropdown">
                            <a style="width: 100px" class="btn btn-primary float-none" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Orders
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                                </svg>
                            </a>
                            <div style="margin-right: 20px" class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="{{url("/admin/orders")}}">All Orders</a>
                                <a class="dropdown-item" href="{{url("/admin/new_orders")}}">Pending</a>
                                <a class="dropdown-item" href="{{url("/admin/orders_1")}}">Confirmed</a>
                                <a class="dropdown-item" href="{{url("/admin/orders_2")}}">Shipping</a>
                                <a class="dropdown-item" href="{{url("/admin/orders_3")}}">Shipped</a>
                                <a class="dropdown-item" href="{{url("/admin/orders_4")}}">Completed</a>
                                <a class="dropdown-item" href="{{url("/admin/orders_5")}}">Cancel</a>
                                <a class="dropdown-item" href="{{url("/admin/orders_6")}}">Pending Returns Confirm</a>
                                <a class="dropdown-item" href="{{url("/admin/orders_7")}}">Return Confirmed</a>
                                <a class="dropdown-item" href="{{url("/admin/orders_8")}}">Return Completed</a>
                                <a class="dropdown-item" href="{{url("/admin/orders_9")}}">Return failed</a>
                            </div>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row" >
        <div class="col-12">
            <div class="card" style="background-color: #454d55;color: #fff">

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Guest</th>
                            <th>Created At</th>
                            <th>Phone</th>
                            <th>Payment method</th>
                            <th>Is Paid</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->firstname. " ".$item->lastname}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->phone}}</td>
                                <td>{{$item->payment_method}}</td>
                                <td>
                                    @if($item->is_paid ||$item->status==4)
                                        <span class="text-success">Paid</span>
                                    @else
                                        <span class="text-danger">unPaid</span>
                                    @endif
                                </td>
                                <td>
                                    @switch($item->status)
                                        @case(0)<span class="text text-red">Pending</span>@break
                                        @case(1)<span class="text text-blue">Confirmed</span>@break
                                        @case(2)<span class="text text-warning">Shipping</span>@break
                                        @case(3)<span class="text text-warning">Shipped</span>@break
                                        @case(4)<span class="text text-success">Completed</span>@break
                                        @case(5)<span class="text text-warning">Cancel</span>@break
                                        @case(6)<span class="text text-danger">Pending Returns Confirm</span>@break
                                        @case(7)<span class="text text-blue">Return Confirmed</span>@break
                                        @case(8)<span class="text text-success">Return Completed</span>@break
                                        @case(9)<span class="text text-success">Return failed</span>
                                    @endswitch
                                </td>
                                <td>
                                    <a href="{{url("/admin/orders",["order"=>$item->id])}}" class="btn btn-outline-info">View</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>

@endsection
