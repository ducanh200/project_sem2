@extends("admin.layout")
@section("main")
    <form action="{{url("/admin/events/create")}}" method="post" enctype="multipart/form-data" style="margin-top: 50px" >
        @csrf
        <div class="form-group"  >
            <h2 style="text-align: center">Create Event</h2>
        </div>
        <div class="form-group">
            <div class="form-create">
                <label for="exampleFormControlInput1">Name</label>
                <input name="name" type="text"  class="form-control" placeholder=""  style="width: 300px">
            </div>
            <div class="form-create">
                <label for="exampleFormControlInput1">Donor</label>
                <input name="donor" type="text"  class="form-control" placeholder=""  style="width: 200px;margin-left: -50px">
            </div>

        </div>

        <div class="form-group" style="margin-top: 100px">
            <label for="exampleFormControlFile1">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control-file" id="exampleFormControlFile1">
        </div>


        <div class="form-group">
            <div class="form-create_2">
                <label for="exampleFormControlInput1">Address</label>
                <input name="address" type="text"  class="form-control" placeholder="" style="width: 250px">
            </div>
            <div class="form-create_2">
                <label for="exampleFormControlInput1">Contact</label>
                <input name="contact" type="text"  class="form-control" placeholder=""  style="width: 250px"></div>
            </div>

        <div class="form-group">
            <div class="form-create_3">
                <label for="exampleFormControlInput1">Begin</label>
                <input name="begin" type="datetime-local"  class="form-control" placeholder="" style="width: 250px">
            </div>
            <div class="form-create_3">
                <label for="exampleFormControlInput1">Finish</label>
                <input name="finish" type="datetime-local"  class="form-control" placeholder="" style="width: 250px">
            </div>

        </div>
        <br>
        <br>
        <br>
        <br>
        <div class="form-group" style="margin-top: 100px">
            <label for="exampleFormControlInput1">Description</label>
            <textarea style="height: 180px"  class="form-control" name="description"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
<style>
    form{
        width: 700px;
        float: none;
        margin: auto;

    }
    .form-create{
        float: left;
        margin-right: 100px;
    }
    .form-create_2{
        float: left;
        margin-right: 50px;
    }
    .form-group input{
        background-color: #454d55;
        color: #fff;
    }
    .form-group select{
        background-color: #454d55;
        color: #fff;
    }
    .form-group textarea{
        background-color: #454d55;
        color: #fff;
    }
    .form-create_3{
        float: left;
        margin-right: 50px;
        margin-top: 30px;
    }
</style>
