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
    <h1 style="text-align: center;color: #2ca02c;margin: 30px"><b>Events famous</b></h1>
    <div style="width: 300px;margin: auto;margin-top: 30px;margin-bottom: -60px;text-align: center" class="aside">
        <a style="text-align: center" class="btn btn-primary float-none" href="{{"/"}}">Home</a>
        <a style="text-align: center" class="btn btn-primary float-none" href="{{"/shop"}}">Shopping</a>
        <a style="text-align: center" class="btn btn-primary float-none" href="{{"/cart"}}">Cart</a>
    </div>
@foreach($events as $item)
    <div id="countdown">
    <section class="ftco-section img" style="background-image: url({{$item->thumbnail}});margin: 100px">
        <div class="container" style="margin-bottom: -100px">
{{--            <div class="row justify-content-end">--}}
                <div style="margin-bottom: 100px" class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <span style="font-size: 25px;" class="subheading"><b style="color: #f60404">Donor</b> : {{$item->donor}}</span>
                    <h2 style="color: #0da678;" class="mb-4">{{$item->name}}</h2>
                    <p style="color: white">{{$item->description}}</p>
                    <h5 style="color: #52b9ef"> <i>{{$item->begin}}</i>  <b>   _To_ </b>  <i>{{$item->finish}}</i></h5>
                    @php
                        $currentDateTime = Carbon\Carbon::now();
                        $futureDateTime = Carbon\Carbon::parse($item->finish);
                        $remainingTime = $currentDateTime->diff($futureDateTime);
                    @endphp

                    @if ($futureDateTime <= $currentDateTime)
                        <h5 style="color: #e50606">Thời gian đăng kí đã kết thúc !</h5>
                    @else
                    <h5 style="color: #f60404">Thời gian đăng kí còn lại :

                        <p style="color: #2ca02c">
                        <table>
                            <thead>
                            <tr>
                                <th>Days</th>
                                <th>Hours</th>
                                <th>Minutes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                    <td>{{$remainingTime->days}} day</td>
                                    <td>{{$remainingTime->h}}h</td>
                                    <td>{{$remainingTime->i}}'</td>
                            </tr>
                            </tbody>
                        </table>
                    </h5>
                    @endif

                    <a style="margin-left: 50px;margin-top: 10px" class="btn btn-primary float-none" href="{{url("/event",["event"=>$item->id])}}">Detail Event</a>
                </div>
            </div>
{{--        </div>--}}
    </section>
    </div>
@endforeach
@endsection
<style>
    table {
        width: 50%;
        border-collapse: collapse;
        margin: auto;
        margin-bottom: 50px;
        color: #11ab1d;
        font-size: 14px;
        text-align: center;
        float: left;

    }

    th, td {
        padding: 10px;
        text-align: center;
        border: 1px solid #0da678;

    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;

    }

    ul {
        margin-left: 10px;
        /*list-style: none;*/
        padding: 0;

    }

    li {
        margin-bottom: 5px;
    }
    td{
        color:white ;
    }
</style>
