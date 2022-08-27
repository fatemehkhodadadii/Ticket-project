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

            <h5>پسورد جدید خود را وارد کنید</h5>

            <!-- form -->
            <form method="POST" action="{{ route('resetPassword', request()->route()->parameter('token')) }}">
                @csrf
                <div class="form-group">
                    <input type="password" class="form-control text-left" name="password" dir="ltr" required
                        autofocus>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control text-left" name="password_confirimation" dir="ltr" required>
                </div>
                <button class="btn btn-primary btn-block">تایید</button>
            </form>
            <!-- ./ form -->


        </div>
    </body>
@endsection
