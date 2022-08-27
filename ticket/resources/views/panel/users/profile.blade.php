@extends('panel.layouts.master')
@section('content')
    <style>
        td,
        th {
            text-align: center;
        }

    </style>
    @include('panel.layouts.sidebar')
    @include('panel.layouts.header')

    <!-- begin::main content -->
    <main class="main-content">

        <div class="card card-body overflow-hidden" data-backround-image="assets/media/image/profile-bg.png">
            <div class="p-3 d-lg-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <div>
                        <figure class="avatar avatar-xl mr-3">
                            <img src="{{ asset(findUser(false, Auth::id(), 'avatar')) }}" class="rounded-circle"
                                alt="{{ findUser() }}">
                        </figure>
                    </div>
                    <div class="text-white">
                        <h3 class="line-height-30 m-b-10">
                            {{ $data->name }} {{ $data->family }}
                            <a href="{{ route('users.edit',$data->id) }}" data-toggle="tooltip" title="ویرایش پروفایل"
                                class="font-size-15 text-white btn-floating m-l-5 align-middle">
                                <i class="fa fa-pencil"></i>
                            </a>
                        </h3>
                        <p class="mb-0 opacity-8">{{ $data->email }}</p>
                    </div>
                </div>
                <div>
                    <ul class="list-inline text-center">
                        <li class="list-inline-item my-2">
                            <a href="profile.html#" class="text-success d-inline-block">
                                <h4 class="font-weight-bold mb-2 primary-font line-height-36">

                                    <a href="{{ route('tickets.createTicket' , $data->id) }}" class="btn btn-light" style="border-radius: 7px;padding: 3px 12px">
                                        تیکت جدید
                                    </a>
                                </h4>
                                <span>ایجاد تیکت</span>
                            </a>
                        </li>
                        <li class="list-inline-item my-2">
                            <a href="profile.html#" class="text-success d-inline-block">
                                <h2 class="font-weight-bold mb-2 primary-font line-height-36">418</h2>
                                <span>تیکت ها</span>
                            </a>
                        </li>
                        <li class="list-inline-item my-2">
                            <a href="profile.html#" class="text-warning d-inline-block ml-3">
                                <h2 class="font-weight-bold mb-2 primary-font line-height-36">1,596</h2>
                                <span>علاقه مندیها</span>
                            </a>
                        </li>
                        <li class="list-inline-item my-2">
                            <a href="profile.html#" class="text-info d-inline-block ml-3">
                                <h2 class="font-weight-bold mb-2 primary-font line-height-36">7,896</h2>
                                <span>محصولات خریداری شده</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row row-sm">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">سفارشات</h6>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>نام</th>
                                        <th>ساعت</th>
                                        <th>تاریخ</th>
                                        <th>قیمت</th>
                                        <th>وضعیت</th>
                                        <th>شناسه</th>
                                        <th>فاکتور</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>ممد تقی</td>
                                        <td>7:50</td>
                                        <td>7.7.95</td>
                                        <td>22.222.000</td>
                                        <td><span class="badge badge-pill badge-success">موفقیت</span></td>
                                        <td>524135</td>
                                        <td>
                                            <a type="button" class="btn btn-outline-secondary btn-floating">
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <nav style="margin: 20px auto;">
                            <ul class="pagination pagination-rounded pagination-sm mb-3">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item" aria-current="page">
                                    <a class="page-link" href="#">2 <span class="sr-only">(کنونی)</span></a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title d-flex justify-content-between align-items-center">
                            اطلاعات
                            <a href="profile.html#" class="link-1 font-size-13 primary-font">
                                <i class="fas fa-user-edit m-r-5 align-middle"></i> ویرایش
                            </a>
                        </h6>
                        <div class="row mb-2">
                            <div class="col-6 text-muted">نام:</div>
                            <div class="col-6">{{ $data->name }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-muted">نام خانوادگی:</div>
                            <div class="col-6">{{ $data->family }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-muted">استان:</div>
                            <div class="col-6">{{ $data->state }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-muted">شهر:</div>
                            <div class="col-6">{{ $data->city }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-muted">آدرس:</div>
                            <div class="col-6">{{ $data->address }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-muted">تلفن:</div>
                            <div class="col-6" dir="ltr">{{ $data->phone }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 text-muted">ایمیل:</div>
                            <div class="col-6">{{ $data->email }}</div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">آخرین تیکت ها</h6>
                        @foreach ($tickets as $ticket)

                        <div class="d-flex align-items-center mb-2 rounded-lg" >
                            <a href="{{ route('tickets.edit' , $ticket->id) }} " class="list-group-item list-group-item-action d-flex">
                                <div class="flex-shrink-0">
                                    <figure class="avatar avatar-sm">
                                        <img src="{{ $ticket->image }}"
                                            class="rounded-circle" alt="image">
                                    </figure>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0 d-flex justify-content-between"> <span
                                            class="opacity-7">{{ verta($ticket->craeted_at)->format("Y/m/d") }}</span><span
                                            class="badge badge-warning badge-pill"></span></h6>
                                    <p class="m-0 small">{{ $ticket->title }}</p>

                                </div>
                            </a>
                        </div>

                        @endforeach


                        <nav style="margin: 20px auto;">
                            <ul class="pagination pagination-rounded pagination-sm mb-3">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item" aria-current="page">
                                    <a class="page-link" href="#">2 <span class="sr-only">(کنونی)</span></a>
                                </li>

                                <li class="page-item">
                                    <a class="page-link" href="#">
                                        <i class="fas fa-angle-left"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>

                </div>


                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">علاقه مندیها</h6>
                        <div class="d-flex align-items-center">
                            <div class="progress flex-grow-1" style="height: auto !important;padding: 10px">
                                <div class="row">
                                    <div class="col-lg-2">
                                        <figure class="avatar avatar-sm m-r-15 bring-forward">
                                            <img src="http://panel.shinebetter.ir/system/assets/media/image/avatar.jpg"
                                                class="rounded-circle" alt="image">
                                        </figure>
                                    </div>
                                    <div class="col-lg-9">
                                        <p class="mb-0">
                                            این متن کاملا تستی است.این متن کاملا تستی است.این متن کاملا تستی است.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection
