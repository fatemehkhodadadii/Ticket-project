@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.sidebar')
    <section class="edit-shop">
        <main class="main-content">

            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">ایجاد کاربر</h6>
                    {!! Form::open(['route' => 'users.store', 'method' => 'post', 'files' => true]) !!}
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label for="name">نام</label>
                                {{ Form::text('name',null,['class' => 'form-control', 'placeholder' => 'نام']) }}
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label for="family">نام خانوادگی</label>
                                {{ Form::text('family',null,['class' => 'form-control', 'placeholder' => 'نام خانوادگی']) }}
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label for="role">سطح دسترسی</label>
                                <select name="role" id="role" class="form-control">
                                    <option selected  disabled>انتخاب کنید</option>
                                    <option value="admin">مدیر</option>
                                    <option value="user">کاربر</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label for="email">ایمیل</label>
                                {{ Form::email('email',null,['class' => 'form-control text-left', 'placeholder' => 'example@gmail.com', 'dir' => 'ltr']) }}
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 col-xl-3">
                            <div class="form-group">
                                <label for="password">پسورد</label>
                                {{ Form::password('password',['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-12">
                            <button type="submit" class="btn btn-success btn-uppercase">
                                <i class="fas fa-check m-r-5"></i> ذخیره
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </main>

    </section>

@endsection
