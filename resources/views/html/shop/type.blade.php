
    <div class="row justify-content-center">
        <div class="col-md-10 mb-5 text-center">
            <ul class="product-category">
                <li><a href="{{url("/shop")}}" class="active">All</a></li>
                @foreach($categories as $item)
                <li><a href="{{url("/category",["category"=>$item->slug])}}">{{$item->name}}</a></li>
                @endforeach
                <li>
                    <div class="col-lg-9">
                        <div class="hero__search">
                            <div class="hero__search__form">
                                <form style="float: left;width: 300px;height: 20px;margin: 20px" action="/search" method="get">
                                    <input type="text" value="{{app("request")->input('q')}}" name="q" placeholder="What do you need?">
                                    <button style="float: right;background-color: #82ae46;border: 0 solid ;margin-left: -15px ;height: 34px" type="submit" class="site-btn">SEARCH</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
