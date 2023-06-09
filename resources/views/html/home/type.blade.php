<div class="row justify-content-center">
    <div class="col-md-10 mb-5 text-center">
        <ul class="product-category">
            <h1 style="color: #82ae46;margin-left: -30px"><b>Product types</b></h1>
            @foreach($categories as $item)
                <section style="float: left;margin-left:130px;margin-right: 30px;margin-bottom: -100px" class="ftco-section">
                        <div  class="media-body">
                            <h3  class="heading"><a href="{{url("/category",["category"=>$item->slug])}}">{{$item->name}}</a></h3>
                            </div>
                </section>
            @endforeach
        </ul>
    </div>
</div>
<style>
    .product-category{
        margin-top: 100px;
        height: 00px;
    }
     .heading a:hover{
        color: #c82333;
     }
</style>
