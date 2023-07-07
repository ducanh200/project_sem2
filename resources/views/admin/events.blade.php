@extends("admin.layout")
@section("main")

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Events</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{"/admin"}}">Home</a></li>
                        <li class="breadcrumb-item active">Events</li>
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
                                <a href="{{url("/admin/events/create")}}" class="btn btn-outline-primary">
                                    Create new event
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="background-color: #454d55;color: #fff">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Donor</th>
                            <th>Thumbnail</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>Begin</th>
                            <th>Finish</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($events as $ev)
                            <tr>
                                <td>{{$ev->name}}</td>
                                <td>{{$ev->donor}}</td>
                                <td><img src="{{$ev->thumbnail}}" class="img-thumbnail" width="100"/> </td>
                                <td>{{$ev->contact}}</td>
                                <td>{{$ev->address}}</td>
                                <td>{{$ev->begin}}</td>
                                <td>{{$ev->finish}}</td>

                                <td>
                                    <a href="{{url("/admin/events/edit",["event"=>$ev->id])}}" class="btn btn-outline-info">Edit</a>
                                    <a onclick="return confirm('Xoá sự kiện ?')" href="{{url("/admin/events/delete",["event"=>$ev->id])}}" class="btn btn-outline-danger">Delete</a>
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
