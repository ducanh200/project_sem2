@extends("admin.layout")
@section("main")
    <form action="{{url("/admin/events/create")}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input name="name" type="text"  class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Donor</label>
            <input name="donor" type="text"  class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Address</label>
            <input name="address" type="text"  class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Begin</label>
            <input name="begin" type="datetime-local"  class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Finish</label>
            <input name="finish" type="datetime-local"  class="form-control" placeholder="">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
