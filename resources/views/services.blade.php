@extends("layouts.siteStructure2")


@section("header")
    @parent

    <style>

        * {
            outline: none!important;
        }

        a {
            color: #4a5f73;
            text-decoration: none;
        }
        a {
            background-color: transparent;
            -webkit-text-decoration-skip: objects;
        }

        .c-swiper-specials__title img {
            width: 100%;
            max-height: calc(100% - 41px);
            -o-object-fit: contain;
            object-fit: contain;
            -webkit-box-flex: 1;
            -ms-flex: 1;
            flex: 1;
            border-style: none;
            line-height: 22px;
        }

        .firstWeek {
            background: #ef394e;
            height: 780px;
        }

        .secondWeek {
            background: #6bb927;
        }

        .c-swiper-specials {
            width: 100%;
            margin-top: 16px;
        }

        .c-swiper-specials .container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            padding: 35px 16px;
            background-size: auto 100%;
            max-height: 500px;
        }

        .c-swiper-specials__title {
            margin: 0 44px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            width: 170px;
        }

        .c-swiper-specials__btn {
            padding: 9px 16px;
            font-size: 1rem;
            cursor: pointer;
            line-height: 1.571;
            font-weight: 700;
            border: 1px solid #fff;
            border-radius: 5px;
            color: #fff;
            text-decoration: none;
            box-shadow: none;
            user-select: none;
            display: inline-flex;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
            background: none;
            transition: all .3s ease-in-out;
            position: relative;
        }

        .c-swiper--specials, .c-swiper--specials .c-box {
            background: transparent;
        }
        .c-swiper--specials {
            margin-top: 0!important;
            -webkit-box-flex: 0;
            -ms-flex: 0 0 calc(100% - 258px);
            flex: 0 0 calc(100% - 258px);
            width: calc(100% - 258px);
            max-width: calc(100% - 258px);
            -webkit-box-shadow: none;
            box-shadow: none;
            padding: 0;
        }

        .c-swiper--products {
            margin: 16px 0 0;
            padding: 9px 33px 11px 0;
            max-width: 100%;
        }
        .c-box:first-child {
            margin-top: 0;
        }

        .c-box {
            background-color: #fff;
            position: relative;
        }

        .c-box .swiper-container {
            position: unset;
            padding-top: 3px;
        }

        .swiper-container {
            margin: 0 auto;
            position: relative;
            overflow: hidden;
            list-style: none;
            padding: 0;
            z-index: 1;
        }

        .c-swiper--products .swiper-wrapper {
            padding: 2px 0;
        }

        .swiper-slide {
            -ms-flex-negative: 0;
            flex-shrink: 0;
            height: 100%;
            width: 240px;
            display: block;
            float: right;
            background: no-repeat 50% 50%;
            background-size: cover;
            position: relative;
            -webkit-transition-property: -webkit-transform;
            transition-property: -webkit-transform;
            transition-property: transform;
            transition-property: transform,-webkit-transform;
        }

        .c-product-box__box-link {
            width: 100%;
            height: 100%;
            position: absolute;
            background: transparent;
            z-index: 2;
        }
        .c-swiper-specials--incredible .c-product-box {
            min-height: 385px;
        }
        .c-swiper--specials .c-product-box {
            padding-bottom: 25px;
        }
        .c-swiper--products .c-product-box {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            border: none;
            border-radius: 5px;
            background-color: #fff;
            text-align: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin: 0 5px;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            padding: 5px 15px 16px;
            position: relative;
        }

        .c-swiper--products .c-product-box__img {
            width: 180px;
            height: 180px;
            text-align: center;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            max-width: 100%;
            position: relative;
        }

        .c-product-box__title {
            display: block;
            overflow: hidden;
            font-size: 12px;
            font-size: .857rem;
            line-height: 30px;
            text-align: right;
            line-height: 22px;
            margin-top: 13px;
            height: 43px;
        }
        .c-product-box--card-macro .c-product-box__row--price {
            position: relative;
            top: 10px;
            margin-bottom: 10px;
        }
        .c-product-box__row--price {
            margin-top: 13px;
            height: 43px;
        }
        .c-product-box__row {
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            width: 100%;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: reverse;
            -ms-flex-direction: row-reverse;
            flex-direction: row-reverse;
        }

        .swiper-container {
            list-style: none;
        }

        .c-product-box__img img {
            max-width: 100%;
            max-height: 100%;
            -o-object-fit: contain;
            object-fit: contain;
        }

        .container {
            width: 100% !important;
        }

        .selectedTag {
            background-color: yellow;
        }

    </style>


    <style>
        .banner {
            height: 200px;
            display: flex;
            justify-content: center;
            position: relative;
        }
        .bannerGrayBox {
            width: 83%;
            height: 200px;
            background-color: #f9f9f9;
            position: absolute;
            z-index: 1;
        }
        .bannerBorderBox {
            width: 78%;
            height: 210px;
            position: absolute;
            top: 30px;
            z-index: 10;
        }
        .bannerLightRedBox {
            background-color: lightcoral;
        }
        .bannerLightBlueBox {
            background-color: lightblue;
        }
        .bannerLightGreenBox {
            background-color: lightgreen;
        }
        .bannerMainBox {
            width: 76%;
            height: 220px;
            position: absolute;
            top: 40px;
            z-index: 20;
            background-size: 64%;
            background-repeat: no-repeat;
        }
        .projectsBanner {
            background-image: url("{{URL::asset('images/projectsBanner.png')}}");
            background-color: #f15b47;
        }
        .servicesBanner {
            background-image: url("{{URL::asset('images/servicesBanner.png')}}");
            background-color: rgb(155, 193, 60);
        }
        .productsBanner {
            background-image: url("{{URL::asset('images/productsBanner.png')}}");
            background-color: rgb(51, 163, 220);
        }
        .bannerText {
            font-size: 3em;
            font-weight: 700;
            color: white;
            position: absolute;
            bottom: 20%;
            right: 10%;
        }
    </style>

@stop

@section("content")

    <div class="banner">
        <div class="bannerGrayBox"></div>
        <div class="bannerBorderBox bannerLightGreenBox"></div>
        <div class="bannerMainBox servicesBanner">
            <div class="bannerText">پروژه های خدماتی</div>
        </div>
    </div>

    <div class="c-swiper-specials firstWeek" style="margin-top: 100px">
        <section class="container container--home" id="sn-carousels-incredible-offer">
            <a href="/incredible-offers/" class="c-swiper-specials__title c-swiper-specials__title--incredible" title="پیشنهاد شگفت&zwnj;انگیز">
                <img src="https://www.digikala.com/static/files/b6c724a0.png" alt="پیشنهاد شگفت&zwnj;انگیز">
                <div class="o-btn c-swiper-specials__btn">مشاهده همه</div>
            </a>
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
            <a href="/incredible-offers/" class="c-swiper-specials__title c-swiper-specials__title--incredible" title="پیشنهاد شگفت&zwnj;انگیز">
                <img src="https://www.digikala.com/static/files/b6c724a0.png" alt="پیشنهاد شگفت&zwnj;انگیز">
                <div class="o-btn c-swiper-specials__btn">مشاهده همه</div>
            </a>
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
