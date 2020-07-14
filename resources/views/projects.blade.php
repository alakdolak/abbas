@extends("layouts.siteStructure3")


@section("header")
    @parent
@stop

@section("banner")

    <div class="banner">
        <div class="bannerGrayBox"></div>
        <div class="bannerBorderBox bannerLightRedBox"></div>
        <div class="bannerMainBox projectsBanner">
            <div class="bannerText">انتخاب پروژه‌ها</div>
        </div>
    </div>

@stop

@section("content")

    <div class="shopBox row">
        <div class="shopEachRow col-lg-12">

            <div class="shopEachRow shopEachRowTitle col-lg-12">پروژه های هفته ی اول</div>

            <div class="shopEachRow col-lg-12">

                @foreach($projects as $project)
                    <div data-tag="{{$project->tagStr}}" onclick="document.location.href = '{{route('showProject', ['id' => $project->id])}}'" class="myItem shopOneBox col-lg-3 col-xs-6">
                        <div class="sh_mainBox">
                            <div style="background-image: url('{{$project->pic}}')" class="sh_mainPic"></div>
                            <div class="sh_descript">
                                <div class="sh_descriptRow sh_title">{{$project->title}}</div>
                                <div class="sh_descriptRow sh_priceBox">
                                    <div class="priceIcons coinIcon"></div>
                                    @if($project->price != "رایگان")
                                        <div class="priceText">قیمت: {{$project->price}} سکه</div>
                                    @endif
                                </div>

                                <p class="sh_descriptRow sh_title" style="direction: rtl; text-align: right">
                                    @foreach($project->tags as $tag)
                                        <span>#{{$tag->name}}</span>
                                        <span>&nbsp;&nbsp;</span>
                                    @endforeach
                                </p>

                            </div>
                        </div>

                        <div class="sh_ownerBox">
                            <div style="font-size: 0.9em">سفارش دهنده: مدرسه سراج</div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


@stop
