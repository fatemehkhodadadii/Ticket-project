@extends('panel.layouts.master')
@section('content')
    <!-- begin::page loader-->
    @include('panel.layouts.sidebar')
    @include('panel.layouts.header')

    <!-- begin::main content -->
    <main class="main-content">

        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex justify-content-between align-items-center">
                    <h6>شبکه های فروش</h6>
                    <div class="slick-single-arrows">
                        <a class="btn btn-outline-light btn-sm">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                        <a class="btn btn-outline-light btn-sm">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    </div>
                </div>
                    <div class="col-xl-3 col-lg-6 col-lg-6 col-sm-12">
                        <div class="card border mb-0">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <div class="icon-block icon-block-sm bg-google icon-block-floating mr-2">
                                            <i class="fa fa-file"></i>
                                        </div>
                                    </div>
                                    <span class="font-size-13">تیکت ها</span>
                                    <h2 class="mb-0 ml-auto font-weight-bold text-google primary-font line-height-30">
                                        {{ App\Models\Ticket::where('chid', 0)->count() }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <!-- end::main content -->
    <div class="colors">
        <div class="bg-primary"></div>
        <div class="bg-primary-bright"></div>
        <div class="bg-secondary"></div>
        <div class="bg-secondary-bright"></div>
        <div class="bg-info"></div>
        <div class="bg-info-bright"></div>
        <div class="bg-success"></div>
        <div class="bg-success-bright"></div>
        <div class="bg-danger"></div>
        <div class="bg-danger-bright"></div>
        <div class="bg-warning"></div>
        <div class="bg-warning-bright"></div>
    </div>
@endsection
