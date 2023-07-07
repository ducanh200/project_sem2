@extends("admin.layout")
@section("main")
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{$category->name}} Products</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{"/admin"}}">Home</a></li>
                        <li class="breadcrumb-item active">{{$category->name}} Products </li>
                        <li class="nav-item dropdown">
                            <a style="margin-left: 30px" class="btn btn-primary float-none" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Category</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                @foreach($categories as $item)
                                    <a class="dropdown-item" href="{{url("/admin/product_category",["category"=>$item->id])}}">{{$item->name}}</a>
                                @endforeach
                            </div>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card" style="background-color: #454d55;color: #fff">
                <div class="card-header">
                    <h3 class="card-title">Responsive Hover Table</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <div class="input-group-append">
                                <a href="{{url("/admin/products/create")}}" class="btn btn-outline-primary">
                                    Create new product
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Thumbnail</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Qty</th>
                            <th>Category</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td><img src="{{$item->thumbnail}}" class="img-thumbnail" width="100"/> </td>
                                <td>{{$item->name}}</td>
                                <td>${{$item->price}}</td>
                                <td>{{$item->discount}}%</td>
                                <td>{{$item->qty}}</td>
                                <td>{{$item->Category->name}}</td>
                                <td>
                                    <a href="{{url("/admin/products/edit",["product"=>$item->id])}}" class="btn btn-outline-info">Edit</a>
                                    <a onclick="return confirm('Xoá sản phẩm?')" href="{{url("/admin/products/delete",["product"=>$item->id])}}" class="btn btn-outline-danger">Delete</a>
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
    </div>
@endsection
