@extends("layouts.layout")
@section("main")

    <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
                        <span>Contact us</span></p>
                    <h1 class="mb-0 bread"></h1>
                </div>
            </div>
        </div>
    </div>

    <h3 style="color: #4a5568;text-align: center;margin-bottom: 50px;margin-top: 50px">You must be <a href="{{"/login"}}">logged in</a> before viewing an invoice or making a purchase!</h3>

@endsection
<style>

</style>
