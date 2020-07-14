@extends("layouts.siteStructure3")


@section("header")
    @parent
@stop

@section("banner")

    <div class="banner">
        <div class="bannerGrayBox"></div>
        <div class="bannerBorderBox bannerLightGreenBox"></div>
        <div class="bannerMainBox servicesBanner">
            <div class="bannerText">پروژه های خدماتی</div>
        </div>
    </div>

@stop

@section("content")

    <div class="shopBox row" style="margin-top: 100px !important;">
        <div class="shopEachRow col-lg-12">

            <div class="shopEachRow shopEachRowTitle col-lg-12">پروژه های خدماتی هفته ی اول</div>

            <div class="shopEachRow col-lg-12">

                @foreach($services as $service)
                    <div onclick="document.location.href = '{{route('showService', ['id' => $service->id])}}'" class="shopOneBox col-lg-3 col-xs-6">
                        <div class="sh_mainBox">
                            <div style="background-image: url('{{$service->pic}}')" class="sh_mainPic"></div>
                            <div class="sh_descript">
                                <div class="sh_descriptRow sh_title">{{$service->title}}</div>

                                <div class="sh_descriptRow sh_priceBox">
                                    <div class="priceIcons starIcon"></div>
                                    <div class="priceText">ستاره ی دریافتی: {{$service->star}}</div>
                                </div>

                                <div class="sh_descriptRow sh_title">ظرفیت: {{$service->capacity}}</div>

                            </div>

                        </div>

                        @if($service->canBuy)
                            <div class="sh_ownerBox">
                                <div style="font-size: 0.9em">سفارش دهنده: مدرسه سراج</div>
                            </div>
                        @else
                            <div class="sh_ownerBox_finish">
                                <div style="font-size: 0.9em">سفارش دهنده: مدرسه سراج</div>
                            </div>
                        @endif

                    </div>
                @endforeach

            </div>
        </div>
    </div>

@stop
