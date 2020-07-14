@extends('layouts.siteStructure2')

@section('header')
    @parent

    <style>
        .eachProduct {
            margin: 50px 12% 0 !important;
        }
        .pr_pics {
        }
        .pr_mainPic {
            height: 300px;
            border: 4px solid #acacac;
        }
        .pr_otherPics{
            margin: 20px 0 35px 0;
        }
        .pr_eachOtherPics{
            height: 85px;
            border: 2px solid #acacac;
            width: 24%;
            margin: 0 1px;
        }
        .pr_eachOtherPics:nth-child(1) {
            margin-left: 0;
        }
        .pr_eachOtherPics:last-child{
            margin-right: 0;
        }
        .pr_eachOtherPics{
            height: 85px;
            border: 2px solid #acacac;
            width: 24.5%;
            margin: 0 1px;
        }
        .shopBtn{
            color: white;
            background-color: #68cda5;
            border-bottom: 5px solid #48c291;
            box-shadow: 5px 5px 5px;
            border-radius: 7px;
            padding: 15px 30px;
            font-size: 1.75em;
            font-weight: 500;
            text-align: center;
            cursor: pointer;
        }
        .shopBtn:hover {
            background-color: #48c291;
        }
        .pr_descript{
            font-size: 1.3em;
            font-weight: 500;
            color: #a4a4a4;
        }
        .pr_descriptRow{
            min-height: 50px;
            padding: 7px 20px;
            border-bottom: 2px solid #acacac;
        }
        .pr_descriptRow:nth-child(1), .pr_descriptRow:last-child{
            border-bottom: 0;
        }
        .pr_iconesBox {
            display: flex;
            align-items: center;
        }
        .pr_description {
            margin-right: 40px;
            text-align: justify;
        }
        .pr_advertise {
            margin-right: 40px;
            text-align: justify;
        }
        .pr_title{
            background-color: #f26c4f;
            color: white;
            font-size: 1.1em;
            font-weight: 700;
            display: flex;
            align-items: center;
        }
        .pr_salesman{
            display: flex;
            align-items: center;
            font-weight: 600;
        }
        .pr_icons{
            width: 30px;
            height: 30px;
            background-size: 100%;
            background-repeat: no-repeat;
            margin-left: 10px;
        }
        .folderIcon{
            background-image: url(../images/folder.png);
        }
        .movieIcon{
            background-image: url(../images/movie.png);
        }

    </style>

@stop

@section("content")

    <div class="eachProduct row">
        <div class="pr_descript col-lg-8 col-xs-12">
            <div class="pr_descriptRow pr_title">پروژه ی کیف دستی</div>
            <div class="pr_descriptRow pr_salesman">فروشنده: آقای حاجی قاسمی</div>
            <div class="pr_descriptRow pr_iconesBox">
                <div class="pr_icons coinIcon"></div>
                <div>قیمت: 300 سکه</div>
            </div>
            <div class="pr_descriptRow pr_iconesBox">
                <div class="pr_icons starIcon"></div>
                <div>ستاره ی دریافتی: 20</div>
            </div>
            <div class="pr_descriptRow">
                <div class="pr_iconesBox">
                    <div class="pr_icons coinIcon"></div>
                    <div>توضیحات:</div>
                </div>
                <div class="pr_description">
                    <div>توضیحات: سید امیرعباس میرمحمدصادقی از اولیای خداست. توضیحات: سید امیرعباس میرمحمدصادقی از اولیای خداست. توضیحات: سید امیرعباس میرمحمدصادقی از اولیای خداست. توضیحات: سید امیرعباس میرمحمدصادقی از اولیای خداست. توضیحات: سید امیرعباس میرمحمدصادقی از اولیای خداست.</div>
                </div>
            </div>
            <div class="pr_descriptRow">
                <div class="pr_iconesBox">
                    <div class="pr_icons coinIcon"></div>
                    <div>تبلیغات:</div>
                </div>
                <div class="pr_advertise">
                    <div>توضیحات: سید امیرعباس میرمحمدصادقی از اولیای خداست. توضیحات: سید امیرعباس میرمحمدصادقی از اولیای خداست. توضیحات: سید امیرعباس میرمحمدصادقی از اولیای خداست. توضیحات: سید امیرعباس میرمحمدصادقی از اولیای خداست. توضیحات: سید امیرعباس میرمحمدصادقی از اولیای خداست.</div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-xs-12">
            <div class="pr_pics">
                <div class="pr_mainPic"></div>
                <div class="pr_otherPics row">
                    <div class="pr_eachOtherPics col-lg-3 col-sm-6"></div>
                    <div class="pr_eachOtherPics col-lg-3 col-sm-6"></div>
                    <div class="pr_eachOtherPics col-lg-3 col-sm-6"></div>
                    <div class="pr_eachOtherPics col-lg-3 col-sm-6"></div>
                </div>
            </div>
            <div onclick="buy()" class="shopBtn">خرید محصول</div>
            <div class="eachProduct row">

                <div class="col-lg-4 col-xs-12">

                    <div class="pr_pics">
                        <div class="pr_mainPic"></div>
                        <div class="pr_otherPics"></div>
                    </div>
                    <div class="shopBtn"></div>
                    </div>
            </div>
        </div>
    </div>


    <script>

        $(".thumb-wrapper").on('click', function () {

            $("#my_gallery").removeClass('remodal-is-closed').addClass('remodal-is-opened');

        });

        function buy() {
            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: '{{route('buyProduct')}}',
                data: {
                    id: '{{$product->id}}'
                },
                success: function (res) {

                    if(res === "nok1") {
                        $("#buyErr").empty().append("شما اجازه خرید این محصول را ندارید.");
                    }

                    else if(res === "nok2") {
                        $("#buyErr").empty().append("شما قبلا این محصول را خریداری کرده اید.");
                    }

                    else if(res === "nok3") {
                        $("#buyErr").empty().append("متاسفانه سکه کافی برای خریداری این پروژه ندارید.");
                    }

                    else if(res === "nok5") {
                        $("#buyErr").empty().append("عملیات مورد نظر غیرمجاز است.");
                    }

                    else if(res === "ok") {
                        document.location.href = '{{route('myProducts')}}';
                    }

                }
            });
        }

        function bookmark() {

            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: '{{route('bookmark')}}',
                data: {
                    id: '{{$product->id}}',
                    mode: '{{getValueInfo('productMode')}}'
                },
                success: function (res) {
                    if(res === "ok")
                        $("#bookmark").removeClass('glyphicon-heart-empty').addClass('glyphicon-heart');
                    else
                        $("#bookmark").removeClass('glyphicon-heart').addClass('glyphicon-heart-empty');
                }
            });

        }

        function like() {

            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: '{{route('like')}}',
                data: {
                    id: '{{$product->id}}',
                    mode: '{{getValueInfo('productMode')}}'
                },
                success: function (res) {
                    if(res === "ok")
                        $("#like").removeClass('glyphicon-heart-empty').addClass('glyphicon-heart');
                    else
                        $("#like").removeClass('glyphicon-heart').addClass('glyphicon-heart-empty');
                }
            });

        }

    </script>
@stop
