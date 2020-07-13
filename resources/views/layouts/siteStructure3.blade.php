<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->


<head>
    @section('header')

        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta charset="utf-8" />
        <meta name="_token" content="{{ csrf_token() }}"/>
        <link href="{{URL::asset('css/myFont.css')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/header.css")}}">
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/footer.css")}}">
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/general.css")}}">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/v4-shims.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/chatbox.css")}}">

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

            .selectedTag {
                background-color: yellow;
            }

        </style>


        <style>
            .profileIconBox {
                padding: 3px;
                border: 1px solid #ffd568;
                border-radius: 50%;
                background-color: #ffd568;
            }
            .profileIcon {
                width: 35px;
                height: 35px;
                background-image: url("images/profile.png");
                background-size: 100%;
                background-repeat: no-repeat;
            }
            .profilePopUp {
                position: absolute;
                width: 150px;
                padding: 10px 15px;
                background-color: #f2f2f2;
                border: 5px solid #c5c5c5;
                border-radius: 7px;
                margin-top: 20px;
                left: -5px;
                cursor: context-menu;
            }
            .rightArrowIcon {
                position: absolute;
                top: -20px;
                left: 10%;
                transform: rotate(180deg);
                font-size: 2.5em;
                color: #c5c5c5;
            }
            .profileRowPopUp {
                color: #c5c5c5;
                padding: 5px 0;
                border-bottom: 1.5px solid #c5c5c5;
                text-align: right;
            }
            .profilePopUpIconBox {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
            .profilePopUpIcon {
                width: 22px;
                height: 22px;
                background-size: 100%;
                background-repeat: no-repeat;
            }
            .profileName{
                font-weight: 600;
                color: #404040 !important;
            }
            .coinIcon {
                background-image: url("{{\Illuminate\Support\Facades\URL::asset("images/coin.png")}}");
            }
            .starIcon {
                background-image: url("{{\Illuminate\Support\Facades\URL::asset("images/star.png")}}");
            }
            .profileLogoutBox {
                display: flex;
                justify-content: space-around;
                align-items: center;
                padding: 5px 0;
                color: #404040;
                cursor: pointer;
            }
            .logoutIcon {
                width: 15px;
                height: 17px;
                background-image: url("{{\Illuminate\Support\Facades\URL::asset("images/rightArrow.png")}}");
                background-size: 100%;
                background-repeat: no-repeat;
            }
            .logoutText {
                font-size: 0.8em;
                font-weight: 500;
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

    @show
</head>

<body style="font-family: IRANSans; direction: rtl">

    <div class="header">

        <div onclick="document.location.href = '{{route('choosePlan')}}'" class="logoDiv">
            <div class="logoPic"></div>
            <div class="logoText"></div>
        </div>

        <div class="myNav">
            <div onclick="document.location.href = '{{route('showAllProjects')}}'" class="myNavbar">معرفی پروژه‌ها</div>
            <div onclick="document.location.href = '{{route('showAllServices')}}'" class="myNavbar">پروژه‌های خدماتی</div>
            <div onclick="document.location.href = '{{route('showAllProducts')}}'" class="myNavbar">معرفی محصولات</div>

            <div class="myNavbar">
                <div onclick="if($('#profilePopUp').hasClass('hidden')) { $('#profilePopUp').removeClass('hidden'); } else $('#profilePopUp').addClass('hidden');" class="profileIconBox">
                    <div class="profileIcon"></div>
                </div>
                <div id="profilePopUp" class="profilePopUp hidden">
                    <i class="fa fa-sort-desc rightArrowIcon"></i>
                    <div onclick="document.location.href = '{{route('profile')}}'" class="profileRowPopUp profileName">{{\Illuminate\Support\Facades\Auth::user()->first_name . ' ' . \Illuminate\Support\Facades\Auth::user()->last_name}}</div>
                    <div class="profileRowPopUp profilePopUpIconBox">
                        <div>تعداد سکه: {{\Illuminate\Support\Facades\Auth::user()->money}}</div>
                        <div class="profilePopUpIcon coinIcon"></div>
                    </div>
                    <div class="profileRowPopUp profilePopUpIconBox">
                        <div>تعداد ستاره: {{\Illuminate\Support\Facades\Auth::user()->stars}}</div>
                        <div class="profilePopUpIcon starIcon"></div>
                    </div>
                    <div onclick="document.location.href = '{{route('logout')}}'" class="profileLogoutBox">
                        <div class="logoutIcon"></div>
                        <div class="logoutText">خروج از حساب کاربری</div>
                    </div>
                </div>
            </div>

{{--            <div onclick="document.location.href = '{{route('profile')}}'" class="myNavbar">پروفایل</div>--}}
        </div>
    </div>

    @yield("banner")


    @if(isset($tags))
        <div style="margin: 100px 12% 25px; text-align: center;">
            <button id="allTags" class="tagFilter selectedTag" data-status="1" data-filter="-1">همه موارد</button>
            @foreach($tags as $tag)
                <button data-status="0" class="tagFilter" data-filter="{{$tag->id}}">{{$tag->name}}</button>
            @endforeach
        </div>
    @endif


    @yield("content")

    <?php
        $msgs = \Illuminate\Support\Facades\DB::select("select m.id, m.text, m.is_me, m.created_at from chat c, msg m where c.id = m.chat_id and c.user_id = " . \Illuminate\Support\Facades\Auth::user()->id
            . " and c.created_at > DATE_SUB(NOW(), INTERVAL 6 HOUR) order by m.id asc");

        foreach ($msgs as $msg) {
            $timestamp = strtotime($msg->created_at);
            $msg->time = MiladyToShamsiTime($timestamp);
        }
    ?>

    <footer class="footer">
        <div class="footerDescript">
            <div class="footerSlogan">کـارســــــتون، تـجـربـه‌ی یـک کـارآفـریـنـی</div>
            <div class="footerLinksDiv">
                <div class="footerLinks">
                    <div class="footerLogo rules"></div>
                    <div class="footerLogoText">قوانین سایت</div>
                </div>
                <div class="footerLinks">
                    <div class="footerLogo contactUs"></div>
                    <div class="footerLogoText">تماس با ما</div>
                </div>
            </div>
        </div>

        <div class="serajDescript">
            <div class="address"></div>
            <div class="serajLogo"></div>
        </div>
    </footer>

    <div id="root" class="hidden">

        <div class="header-wrapper"></div>
        <div class="fixed-height" id="chatbox-container">
            <div class="chatbox  conversation-part--animation" id="msgs">
                <div class="conversation-part conversation-part--question">
                    <div class="avatar-wrapper same-row">
                        <div class="avatar"></div>
                    </div>
                    @if(count($msgs) == 0)
                        <div class="same-row question-part text-ltr">
                            <div class="bubble no-border" style="display: table; direction: unset;">
                                <div class="bubble-label">
                                        <div>به مرکز پشتیبانی خوش آمدید.</div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                @foreach($msgs as $msg)
                    <div class="conversation-part conversation-part--question" >
                        <div class="avatar-wrapper same-row"></div>
                        <div class="same-row question-part text-ltr" style="{{($msg->is_me) ? "float: left;" : "float: right;"}}">
                            <div class="bubble no-border" style="display: table; direction: unset;">
                                <div class="bubble-label">
                                    <div>{{$msg->text}}</div>
                                </div>

                            </div>

                            <span class="comment">{{$msg->time}}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="composer">
                <pre class="send-button glyphicon glyphicon-send"></pre>
                <textarea id="textInput" placeholder="سوال خود را بنویسید."></textarea>
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

        var lastId = -1;

        $(document).ready(function () {

            $("#chat-bot-launcher").on("click", function () {

                $("#root").removeClass("hidden");

            });

            $("#chat-bot-widget-close").on('click', function () {
                $("#root").addClass("hidden");
            });

            $("#chat-bot-widget-refresh").on("click", function () {
                reload();
            });

            @if(count($msgs) > 0)
                lastId = '{{$msgs[count($msgs) - 1]->id}}';
            @endif

        });

        $("#textInput").on("keypress", function (e) {

            if(e.keyCode === 13) {
                e.preventDefault();
                sendMsg();
            }

        });

        function reload() {

            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: '{{route('reloadMsgs')}}',
                data: {
                    lastId: lastId,
                },
                success: function (res) {

                    res = JSON.parse(res);

                    if(res.status === "ok") {

                        res = res.msgs;

                        for(var i = 0; i < res.length; i++) {
                            var newElem = '<div class="conversation-part conversation-part--question">';
                            newElem += '<div class="avatar-wrapper same-row"></div>';
                            newElem += '<div class="same-row question-part text-ltr" style="float: right">';
                            newElem += '<div class="bubble no-border" style="display: table; direction: unset;">';
                            newElem += '<div class="bubble-label">';
                            newElem += '<div>' + res[i].text + '</div></div></div>';
                            newElem += '<span class="comment">' + res[i].time + '</span>';
                            newElem += '</div></div>';
                            $("#msgs").append(newElem);
                        }

                        if(res.length > 0)
                            lastId = res[res.length - 1].id;
                    }

                }
            });
        }

        function sendMsg() {

            var x = $("#textInput").val();
            if(x.length === 0)
                return;

            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: '{{route('sendMsg')}}',
                data: {
                    msg: x,
                },
                success: function (res) {

                    res = JSON.parse(res);

                    if(res.status === "ok") {

                        var newElem = '<div class="conversation-part conversation-part--question">';
                        newElem += '<div class="avatar-wrapper same-row"></div>';
                        newElem += '<div class="same-row question-part text-ltr" style="float: left">';
                        newElem += '<div class="bubble no-border" style="display: table; direction: unset;">';
                        newElem += '<div class="bubble-label">';
                        newElem += '<div>' + x + '</div></div></div>';
                        newElem += '<span class="comment">' + res.sendTime + '</span>';
                        newElem += '</div></div>';
                        $("#msgs").append(newElem);
                        $("#textInput").val("");
                        lastId = res.id;
                    }

                }
            });
        }

    </script>

    <script>

        $(document).ready(function () {

            $(".tagFilter").on('click', function () {

                var status = $(this).attr("data-status");
                $(".tagFilter").attr("data-status", "0").removeClass("selectedTag");

                var selectedTag;

                if(status == "0") {
                    $(this).attr("data-status", "1").addClass("selectedTag");
                    selectedTag = $(this).attr("data-filter");
                }
                else {
                    $(this).attr("data-status", "0").removeClass("selectedTag");
                    selectedTag = -2;
                }

                if(selectedTag == "-1") {

                    if(status == "0") {
                        $(".myItem").removeClass("hidden");
                    }
                    else {
                        $(".myItem").addClass("hidden");
                    }
                    return;
                }

                $(".myItem").addClass("hidden").each(function () {

                    if($(this).attr("data-tag").includes("-" + selectedTag + "-")) {
                        $(this).removeClass("hidden");
                    }

                });

            });


        });

    </script>

</body>
