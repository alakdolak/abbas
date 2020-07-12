@extends('layouts.structure')

@section('header')
    @parent

    <style>

        label {
            width: 400px;
        }

        input {
            text-align: center;
        }

    </style>

@stop

@section('content')

    <center style="margin-top: 200px">

        <form method="post" action="{{route('doConfig')}}">

            {{csrf_field()}}

            <div>
                <label for="change_rate">نرخ تبدیل ستاره به سکه (هر ستاره برابر است با ... سکه)</label>
                <input id="change_rate" value="{{$config->change_rate}}" name="change_rate" type="number">
            </div>

            <div>
                <label for="initial_point">مقدار سکه اولیه دانش آموزان</label>
                <input value="{{$config->initial_point}}" id="initial_point" name="initial_point" type="number">
            </div>

            <div>
                <label for="initial_star">مقدار ستاره اولیه دانش آموزان</label>
                <input value="{{$config->initial_star}}" id="initial_star" name="initial_star" type="number">
            </div>

            <div>
                <label for="project_limit">محدودیت تعداد خرید پروژه ها در هفته</label>
                <input value="{{$config->project_limit}}" id="project_limit" name="project_limit" type="number">
            </div>

            <div style="margin-top: 30px">
                <input type="submit" class="btn btn-success" value="ذخیره">
            </div>
        </form>

    </center>
@stop
