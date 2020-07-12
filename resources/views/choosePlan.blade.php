@extends("layouts.siteStructure2")


@section("header")
    @parent

    <style>

        .col-xs-12 {
            margin: 20px;
        }

    </style>

@stop

@section("content")

    <center class="col-xs-12">
    <button onclick="document.location.href = '{{route('showAllProducts')}}'" class="btn btn-primary">فروشگاه کالا</button>
    </center>
    <center class="col-xs-12">
    <button class="btn btn-primary">پروژه ها</button>
    </center>
    <center class="col-xs-12">
    <button class="btn btn-primary">خدمات</button>
    </center>

@stop
