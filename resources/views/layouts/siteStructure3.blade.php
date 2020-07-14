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
        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/choosePlan.css")}}">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/v4-shims.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">

        <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset("css/chatbox.css")}}">

        <style>

            @media (min-width: 1200px) {
                .col-lg-3 {
                    float: right;
                }
            }

        </style>
    @show
</head>

<body style="font-family: IRANSans; direction: rtl">

    @include("layouts.header")
    @yield("banner")


    @if(isset($tags))
        <div class="filterBorder">
            <div class="filterBox">
                <div id="allTags" class="tagFilter filterTag selectedTag" data-status="1" data-filter="-1">همه موارد</div>
                @foreach($tags as $tag)
                    <div data-status="0" class="tagFilter filterTag" data-filter="{{$tag->id}}">{{$tag->name}}</div>
                @endforeach
            </div>
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
