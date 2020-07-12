@extends('layouts.siteStructure')

@section('header')
    @parent

@stop

@section('content')

    <div style="margin-top: 100px">

        @foreach($projects as $project)

            <div style="width: 300px; float: right; margin: 7px; padding: 6px; border: 2px solid; border-radius: 7px">
                <img width="200px" src="{{$project->pic}}">
                <h3>{{$project->title}}</h3>
                <p>هزینه: {{$project->price}} سکه</p>
                <p>تعداد لایک: {{$project->likes}}</p>
                <div style="max-height: 80px; line-height: 35px; overflow: hidden">{!! html_entity_decode($project->description) !!}</div>
                <a href="{{route('showProject', ['id' => $project->id])}}">نمایش بیشتر</a>
            </div>

        @endforeach

    </div>

@stop
