@extends("admin.layout")
@section("main")

    <form action="{{url("/admin/events/update",["event"=>$event->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input name="name" type="text"  class="form-control" placeholder="" value="{{$event->name}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Donor</label>
            <input name="donor" type="text"  class="form-control" placeholder="" value="{{$event->donor}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Thumbnail</label>
            <br>
            @if($event->thumbnail)
                <img src="{{ $event->thumbnail }}" alt="Thumbnail" style="width: 80px;"><u>  {{ $event->thumbnail }}</u>
            @endif
            <input type="file" name="thumbnail" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Contact</label>
            <input name="contact" type="text"  class="form-control" placeholder="" value="{{$event->contact}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Address</label>
            <input name="address" type="text"  class="form-control" placeholder="" value="{{$event->address}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Description</label>
            <textarea class="form-control" name="description" >{{$event->description}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Begin</label>
            <input name="begin" type="datetime-local"  class="form-control" value="{{$event->begin}}" placeholder="" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Finish</label>
            <input name="finish" type="datetime-local"  class="form-control" placeholder=""  value="{{$event->finish}}">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
@endsection
