@extends('panel.layouts.master')
@section('content')
@php
    $header = 'false';
    $footer = 'false';
@endphp
    <style>
        form-membership .form-wrapper hr {
            margin: 1rem 0;
        }

    </style>
    <body class="form-membership">
        <div class="form-wrapper">

            <!-- logo -->
            <div class="logo">
                <img src="{{ asset('assets/media/image/logo-sm1.png') }}" alt="image">
            </div>
            <!-- ./ logo -->

            <h5>ایمیل خود را جهت دریافت لینک بازیابی رمزعبور وارد کنید</h5>

            <!-- form -->
            <form method="POST" action="{{ route('forgetPassword') }}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control text-left" name="email" placeholder="ایمیل" dir="ltr" required
                        autofocus>
                </div>
                <button class="btn btn-primary btn-block">ارسال</button>
            </form>
            <!-- ./ form -->


        </div>
    </body>
@endsection
