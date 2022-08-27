@extends('panel.layouts.master')
@section('content')
@php
    $header = 'false';
    $footer = 'false';
@endphp
    <body class="form-membership" data-new-gr-c-s-check-loaded="14.1043.0" data-gr-ext-installed=""
        cz-shortcut-listen="true">
        <div class="form-wrapper">
            <!-- logo -->
            <div class="logo">
                <img src="{{ asset('assets/media/image/logo-sm1.png') }}" alt="image">
            </div>
            <!-- ./ logo -->

            <h5>ایجاد حساب</h5>

            <!-- form -->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="نام" required autofocus>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="family" value="{{ old('family') }}" placeholder="نام خانوادگی" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control text-left" value="{{ old('email') }}" name="email" placeholder="ایمیل" dir="ltr" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control text-left" name="password" placeholder="رمز عبور" dir="ltr" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control text-left" name="password_confirmation" placeholder="تکرار رمز عبور" dir="ltr" required>
                </div>
                <button class="btn btn-primary btn-block">ثبت نام</button>
                <hr>
                <p class="text-muted">حساب کاربری دارید؟</p>
                <a href="login.html" class="btn btn-outline-light btn-sm">وارد شوید!</a>
            </form>
            <!-- ./ form -->

        </div>
    </body>
@endsection
