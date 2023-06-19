
<section style="margin-left: 30px" class="ftco-section ftco-category ftco-no-pt">
    <div style="margin-bottom: -100px" class="container" >
        <div style="background-image: url(images/image_2.jpg); background-size: cover; background-position: center;background-repeat: no-repeat; width: 100%;" class="row">
            <div  class="col-md-8">
                <div style="width: 400px" class="col-md-6 order-md-last align-items-stretch d-flex">
                    <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: none;height: 250px;margin-left: 365px;width: 100%">
                        <div style="width: 400px"  class="text text-center" >
                            <h1 style="color: #82ae46">TYPE FOOD</h1>
                            <p>Protect the health of every home</p>
                            <p><a href="{{"/shop"}}" class="btn btn-primary">Shop now</a></p>
                        </div>
                    </div>
                </div>
                <div class="row">

                    @foreach($categories as $item)
                    <div x   class="col-md-6" >
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url({{$item->thumbnail}});float: left ;margin-left: 186px;margin-bottom: -10px">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="{{url("/category",["category"=>$item->slug])}}">{{$item->name}}</a></h2>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

