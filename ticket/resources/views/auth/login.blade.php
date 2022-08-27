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
            <div class="logo mb-5">
                <img width="150" height="150" src="{{ asset('assets/media/image/logo-sm1.png') }}" alt="image">
            </div>
            <!-- ./ logo -->

            <h5>ورود</h5>

            <!-- form -->
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control text-left" name="email" placeholder="ایمیل" dir="ltr" required
                        autofocus>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control text-left" name="password" placeholder="رمز عبور" dir="ltr" required>
                </div>
                <div class="form-group d-sm-flex justify-content-between text-left mb-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" checked id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">به خاطر سپاری</label>
                    </div>
                    {{--  <a class="d-block mt-2 mt-sm-0 line-height-28" href="{{ route('forgetPassword.show') }}">بازنشانی رمز عبور</a>  --}}
                </div>
                <button class="btn btn-primary btn-block">ورود</button>
                <hr>
            </form>
            <!-- ./ form -->

        </div>
    </body>
@endsection
