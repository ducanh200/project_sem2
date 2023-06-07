@extends("layout.layout")
@section("title","Shop ")
@section("main")

    @include("html.shop.describe")

    <section class="ftco-section">

        <div class="container">

            @include("html.shop.type")

            @include("html.shop.products")
        </div>
    </section>
@endsection
