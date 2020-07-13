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


    @show
</head>

<body style="font-family: IRANSans; direction: rtl">

    @include("layouts.header")

    @yield("content")


    @include("layouts.footer")
    @include("layouts.support")

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

            @if(isset($msg) && count($msgs) > 0)
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

</body>
