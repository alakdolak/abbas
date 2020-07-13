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

@stop

@section("content")

    <div class="banner">
        <div class="bannerGrayBox"></div>
        <div class="bannerBorderBox bannerLightRedBox"></div>
        <div class="bannerMainBox projectsBanner">
            <div class="bannerText">انتخاب پروژه‌ها</div>
        </div>
    </div>

    <center style="margin: 40px;">
        <button id="allTags" class="tagFilter" data-status="0" data-filter="-1">همه</button>
        @foreach($tags as $tag)
            <button data-status="0" class="tagFilter" data-filter="{{$tag->id}}">{{$tag->name}}</button>
        @endforeach
    </center>

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

                            @for($i = 0; $i < 2; $i++)
                                @foreach($projects as $project)
                                    <div class="myItem swiper-slide" style="margin-top: 20px" data-tag="{{$project->tagStr}}">
                                        <li>
                                            <a href="{{route('showProject', ['id' => $project->id])}}" class="c-product-box__box-link"></a>
                                            <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro">
                                                <div class="c-product-box__img js-url js-snt-carousel_product">
                                                    <img src="{{$project->pic}}" class="swiper-lazy swiper-lazy-loaded">
                                                </div>
                                                <div class="c-product-box__title">{{$project->title}}</div>
                                                <div class="c-product-box__row c-product-box__row--price">
                                                    <div class="c-price">
                                                        <div class="c-price__value c-price__value--plp">
                                                            <div class="c-price__value-wrapper">{{$project->price}} <span class="c-price__currency">سکه</span>
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

                            @foreach($projects as $project)
                                <div class="myItem swiper-slide" data-tag="{{$project->tagStr}}">
                                    <li>
                                        <a href="{{route('showProject', ['id' => $project->id])}}" class="c-product-box__box-link"></a>
                                        <div class="c-product-box c-product-box--product-card c-product-box--has-overflow c-product-box--card-macro">
                                            <div class="c-product-box__img js-url js-snt-carousel_product">
                                                <img src="{{$project->pic}}" class="swiper-lazy swiper-lazy-loaded">
                                            </div>
                                            <div class="c-product-box__title">{{$project->title}}</div>
                                            <div class="c-product-box__row c-product-box__row--price">
                                                <div class="c-price">
                                                    <div class="c-price__value c-price__value--plp">
                                                        <div class="c-price__value-wrapper">{{$project->price}} <span class="c-price__currency">سکه</span>
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

    <script>

        $(document).ready(function () {

            $(".tagFilter").on('click', function () {

                if($(this).attr("data-filter") == "-1" && $(this).attr("data-status") == "0") {
                    $(".tagFilter").attr("data-status", "0").removeClass("selectedTag");
                    $(this).attr("data-status", "1");
                    $(this).addClass("selectedTag");
                    $(".myItem").removeClass("hidden");
                    return;
                }
                else if($(this).attr("data-filter") == "-1") {
                    $(this).attr("data-status", "0").removeClass("selectedTag");
                    $(".myItem").addClass("hidden");
                    return;
                }
                else {
                    $("#allTags").attr("data-status", "0").removeClass("selectedTag");
                }

                if($(this).attr("data-status") == "0") {
                    $(this).attr("data-status", "1");
                    $(this).addClass("selectedTag");
                }
                else {
                    $(this).attr("data-status", "0");
                    $(this).removeClass("selectedTag");
                }

                var selectedTags = [];

                $(".tagFilter").each(function () {
                    if($(this).attr("data-status") == "1")
                        selectedTags.push($(this).attr("data-filter"));
                });

                $(".myItem").addClass("hidden").each(function () {

                    for (var i = 0; i < selectedTags.length; i++) {
                        if($(this).attr("data-tag").includes("-" + selectedTags[i] + "-")) {
                            $(this).removeClass("hidden");
                            break;
                        }
                    }

                });

            });

        });

    </script>
@stop
