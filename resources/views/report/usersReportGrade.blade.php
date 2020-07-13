@extends('layouts.structure')

@section('header')
    @parent

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

    <style>
        th, td {
            text-align: center;
            padding: 7px;
            border: 1px solid #444;
        }

    </style>

@stop

@section('content')

    <div class="col-md-12" style="margin-top: 100px">

        <center>

            <button onclick="addItem()" class="btn btn-success">افزودن کاربر</button>

            <table style="margin-top: 20px">
                <tr>
                    <td>نام</td>
                    <td>کد ملی</td>
                    <td>وضعیت</td>
                    <td>تعداد خرید</td>
                    <td>ارزش کل خریدها(سکه)</td>
                    <td>تعداد ستاره ها</td>
                    <td>تعداد سکه ها</td>
                    <td>عملیات</td>
                </tr>

                @foreach($users as $user)
                    <tr>

                        <td>{{$user->first_name . ' ' . $user->last_name}}</td>
                        <td>{{$user->nid}}</td>
                        <td>{{($user->status) ? "فعال" : "غیرفعال"}}</td>
                        <td>{{$user->buys}}</td>
                        <td>{{$user->sum}}</td>
                        <td>{{$user->money}}</td>
                        <td>{{$user->stars}}</td>
                        <td>
                            @if($user->status)
                                <button id="toggle_{{$user->id}}" onclick="toggleStatus('{{$user->id}}')" class="btn btn-danger col-xs-6">غیرفعال کردن کاربر</button>
                            @else
                                <button id="toggle_{{$user->id}}" onclick="toggleStatus('{{$user->id}}')" class="btn btn-success col-xs-6">فعال کردن کاربر</button>
                            @endif

                            <button onclick="editMoney('{{$user->id}}', '{{$user->money}}', '{{$user->stars}}')" class="btn btn-info col-xs-6">ویرایش سکه/ستاره کاربر</button>
{{--                            <button onclick="document.location.href = '{{route('userBookmarks', ['uId' => $user->id])}}'" class="btn btn-info col-xs-6">اقلام مورد علاقه کاربر</button>--}}

                            <button onclick="document.location.href = '{{route('userBuys', ['uId' => $user->id])}}'" class="btn btn-default col-xs-6">اقلام خریداری شده کاربر</button>

                        </td>
                    </tr>
                @endforeach
            </table>
        </center>

    </div>

    <div id="myAddModal" class="modal">
        <form action="{{route('addUsers', ['gradeId' => $gradeId])}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
                <h2 style="padding-right: 5%;">فایل اکسل دانش آموزان</h2>
                <input type="file" name="file" accept="application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
                <div style="margin-top: 10px">
                    <input type="submit" value="تایید" class="btn green"  style="margin-right: 5%; margin-bottom: 3%">
                    <input type="button" value="انصراف" class="btn green"  style="float: left; margin-bottom: 3%; margin-left: 5%;" onclick="document.getElementById('myAddModal').style.display = 'none'">
                </div>
            </div>
        </form>
    </div>

    <div id="myMoneyModal" class="modal">
        <form action="{{route('editMoney')}}" method="post">
            {{ csrf_field() }}
            <div class="modal-content">

                <input type="hidden" name="id" id="id">

                <h4 style="padding-right: 5%;">تعداد سکه ها</h4>
                <input type="number" id="coin" name="coin" required>

                <h4 style="padding-right: 5%;">تعداد ستاره ها</h4>
                <input type="number" id="star" name="star" required>

                <div style="margin-top: 10px">
                    <input type="submit" value="تایید" class="btn green"  style="margin-right: 5%; margin-bottom: 3%">
                    <input type="button" value="انصراف" class="btn green"  style="float: left; margin-bottom: 3%; margin-left: 5%;" onclick="document.getElementById('myMoneyModal').style.display = 'none'">
                </div>
            </div>
        </form>
    </div>

    <script>

        function toggleStatus(id) {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            $.ajax({
                type: 'post',
                url: '{{route('toggleStatusUser')}}',
                data: {
                    id: id
                },
                success: function (res) {
                    if(res === "ok")
                        document.location.reload();
                }
            });

        }

        function addItem(id, name) {
            document.getElementById('myAddModal').style.display = 'block';
            document.getElementById('categoryId').value = id;
            document.getElementById('oldName').value = name;
        }

        function editMoney(id, coin, star) {
            document.getElementById('myMoneyModal').style.display = 'block';
            document.getElementById('id').value = id;
            document.getElementById('coin').value = coin;
            document.getElementById('star').value = star;
        }
    </script>

@stop
