@extends("layouts.layout")
@section("main")

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
                        <span>Contact us</span></p>
                    <h1 class="mb-0 bread">EVENTS</h1>
                </div>
            </div>
        </div>
    </div>
@foreach($events as $item)
    <section class="ftco-section img" style="background-image: url(images/bg_3.jpg);margin: 100px">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <span style="font-size: 25px" class="subheading"><b style="color: black">Donor</b> : {{$item->donor}}</span>
                    <h2 style="color: #070707" class="mb-4">{{$item->name}}</h2>
                    <p>{{$item->description}}</p>
                    <h5 style="color: #f60404"> <i>{{$item->begin}}</i>  <b> đến ngày </b>  <i>{{$item->finish}}</i></h5>
                    <h5 style="color: #f60404">Thời gian đăng kí còn lại :
{{--                        <h5 style="color: #2ca02c">{{($item->begin)-($item->finish)}}</h5>--}}
                    </h5>


                </div>
            </div>
        </div>
    </section>
@endforeach



@endsection
