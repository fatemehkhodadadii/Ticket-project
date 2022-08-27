<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سیستم تیکتینگ</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/media/image/favicon.png')}}">

    <!-- Theme Color -->
    <meta name="theme-color" content="#5867dd">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Plugin styles -->
    <link rel="stylesheet" href="{{asset('vendors/bundle.css')}}" type="text/css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('vendors/datepicker/daterangepicker.css')}}">

    <!-- Slick -->
    <link rel="stylesheet" href="{{asset('vendors/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/slick/slick-theme.css')}}">

    <!-- Vmap -->
    <link rel="stylesheet" href="{{asset('vendors/vmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/fullcalendar/fullcalendar.min.css')}}" type="text/css">
    <!-- Clockpicker -->
    <link rel="stylesheet" href="{{asset('vendors/clockpicker/bootstrap-clockpicker.min.css')}}" type="text/css">
    <!-- Datepicker -->
    <link rel="stylesheet" href="{{asset('vendors/datepicker/daterangepicker.css')}}" type="text/css">
    <!-- App styles -->
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}" type="text/css">
	<link rel="stylesheet" href="{{ asset('vendors/colorpicker/css/bootstrap-colorpicker.min.css') }}" type="text/css">


    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="//fdn.fontcdn.ir">
    <link rel="preconnect" href="//v1.fontapi.ir">
    <link href="https://v1.fontapi.ir/css/VazirFD" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js" integrity="sha512-kZsqvmw94Y8hyhwtWZJvDtobwQ9pLhF1DuIvcqSuracbRn6WJs1Ih+04fpH/8d1CFKysp7XA1tR0Aa2jKLTQUg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="{{ asset('vendors/colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

	<script src="{{ asset('assets/js/examples/colorpicker.js') }}"></script>
    <style>
        .panel-table-image{
            width: 60px;
            height: 60px;
            border-radius: 7px;
            box-shadow: 0 0 7px #000;
        }
    </style>
</head>
