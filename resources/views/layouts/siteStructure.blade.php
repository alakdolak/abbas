<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    @section('header')
        @include('layouts.common')

        <style>
            * {
                box-sizing: border-box;
            }

            .column {
                float: left;
                width: 33.33%;
                padding: 5px;
                height: 300px;
                max-height: 300px;

            }

            /* Clearfix (clear floats) */
            .row::after {
                content: "";
                clear: both;
                display: table;
            }

            .overlay {
                position: absolute;
                bottom: 0;
                left: 0;
                right: 0;
                background-color: #008CBA;
                overflow: hidden;
                width: 100%;
                height: 100%;
                -webkit-transform: scale(0);
                -ms-transform: scale(0);
                transform: scale(0);
                -webkit-transition: .3s ease;
                transition: .3s ease;
            }

            .container:hover .overlay {
                -webkit-transform: scale(1);
                -ms-transform: scale(1);
                transform: scale(1);
            }

            .text {
                color: white;
                font-size: 20px;
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
                text-align: center;
            }

            .container {
                position: relative;
            }

            .modal {
                display: none; /* Hidden by default */
                position: fixed; /* Stay in place */
                z-index: 1; /* Sit on top */
                padding-top: 100px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgb(0,0,0); /* Fallback color */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
            }

            /* Modal Content */
            .modal-content {
                position: relative;
                background-color: #fefefe;
                margin: auto;
                padding: 0;
                border: 1px solid #888;
                width: 30%;
                direction: rtl;
                box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
                -webkit-animation-name: animatetop;
                -webkit-animation-duration: 0.4s;
                animation-name: animatetop;
                animation-duration: 0.4s
            }

            @-webkit-keyframes animatetop {
                from {top:-300px; opacity:0}
                to {top:0; opacity:1}
            }

            @keyframes animatetop {
                from {top:-300px; opacity:0}
                to {top:0; opacity:1}
            }
            .cke_chrome {
                margin-top: 20px;
                border: none !important;
            }
        </style>
    @show
</head>

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white" style="direction: rtl">
    <div class="page-wrapper">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="{{route('home')}}">
                        <img width="80px" src="{{URL::asset('layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" />
                    </a>
                    <div class="menu-toggler sidebar-toggler">
                        <span></span>
                    </div>
                </div>

                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                    <span></span>
                </a>

                <div class="top-menu">
                    <ul class="nav navbar-nav pull-left">

                        <?php
                        ?>

                        <li onclick="document.location.href = '{{route('bookmarks', ['mode' => getValueInfo('projectMode')])}}'" class="dropdown" style="color: white; cursor: pointer; margin: 20px">
                            پروژه های نشان شده
                        </li>

                        <li onclick="document.location.href = '{{route('bookmarks', ['mode' => getValueInfo('productMode')])}}'" class="dropdown" style="color: white; cursor: pointer; margin: 20px">
                            محصولات نشان شده
                        </li>

                        <li onclick="convert()" class="dropdown" style="color: white; cursor: pointer; margin: 20px">
                            تبدیل ستاره به سکه
                        </li>

                        <li class="dropdown" style="color: white; cursor: pointer; margin: 20px">
                            تعداد سکه شما {{\Illuminate\Support\Facades\Auth::user()->money}}
                        </li>

                        <li class="dropdown" style="color: white; cursor: pointer; margin: 20px">
                            تعداد ستاره شما {{\Illuminate\Support\Facades\Auth::user()->stars}}
                        </li>

                        <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <i class="icon-bell"></i>
                                <span class="badge badge-default">2</span>
{{--                                <span class="badge badge-default"> {{count($baskets) + count($warningProducts) + count($criticalProducts)}} </span>--}}
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">

{{--                                        @foreach($baskets as $basket)--}}
{{--                                            <li>--}}
{{--                                                <a href="{{route('unConfirmedOrders')}}">--}}
{{--                                                    <span class="time">{{MiladyToShamsi('', explode('-', explode(' ', $basket->created_at)[0]))}}</span>--}}
{{--                                                    <span class="details">--}}
{{--                                                        <span class="label label-sm label-icon label-success" style="font-size: 0.9em">--}}
{{--                                                            <i class="fa fa-bell-o"></i>--}}
{{--                                                            سفارش جدید--}}
{{--                                                        </span>--}}
{{--                                                        {{$basket->name}}--}}
{{--                                                    </span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        @endforeach--}}

                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!-- END NOTIFICATION DROPDOWN -->


                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <li class="dropdown dropdown-quick-sidebar-toggler">
                            <a href="{{route('logout')}}" class="dropdown-toggle">
                                <i class="icon-logout"></i>
                            </a>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    </ul>
                </div>

            </div>

        </div>

        <div class="clearfix"> </div>

        <div class="page-container">

            <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse" style="display: block !important;">
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <li class="sidebar-toggler-wrapper hide">
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                        </li>

                        <li class="nav-item  ">
                            <a href="{{route('showAllProducts')}}" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">محصولات</span>
                                <span class="arrow"></span>
                            </a>
                        </li>

                        <li class="nav-item  ">
                            <a href="{{route('showAllProjects')}}" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">پروژه ها</span>
                                <span class="arrow"></span>
                            </a>
                        </li>

{{--                        <li class="nav-item">--}}
{{--                            <a href="javascript:;" class="nav-link nav-toggle">--}}
{{--                                <i class="icon-basket"></i>--}}
{{--                                <span class="title">مدیریت سفارشات</span>--}}
{{--                                <span class="arrow open"></span>--}}
{{--                            </a>--}}

{{--                            <ul class="sub-menu" style="display: none;">--}}

{{--                                <li class="nav-item  ">--}}
{{--                                    <a href="{{route('rejectedOrders')}}" class="nav-link">--}}
{{--                                        <span class="title">سفارشات رد شده</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="nav-item  ">--}}
{{--                                    <a href="{{route('unConfirmedOrders')}}" class="nav-link">--}}
{{--                                        <span class="title">سفارشات جدید</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="nav-item">--}}
{{--                                    <a href="{{route('confirmedOrders')}}" class="nav-link">--}}
{{--                                        <span class="title">سفارشات تایید شده</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                            </ul>--}}

{{--                        </li>--}}

{{--                        <li class="nav-item  ">--}}
{{--                            <a href="{{route('editProduct')}}" class="nav-link nav-toggle">--}}
{{--                                <i class="icon-diamond"></i>--}}
{{--                                <span class="title">ویرایش کالا</span>--}}
{{--                                <span class="arrow"></span>--}}
{{--                            </a>--}}
{{--                        </li>--}}

                    </ul>

                </div>
            </div>

            <div style="margin-top: -80px; padding: 20px; width: 80% !important; float: left" class="page-content-wrapper">
                @yield('content')
            </div>

        </div>
    </div>


    <div class="quick-nav-overlay"></div>

    @include('layouts.jsLibraries')

    @yield('moreJS')


    <div id="convertModal" class="modal">

        <div class="modal-content">

            <center>
                <h5 style="padding-right: 5%;">تعداد ستاره های مورد نظر برای تبدیل</h5>
                <input type="number" id="nums">
            </center>

            <div style="margin-top: 20px">
                <input onclick="doConvert()" type="submit" value="تبدیل کن" class="btn green"  style="margin-right: 5%; margin-bottom: 3%">
                <input type="button" value="انصراف" class="btn green"  style="float: left; margin-bottom: 3%; margin-left: 5%;" onclick="document.getElementById('convertModal').style.display = 'none'">
            </div>

            <div style="margin-top: 20px">
                <p id="convertErr"></p>
            </div>

        </div>
    </div>

    <script>

        function convert() {
            document.getElementById('convertModal').style.display = 'block';
        }

        function doConvert() {

            var stars = $("#nums").val();

            if(stars.length === 0 || stars == 0) {
                $("#convertErr").empty().append("لطفا تعداد ستاره ای که می خواهید به سکه تبدیل کنید را مشخص نمایید.");
                return;
            }

            $.ajax({
                type: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                url: '{{route('convertStarToCoin')}}',
                data: {
                    stars: stars
                },
                success: function (res) {

                    if(res === "ok")
                        document.location.reload();
                    else
                        $("#convertErr").empty().append("تعداد ستاره های شما برای این کار کافی نیستند.");
                }
            });


        }

    </script>

</body>

</html>
