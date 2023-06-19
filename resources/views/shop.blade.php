@extends("layouts.layout")
@section("title","Shop ")
@section("main")

    @include("html.shop.describe")

    <section class="ftco-section">

        <div class="container">
            <div style="margin-top:30px; margin-left: 5%;margin-right: 70px">
                @include("html.shop.type")
            </div>
            @include("html.shop.products")
        </div>
    </section>
@endsection
