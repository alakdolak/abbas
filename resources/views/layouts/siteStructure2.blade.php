<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->


<head>
    @section('header')
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta charset="utf-8" />
        <meta name="_token" content="{{ csrf_token() }}"/>
        <link href="{{URL::asset('css/myFont.css')}}" rel="stylesheet">
        <!-- END PAGE LEVEL PLUGINS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    @show
</head>

<body style="font-family: IRANSans; direction: rtl">

    @yield("content")

</body>
