@extends('panel.layouts.master')
@section('content')
    <!-- begin::page loader-->
    <style>
        @media (max-width: 1199px) {

            .chat-app-wrapper .chat-app .chat-sidebar {
                z-index: 99;
                right: 0;
                top: 0;
                bottom: 0;
                width: 100%;
                max-width: 100% !important;
                position: unset !important;
                background: white;
                display: block !important;
                -webkit-box-shadow: -10px 0px 10px -15px black;
                -moz-box-shadow: -10px 0px 10px -15px black;
                box-shadow: -10px 0px 10px -15px black;
            }
        }

    </style>
    <div class="page-loader">
        <div class="spinner-border"></div>
    </div>
    <!-- end::page loader -->

    @include('panel.layouts.sidebar')
    @include('panel.layouts.header')

    <!-- begin::main content -->
    <main class="main-content">

        <div class="card chat-app-wrapper">
            <div class="row chat-app">
                <div class="col-xl-12 chat-sidebar">
                    <div class="card">

                        <div class="card-body">
                            <a class="btn btn-outline-secondary btn-uppercase card-title mb-4" href="{{ route('tickets.createTicket') }}">
                                <i class="fas fa-plus m-r-5"></i> ایجاد تیکت
                            </a>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered text-center">
                                    <thead>
                                        <tr>
                                            <th>نام</th>
                                            <th>موضوع</th>
                                            <th>تاریخ</th>
                                            <th>ساعت</th>
                                            <th>کد</th>
                                            <th>وضعیت</th>
                                            <th>مشاهده تیکت</th>
                                            @can('Admin')
                                                <th>حذف</th>
                                            @endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            @php
                                                $user = App\Models\User::whereId($item->send_id)->first();
                                                $stauts = '';
                                                $bgColor = '';
                                                if ($item->status == 'pending') {
                                                    $stauts = 'در حال بررسی ';
                                                    $bgColor = 'warning';
                                                } else {
                                                    $stauts = 'بسته شده ';
                                                    $bgColor = 'danger';
                                                }
                                            @endphp
                                            <tr>
                                                <td>{{ $user->name . ' ' . $user->family }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ verta($item->created_at)->format('Y/m/d') }}</td>
                                                <td>{{ verta($item->created_at)->format('H:i') }}</td>
                                                <td>#{{ $item->code }}</td>
                                                <td> <span
                                                        class="badge badge-{{ $bgColor }}">{{ $stauts }}</span>
                                                </td>
                                                <td>
                                                    <a href="{{ route('tickets.edit', $item->id) }}"
                                                        class="btn btn-warning btn-floating">
                                                        <i class="fas fa-eye text-white"></i>
                                                    </a>
                                                </td>
                                                @can('Admin')
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-floating trashRow" data-url="{{ route('tickets.destroy',$item->id) }}" data-id="{{ $item->id }}" >
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                                @endcan
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>

                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>

            </div>


        </div>


    </main>
    <!-- end::main content -->

    <!-- Plugin scripts -->
    <script src="{{ asset('vendors/bundle.js') }}"></script>

    <!-- App scripts -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- begin::lightbox -->
    <script src="{{ asset('vendors/lightbox/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/examples/lightbox.js') }}"></script>
@endsection
