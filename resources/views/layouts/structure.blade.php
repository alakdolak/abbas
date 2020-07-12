<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    @section('header')
        @include('layouts.common')
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

                        <li class="nav-item">

                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-basket"></i>
                                <span class="title">پرسش و پاسخ متداول</span>
                                <span class="arrow open"></span>
                            </a>

                            <ul class="sub-menu" style="display: none;">
                                <li class="nav-item  ">
                                    <a href="{{route('faqCategories')}}" class="nav-link">
                                        <span class="title">مدیریت دسته ها</span>
                                    </a>
                                </li>

                                <li class="nav-item  ">
                                    <a href="{{route('commonQuestionsPanel')}}" class="nav-link">
                                        <span class="title">مدیریت سوالات</span>
                                    </a>
                                </li>

                            </ul>

                        </li>

                        <li class="nav-item">

                            <a href="{{route('config')}}" class="nav-link nav-toggle">
                                <i class="icon-settings"></i>
                                <span class="title">پیکربندی</span>
                                <span class="arrow open"></span>
                            </a>

                        </li>

                        <li class="nav-item  ">
                            <a href="{{route('grades')}}" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">پایه های تحصیلی</span>
                                <span class="arrow"></span>
                            </a>
                        </li>

                        <li class="nav-item  ">
                            <a href="{{route('products')}}" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">محصولات</span>
                                <span class="arrow"></span>
                            </a>
                        </li>

                        <li class="nav-item  ">
                            <a href="{{route('projects')}}" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">پروژه ها</span>
                                <span class="arrow"></span>
                            </a>
                        </li>

                        <li class="nav-item">

                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-basket"></i>
                                <span class="title">گزارشات</span>
                                <span class="arrow open"></span>
                            </a>

                            <ul class="sub-menu" style="display: none;">
{{--                                <li class="nav-item  ">--}}
{{--                                    <a href="{{route('productReport')}}" class="nav-link">--}}
{{--                                        <span class="title">محصولات</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="nav-item  ">--}}
{{--                                    <a href="{{route('most')}}" class="nav-link">--}}
{{--                                        <span class="title">پر طرفدار های ماه</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

                                <li class="nav-item  ">
                                    <a href="{{route('usersReport')}}" class="nav-link">
                                        <span class="title">کاربران</span>
                                    </a>
                                </li>

                            </ul>
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
</body>

</html>
