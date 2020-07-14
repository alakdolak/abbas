@extends('layouts.siteStructure2')

@section('header')
    @parent

@stop

@section("content")

    <div class="eachProduct row">
        <div class="col-lg-4 col-xs-12">
            <div class="pr_pics">
                <div class="pr_mainPic"></div>
                <div class="pr_otherPics"></div>
            </div>
            <div class="shopBtn"></div>
        </div>

        <div class="pr_descript col-lg-8 col-xs-12">
            <div class="pr_title"></div>
            <div class="pr_salesman"></div>
            <div class="pr_priceBox">
                <div class="pr_icons coinIcon"></div>
                <div></div>
            </div>
            <div class="pr_priceBox">
                <div class="pr_icons starIcon"></div>
                <div></div>
            </div>
            <div class="pr_descriptBox">
                <div class="pr_icons folderIcon"></div>
                <div></div>
            </div>
            <div class="pr_advertiseBox">
                <div class="pr_icons movieIcon"></div>
                <div></div>
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
