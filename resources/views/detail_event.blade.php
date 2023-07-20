@extends("layouts.layout")
@section("main")

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a
                                href="{{"/event"}}">event</a></span> <span>Event detail</span></p>
                    <h1 class="mb-0 bread">Detail event</h1>
                </div>
            </div>
        </div>
    </div>


    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 ftco-animate">
                    <a href="images/product-1.jpg" class="image-popup"><img style="min-width: 600px;min-height:400px;margin-left: -50px" src="{{$event->thumbnail}}"
                                                                            class="img-fluid"
                                                                            alt="Colorlib Template"></a>
                </div>

                <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                        <h3 style="color: #e50606"><b style="color: rgba(51,48,48,0.5)">Name</b>:{{$event->name}}</h3>
                        <div class="rating d-flex">
                        </div>
                        <p class="price"><span
                                style="color: #7e16e0"><b style="color: rgba(51,48,48,0.5)">Donor</b>: {{$event->donor}}</span>
                        <p style="color: #4eb256">{{$event->description}}</p>
                    <h4>Để đăng kí vui lòng liên hệ: <a style="font-size: 18px" href="#">{{$event->contact}}</a></h4>

                    @php
                        $currentDateTime = Carbon\Carbon::now();
                        $futureDateTime = Carbon\Carbon::parse($event->finish);
                        $remainingTime = $currentDateTime->diff($futureDateTime);
                    @endphp

                    @if ($futureDateTime <= $currentDateTime)
                        <h5 style="color: #f60404">Thời gian đăng kí đã kết thúc !</h5>
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
                                <td>{{$remainingTime->days}}h</td>
                                <td>{{$remainingTime->days}}'</td>
                            </tr>
                            </tbody>
                        </table>
                    </h5>
                    @endif


                </div>
            </div>
        </div>
    </section>

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
        color: #070707;
    }
</style>
