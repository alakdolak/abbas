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

        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/card.css")}}">
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/banner.css")}}">
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/header.css")}}">
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/footer.css")}}">
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/general.css")}}">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/v4-shims.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/chatbox.css")}}">


    @show
</head>

<body style="font-family: IRANSans; direction: rtl">

    @include("layouts.header")
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

    @include("layouts.footer")
    @include("layouts.support")

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
