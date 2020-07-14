@extends("layouts.siteStructure3")


@section("header")
    @parent

@stop

@section("banner")

    <div class="banner">
        <div class="bannerGrayBox"></div>
        <div class="bannerBorderBox bannerLightBlueBox"></div>
        <div class="bannerMainBox productsBanner">
            <div class="bannerText">معرفی محصولات</div>
        </div>
    </div>

@stop

@section("content")

    <div class="c-swiper-specials firstWeek">
        <section class="container container--home" id="sn-carousels-incredible-offer">
            <a class="c-swiper-specials__title c-swiper-specials__title--incredible"></a>
            <div class="c-swiper c-swiper--products c-swiper--specials">
                <div class="c-box">
                    <div class="swiper-container swiper-container-horizontal js-swiper-specials swiper-container-rtl">
                        <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                            @for($i = 0; $i < 4; $i++)
                                @foreach($products as $product)
                                    <div class="myItem swiper-slide" style="margin-top: 20px" data-tag="{{$product->tagStr}}">
                                        <li>
                                            <a href="{{route('showProduct', ['id' => $product->id])}}" class="c-product-box__box-link"></a>
                                            <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro">
                                                <div class="c-product-box__img js-url js-snt-carousel_product">
                                                    <img src="{{$product->pic}}" class="swiper-lazy swiper-lazy-loaded">
                                                </div>
                                                <div class="c-product-box__title">{{$product->name}}</div>
                                                <div class="c-product-box__row c-product-box__row--price">
                                                    <div class="c-price">
                                                        <div class="c-price__value c-price__value--plp">
                                                            <div class="c-price__value-wrapper">{{$product->price}} <span class="c-price__currency">سکه</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <p style="direction: rtl; text-align: right">
                                                        @foreach($product->tags as $tag)
                                                            <span>#{{$tag->name}}</span>
                                                            <span>&nbsp;&nbsp;</span>
                                                        @endforeach
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    </div>
                                @endforeach
                            @endfor
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="c-swiper-specials secondWeek">
        <section class="container container--home" id="sn-carousels-incredible-offer">
            <a class="c-swiper-specials__title c-swiper-specials__title--incredible"></a>
            <div class="c-swiper c-swiper--products c-swiper--specials">
                <div class="c-box">
                    <div class="swiper-container swiper-container-horizontal js-swiper-specials swiper-container-rtl">
                        <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">

                            @foreach($products as $product)
                                <div class="myItem swiper-slide" data-tag="{{$product->tagStr}}">
                                    <li>
                                        <a href="{{route('showProduct', ['id' => $product->id])}}" class="c-product-box__box-link"></a>
                                        <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro">
                                            <div class="c-product-box__img js-url js-snt-carousel_product">
                                                <img src="{{$product->pic}}" class="swiper-lazy swiper-lazy-loaded">
                                            </div>
                                            <div class="c-product-box__title">{{$product->name}}</div>
                                            <div class="c-product-box__row c-product-box__row--price">
                                                <div class="c-price">
                                                    <div class="c-price__value c-price__value--plp">
                                                        <div class="c-price__value-wrapper">{{$product->price}} <span class="c-price__currency">سکه</span>
                                                        </div>
                                                    </div>
                                                </div>

                                                <p style="direction: rtl; text-align: right">
                                                    @foreach($product->tags as $tag)
                                                        <span>#{{$tag->name}}</span>
                                                        <span>&nbsp;&nbsp;</span>
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>

@stop
