@extends("admin.layout")
@section("main")
    <form action="{{url("/admin/products/create")}}" method="post" enctype="multipart/form-data" style="margin-top: 50px" >
        @csrf
        <div class="form-group"  >
            <h2 style="text-align: center">Create product</h2>
        </div>
        <div class="form-group" >
            <div class="form-create">
            <label for="exampleFormControlInput1">Name</label>
            <input name="name" type="text"  class="form-control" placeholder="" style="width: 300px" >
            </div>
            <div class="form-create">
            <label for="exampleFormControlInput1">Price</label>
            <input name="price" type="number"  class="form-control" placeholder="" style="width: 150px">
            </div>
        </div>

        <div class="form-group" style="margin-top: 100px">
            <label for="exampleFormControlFile1">Thumbnail</label>
            <input type="file" name="thumbnail" class="form-control-file" id="exampleFormControlFile1">
        </div>

        <div class="form-group">
            <div class="form-create_2"> <label for="exampleFormControlInput1">Discount</label>
                <input name="discount" type="number"  class="form-control" placeholder="" style="width: 150px"></div>
            <div class="form-create_2">  <label for="exampleFormControlInput1">Qty</label>
                <input name="qty" type="number"  class="form-control" placeholder="" style="width: 150px"></div>
            <div class="form-create_2"> <label for="exampleFormControlInput1">Category</label>
                <select name="category_id" class="form-control" style="width: 150px">
                    @foreach($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select></div>

        </div>
        <div class="form-group" style="margin-top: 100px">
            <label for="exampleFormControlInput1">Description</label>
            <textarea style="height: 200px" class="form-control" name="description"></textarea>
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
</style>
