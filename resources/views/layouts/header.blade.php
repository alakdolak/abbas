
<div class="header">

    <div onclick="document.location.href = '{{route('choosePlan')}}'" class="logoDiv">
        <div class="logoPic"></div>
        <div class="logoText"></div>
    </div>

    <div class="myNav">
        <div onclick="document.location.href = '{{route('showAllProjects')}}'" class="myNavbar">معرفی پروژه‌ها</div>
        <div onclick="document.location.href = '{{route('showAllServices')}}'" class="myNavbar">پروژه‌های خدماتی</div>
        <div onclick="document.location.href = '{{route('showAllProducts')}}'" class="myNavbar">معرفی محصولات</div>

        <div class="myNavbar">
            <div onclick="if($('#profilePopUp').hasClass('hidden')) { $('#profilePopUp').removeClass('hidden'); } else $('#profilePopUp').addClass('hidden');" class="profileIconBox">
                <div class="profileIcon"></div>
            </div>
            <div id="profilePopUp" class="profilePopUp hidden">
                <i class="fa fa-sort-desc rightArrowIcon"></i>
                <div onclick="document.location.href = '{{route('profile')}}'" class="profileRowPopUp profileName">{{\Illuminate\Support\Facades\Auth::user()->first_name . ' ' . \Illuminate\Support\Facades\Auth::user()->last_name}}</div>
                <div class="profileRowPopUp profilePopUpIconBox">
                    <div>تعداد سکه: {{\Illuminate\Support\Facades\Auth::user()->money}}</div>
                    <div class="profilePopUpIcon coinIcon"></div>
                </div>
                <div class="profileRowPopUp profilePopUpIconBox">
                    <div>تعداد ستاره: {{\Illuminate\Support\Facades\Auth::user()->stars}}</div>
                    <div class="profilePopUpIcon starIcon"></div>
                </div>
                <div onclick="document.location.href = '{{route('logout')}}'" class="profileLogoutBox">
                    <div class="logoutIcon"></div>
                    <div class="logoutText">خروج از حساب کاربری</div>
                </div>
            </div>
        </div>

        {{--            <div onclick="document.location.href = '{{route('profile')}}'" class="myNavbar">پروفایل</div>--}}
    </div>
</div>
