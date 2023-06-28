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
    <div id="countdown">
    <section class="ftco-section img" style="background-image: url({{$item->thumbnail}});margin: 100px">
        <div class="container">
{{--            <div class="row justify-content-end">--}}
                <div style="margin-bottom: 100px" class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                    <span style="font-size: 25px;" class="subheading"><b style="color: #f60404">Donor</b> : {{$item->donor}}</span>
                    <h2 style="color: #0da678;" class="mb-4">{{$item->name}}</h2>
                    <p style="color: white">{{$item->description}}</p>
                    <h5 style="color: #52b9ef"> <i>{{$item->begin}}</i>  <b>   _To_ </b>  <i>{{$item->finish}}</i></h5>
                    <h5 style="color: #f60404">Thời gian đăng kí còn lại :
                        <p style="color: #2ca02c">
                        <table>
                            <thead>
                            <tr>
                                <th>Days</th>
                                <th>Hours</th>
                                <th>Minutes</th>
                                <th>Sems</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>{{$remainingTime->days}} day</td>
                                <td>{{$remainingTime->h}}h</td>
                                <td>{{$remainingTime->i}}'</td>
                                <td><span id="s">{{ $remainingTime->s }}</span>s</td>
                            </tr>
                            </tbody>
                        </table>
                    </h5>


                </div>
            </div>
{{--        </div>--}}
    </section>


    </div>

    <script>
        // Lấy phần tử span của giây
        var secondsSpan = document.getElementById('s');

        // Định nghĩa hàm để cập nhật giây
        function updateSeconds() {
            // Giảm giá trị giây đi 1
            var s = parseInt(secondsSpan.innerHTML);
            s--;

            // Kiểm tra nếu giây nhỏ hơn 0, đặt lại giá trị là 59
            if (s < 0) {
                s = 59;
            }

            // Cập nhật giá trị giây vào phần tử span
            secondsSpan.innerHTML = s;
        }

        // Gọi hàm updateSeconds mỗi giây (1000 milliseconds)
        setInterval(updateSeconds, 1000);
    </script>
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
