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

        #chat-bot-launcher-container.chat-bot-launcher-enabled #chat-bot-launcher {
            visibility: visible !important;
            animation: launcher-frame-appear 0.25s ease forwards;
        }

        #chat-bot-launcher-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            direction: ltr !important;
            z-index: 2147482999;
        }

        #chat-bot-launcher-container .chat-bot-launcher {
            font-family: "Open Sans",sans-serif;
            height: 42px;
            visibility: hidden;
            -webkit-transform: translateZ(0);
            border-radius: 5em;
            cursor: pointer;
            padding: 0px 20px;
            -webkit-transition: -webkit-transform .15s ease-in-out, box-shadow .15s ease-in-out!important;
            -moz-transition: -moz-transform .15s ease-in-out, box-shadow .15s ease-in-out!important;
            -o-transition: -o-transform .15s ease-in-out, box-shadow .15s ease-in-out!important;
            transition: transform .15s ease-in-out, box-shadow .15s ease-in-out!important;
        }

        .chat-bot-flex-center {
            justify-content: center;
        }

        .chat-bot-flex-center, .chat-bot-flex-end {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            align-items: center;
        }

        .container {
            width: 100% !important;
        }

    </style>

@stop

@section("content")

    <div class="c-swiper-specials firstWeek">
        <section class="container container--home" id="sn-carousels-incredible-offer">
            <a href="/incredible-offers/" class="c-swiper-specials__title c-swiper-specials__title--incredible" title="پیشنهاد شگفت&zwnj;انگیز">
                <img src="https://www.digikala.com/static/files/b6c724a0.png" alt="پیشنهاد شگفت&zwnj;انگیز">
                <div class="o-btn c-swiper-specials__btn">مشاهده همه</div>
            </a>
            <div class="c-swiper c-swiper--products c-swiper--specials">
                <div class="c-box">
                    <div class="swiper-container swiper-container-horizontal js-swiper-specials swiper-container-rtl">
                        <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">

                            <div class="swiper-slide" style="">
                                <li>
                                    <a href="/product/dkp-2445080/عطر-جیبی-زنانه-اسمارت-کالکشن-مدل-euphoria-حجم-20-میلی-لیتر-مجموعه-3-عددی" class="c-product-box__box-link"></a>
                                    <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro " title="">
                                        <div class="c-product-box__img js-url js-snt-carousel_product" title="عطر جیبی زنانه اسمارت کالکشن مدل Euphoria حجم 20 میلی لیتر مجموعه 3 عددی">
                                            <img alt="" src="https://dkstatics-public.digikala.com/digikala-products/119170399.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60" class="swiper-lazy swiper-lazy-loaded">
                                        </div>
                                        <div class="c-product-box__title">عطر جیبی زنانه اسمارت کالکشن مدل Euphoria حجم 20 میلی لیتر مجموعه 3 عددی</div>
                                        <div class="c-product-box__row c-product-box__row--price">
                                            <div class="c-price">
                                                <div class="c-price__value c-price__value--plp">
                                                    <div class="c-price__value-wrapper">۳۳,۹۰۰ <span class="c-price__currency">تومان</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>

                            <div class="swiper-slide" style="">
                                <li>
                                    <a href="/product/dkp-2539030/پایه-نگهدارنده-گوشی-موبایل-مانوک-کد-013" class="c-product-box__box-link"></a>
                                    <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro " title="">
                                        <div class="c-product-box__img js-url js-snt-carousel_product" title="پایه نگهدارنده گوشی موبایل مانوک کد 013">
                                            <img alt="" src="https://dkstatics-public.digikala.com/digikala-products/119736610.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60" class="swiper-lazy swiper-lazy-loaded">
                                        </div>
                                        <div class="c-product-box__title">پایه نگهدارنده گوشی موبایل مانوک کد 013</div>
                                        <div class="c-product-box__row c-product-box__row--price">
                                            <div class="c-price">
                                                <div class="c-price__value c-price__value--plp">
                                                    <div class="c-price__value-wrapper">۱۵,۰۰۰ <span class="c-price__currency">تومان</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>

                            <div class="swiper-slide" style="">
                                <li>
                                    <a href="/product/dkp-2495969/ست-هدیه-مردانه-دلنیا-مدل-es11" class="c-product-box__box-link"></a>
                                    <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro " title="">
                                        <div class="c-product-box__img js-url js-snt-carousel_product" title="ست هدیه مردانه دلنیا مدل ES11">
                                            <img alt="" src="https://dkstatics-public.digikala.com/digikala-products/119465318.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60" class="swiper-lazy swiper-lazy-loaded">
                                        </div>
                                        <div class="c-product-box__title">ست هدیه مردانه دلنیا مدل ES11</div>
                                        <div class="c-product-box__row c-product-box__row--price">
                                            <div class="c-price">
                                                <div class="c-price__value c-price__value--plp">
                                                    <div class="c-price__value-wrapper">۸۹,۰۰۰ <span class="c-price__currency">تومان</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>

                            <div class="swiper-slide" style="">
                                <li>
                                    <a href="/product/dkp-829983/چراغ-آویز-چشمه-نور-کد-a70201h-cr" class="c-product-box__box-link"></a>
                                    <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro " title="">
                                        <div class="c-product-box__img js-url js-snt-carousel_product" title="چراغ آویز چشمه نور کد A7020/1H-CR">
                                            <img alt="" src="https://dkstatics-public.digikala.com/digikala-products/4063741.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60" class="swiper-lazy swiper-lazy-loaded">
                                        </div>
                                        <div class="c-product-box__title">چراغ آویز چشمه نور کد A7020/1H-CR</div>
                                        <div class="c-product-box__row c-product-box__row--price">
                                            <div class="c-price">
                                                <div class="c-price__value c-price__value--plp">
                                                    <div class="c-price__value-wrapper">۱۲۵,۰۰۰ <span class="c-price__currency">تومان</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>

                            <div class="swiper-slide" style=" margin-top: 20px">
                                <li>
                                    <a href="/product/dkp-829983/چراغ-آویز-چشمه-نور-کد-a70201h-cr" class="c-product-box__box-link"></a>
                                    <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro " title="">
                                        <div class="c-product-box__img js-url js-snt-carousel_product" title="چراغ آویز چشمه نور کد A7020/1H-CR">
                                            <img alt="" src="https://dkstatics-public.digikala.com/digikala-products/4063741.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60" class="swiper-lazy swiper-lazy-loaded">
                                        </div>
                                        <div class="c-product-box__title">چراغ آویز چشمه نور کد A7020/1H-CR</div>
                                        <div class="c-product-box__row c-product-box__row--price">
                                            <div class="c-price">
                                                <div class="c-price__value c-price__value--plp">
                                                    <div class="c-price__value-wrapper">۱۲۵,۰۰۰ <span class="c-price__currency">تومان</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>

                            <div class="swiper-slide" style=" margin-top: 20px">
                                <li>
                                    <a href="/product/dkp-829983/چراغ-آویز-چشمه-نور-کد-a70201h-cr" class="c-product-box__box-link"></a>
                                    <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro " title="">
                                        <div class="c-product-box__img js-url js-snt-carousel_product" title="چراغ آویز چشمه نور کد A7020/1H-CR">
                                            <img alt="" src="https://dkstatics-public.digikala.com/digikala-products/4063741.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60" class="swiper-lazy swiper-lazy-loaded">
                                        </div>
                                        <div class="c-product-box__title">چراغ آویز چشمه نور کد A7020/1H-CR</div>
                                        <div class="c-product-box__row c-product-box__row--price">
                                            <div class="c-price">
                                                <div class="c-price__value c-price__value--plp">
                                                    <div class="c-price__value-wrapper">۱۲۵,۰۰۰ <span class="c-price__currency">تومان</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>

                            <div class="swiper-slide" style=" margin-top: 20px">
                                <li>
                                    <a href="/product/dkp-829983/چراغ-آویز-چشمه-نور-کد-a70201h-cr" class="c-product-box__box-link"></a>
                                    <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro " title="">
                                        <div class="c-product-box__img js-url js-snt-carousel_product" title="چراغ آویز چشمه نور کد A7020/1H-CR">
                                            <img alt="" src="https://dkstatics-public.digikala.com/digikala-products/4063741.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60" class="swiper-lazy swiper-lazy-loaded">
                                        </div>
                                        <div class="c-product-box__title">چراغ آویز چشمه نور کد A7020/1H-CR</div>
                                        <div class="c-product-box__row c-product-box__row--price">
                                            <div class="c-price">
                                                <div class="c-price__value c-price__value--plp">
                                                    <div class="c-price__value-wrapper">۱۲۵,۰۰۰ <span class="c-price__currency">تومان</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>

                            <div class="swiper-slide" style=" margin-top: 20px">
                                <li>
                                    <a href="/product/dkp-829983/چراغ-آویز-چشمه-نور-کد-a70201h-cr" class="c-product-box__box-link"></a>
                                    <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro " title="">
                                        <div class="c-product-box__img js-url js-snt-carousel_product" title="چراغ آویز چشمه نور کد A7020/1H-CR">
                                            <img alt="" src="https://dkstatics-public.digikala.com/digikala-products/4063741.jpg?x-oss-process=image/resize,m_lfit,h_350,w_350/quality,q_60" class="swiper-lazy swiper-lazy-loaded">
                                        </div>
                                        <div class="c-product-box__title">چراغ آویز چشمه نور کد A7020/1H-CR</div>
                                        <div class="c-product-box__row c-product-box__row--price">
                                            <div class="c-price">
                                                <div class="c-price__value c-price__value--plp">
                                                    <div class="c-price__value-wrapper">۱۲۵,۰۰۰ <span class="c-price__currency">تومان</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </div>
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

                            @foreach($products as $product)
                                <div class="swiper-slide" style="">
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

    <div id="root" class="hidden">

        <style>

            .header-wrapper {
                max-width: 550px;
                position: relative;
                margin: auto;
                display: block;
            }

            .avatar {
                background-color: #0746a6;
                background-image: url(https://avatars.collectcdn.com/598ff4f202d261c127a66d21-5a151f2ef3257d0f15c68376.png);
            }
            .theme-color {
                color: #0746a6;
            }
            .theme-border {
                border-color: #0746a6;
            }
            .highlight{
                border-color: #0746a6;
            }
            .theme-background {
                background-color: #0746a6!important;
            }
            .theme-border:after {
                border-color: #0746a6 !important;
            }
            .theme-border:hover ::before {
                background-color: #0746a6;
            }
            .is-selected .pika-button {
                background-color: #0746a6;
            }
            .slot-selected {
                background-color: #0746a6 !important;
                color: white;
            }
            .slot-selected .slot-content:before {
                background-color: #0746a6 !important;
            }

            .progress-bar::-webkit-progress-value {
                background: #0746a6;
            }

            .progress-bar::-moz-progress-bar {
                background: #0746a6;
            }
            .restart-launcher {
                background-color: #0746a6 !important;
            }
            .active {
                background-color: #0746a6;
                color: white
            }
            .opinion-button:hover {
                background-color: #0746a6;
                color: white
            }

            .fixed-height {
                position: fixed;
                top: 10%;
                background-color: white;
                right: 15px;
                bottom: 0;
                width: 350px;
                height: 80%;
                overflow-y: auto;
                -webkit-overflow-scrolling: touch;
                transition: all 1s ease-in-out;
            }

            .conversation-part--animation {
                -webkit-animation: moveFromBottom 0.6s ease both;
                -moz-animation: moveFromBottom 0.6s ease both;
                -o-animation: moveFromBottom 0.6s ease both;
                animation: moveFromBottom 0.6s ease both;
            }

            .chatbox {
                max-width: 550px;
                margin: 0 auto 40px auto;
                padding: 40px 15px 20px;
                height: 100%;
            }

            .conversation-part--question {
                max-width: 100%;
                margin-bottom: 8px;
            }

            .conversation-part {
                margin-bottom: 2px;
                overflow: hidden;
            }

            .question-part {
                max-width: 86%;
                transition: width 2s;
                overflow: hidden;
            }

            .conversation-part .same-row {
                display: inline-block;
                vertical-align: top;
            }

            .avatar-wrapper {
                height: 28px;
                width: 28px;
                margin-right: 10px;
            }

            .avatar {
                height: 28px;
                width: 28px;
                border-radius: 50%;
                -webkit-border-radius: 50%;
                -moz-border-radius: 50%;
                left: 0;
                top: 2px;
                background-size: 29px;
                background-repeat: no-repeat;
                background-position: 50%;
            }

            .conversation-part--question {
                max-width: 100%;
                margin-bottom: 8px;
            }

            .no-border {
                border-width: 0;
            }

            .bubble {
                border-radius: 1.3em;
                border: 1px solid transparent;
                padding: 10px 17px;
                transition: width 2s;
                word-break: break-word;
                line-height: 20px;
                background-color: #f8f8f8;
            }

            #chat-bot-widget-close {
                z-index: 2147483001;
                cursor: pointer;
                background-size: 15px;
                background-repeat: no-repeat;
                background-position: center;
                position: absolute;
                top: 12%;
                right: 30px;
                width: 30px;
                height: 30px;
                background-color: transparent;
                border-radius: 50%;
                font-family: "Glyphicons Halflings" !important;
            }

            #chat-bot-widget-refresh {
                z-index: 2147483001;
                cursor: pointer;
                background-size: 15px;
                background-repeat: no-repeat;
                background-position: center;
                position: absolute;
                top: 12%;
                right: 60px;
                width: 30px;
                height: 30px;
                background-color: transparent;
                border-radius: 50%;
                font-family: "Glyphicons Halflings" !important;
            }

        </style>

        <div class="header-wrapper"></div>
        <div class="fixed-height" id="chatbox-container">
            <div class="chatbox  conversation-part--animation ">
                <div class="conversation-part conversation-part--question">
                    <div class="avatar-wrapper same-row">
                        <div class="avatar"></div>
                    </div>
                    <div class="same-row question-part text-ltr">
                        <div class="bubble no-border" style="display: table; direction: unset;">
                            <div class="bubble-label">
                                <div>Welcome to<strong> Collect.chat</strong>
                                </div>
                                <img src="https://media.giphy.com/media/l49K0d8RQ0kPh41uE/giphy.gif" style="height:auto; width:auto;">
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="conversation-part conversation-part--question">
                    <div class="avatar-wrapper same-row"></div>
                    <div class="same-row question-part text-ltr">
                        <div class="bubble no-border" style="display: table; direction: unset;">
                            <div class="bubble-label">
                                <div><strong>Out of curiosity</strong>, can we ask you something?</div>
                            </div>
                            <div class="option-wrapper">
                                <div class="bubble bubble-inline option theme-border theme-color">
                                    <div>Yes</div>
                                </div>
                            </div>
                        </div><span class="comment">Just now</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-buttons"></div>

        <div id="chat-bot-widget-close" class="glyphicon glyphicon-remove" title="Close"></div>
        <div id="chat-bot-widget-refresh" class="glyphicon glyphicon-refresh" title="Close"></div>
    </div>

    <div id="chat-bot-launcher-container" class="chat-bot-flex-end chat-bot-launcher-enabled">
        <div id="chat-bot-launcher" class="chat-bot-launcher chat-bot-flex-center chat-bot-launcher-active" style="background-color: rgb(7, 70, 166);"><div id="chat-bot-launcher-button" class="chat-bot-launcher-button"></div><div style="color: white; font-family: IRANSans" id="chat-bot-launcher-text">پشتیبانی آنلاین</div></div>
    </div>

    <script>

        $(document).ready(function () {

            $("#chat-bot-launcher").on("click", function () {

                $("#root").removeClass("hidden");

            });

            $("#chat-bot-widget-close").on('click', function () {
                $("#root").addClass("hidden");
            });

        });

    </script>

@stop
