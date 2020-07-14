@extends("layouts.siteStructure3")


@section("header")
    @parent
@stop

@section("banner")

    <div class="banner">
        <div class="bannerGrayBox"></div>
        <div class="bannerBorderBox bannerLightGreenBox"></div>
        <div class="bannerMainBox servicesBanner">
            <div class="bannerText">پروژه های خدماتی</div>
        </div>
    </div>

@stop

@section("content")

    <div class="c-swiper-specials firstWeek" style="margin-top: 100px">
        <section class="container container--home" id="sn-carousels-incredible-offer">
            <a class="c-swiper-specials__title c-swiper-specials__title--incredible"></a>

            <div class="c-swiper c-swiper--products c-swiper--specials">
                <div class="c-box">
                    <div class="swiper-container swiper-container-horizontal js-swiper-specials swiper-container-rtl">
                        <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">

                            @for($i = 0; $i < 2; $i++)
                                @foreach($services as $service)
                                    <div class="swiper-slide" style="margin-top: 20px">
                                        <li>
                                            <a href="{{route('showService', ['id' => $service->id])}}" class="c-product-box__box-link"></a>
                                            <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro">
                                                <div class="c-product-box__img js-url js-snt-carousel_product">
                                                    <img src="{{$service->pic}}" class="swiper-lazy swiper-lazy-loaded">
                                                </div>
                                                <div class="c-product-box__title">{{$service->title}}</div>
                                                <div class="c-product-box__row c-product-box__row--price">
                                                    <div class="c-price">
                                                        <div class="c-price__value c-price__value--plp">
                                                            <div class="c-price__value-wrapper">{{$service->star}} <span class="c-price__currency">ستاره</span>
                                                            </div>
                                                        </div>
                                                    </div>
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

                            @foreach($services as $service)
                                <div class="swiper-slide">
                                    <li>
                                        <a href="{{route('showService', ['id' => $service->id])}}" class="c-product-box__box-link"></a>
                                        <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro">
                                            <div class="c-product-box__img js-url js-snt-carousel_product">
                                                <img src="{{$service->pic}}" class="swiper-lazy swiper-lazy-loaded">
                                            </div>
                                            <div class="c-product-box__title">{{$service->title}}</div>
                                            <div class="c-product-box__row c-product-box__row--price">
                                                <div class="c-price">
                                                    <div class="c-price__value c-price__value--plp">
                                                        <div class="c-price__value-wrapper">{{$service->star}} <span class="c-price__currency">ستاره</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div><span class="c-price__currency">ظرفیت کل:</span><span>&nbsp;</span>{{$service->capacity}}</div>
                                            <div> <span class="c-price__currency">ظرفیت باقی مانده:</span><span>&nbsp;</span>{{$service->reminder}}</div>
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
