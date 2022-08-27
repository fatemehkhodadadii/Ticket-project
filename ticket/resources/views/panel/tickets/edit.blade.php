@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.sidebar')
    @include('panel.layouts.header')

    <!-- begin::main content -->
    <main class="main-content">

        <div class="card chat-app-wrapper">
            <div class="row chat-app">

                <div class="col-xl-12 col-md-12 chat-body">
                    <div class="chat-body-header">
                        <a href="chat " class="btn btn-dark opacity-3 m-r-10 btn-chat-sidebar-open">
                            <i class="ti-menu"></i>
                        </a>
                        <div>
                            <figure class="avatar avatar-sm m-r-10">
                                <img src="{{ asset('assets/media/image/avatar.jpg') }}" class="rounded-circle"
                                    alt="image">
                            </figure>
                        </div>
                        <div>
                            @php
                                $stauts = '';
                                $bgColor = '';
                                if ($data->status == 'pending') {
                                    $stauts = 'در حال بررسی ';
                                    $bgColor = 'warning';
                                } else {
                                    $stauts = 'بسته شده ';
                                    $bgColor = 'danger';
                                }
                            @endphp
                            <h6 class="mb-1 primary-font line-height-18">{{ $data->title . '  #' . $data->code }}</h6>
                            <h6 class="mb-1 primary-font line-height-18 text-center badge badge-{{ $bgColor }}">
                                {{ $stauts }}</h6>
                        </div>
                        @if (auth()->user()->role == "admin")

                        <div class="ml-auto d-flex">
                            <div class="dropdown ml-2">
                                <button type="button" data-toggle="dropdown" class="btn btn-sm  btn-warning btn-floating">
                                    <i class="fa fa-cog"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <div class="dropdown-menu-body">
                                        <ul id="ticket_status">
                                            <li>
                                                <button class="dropdown-item" form="update_form" value="pending"
                                                    name="status">در حال بررسی</button>
                                            </li>
                                            <li>
                                                <button class="dropdown-item" form="update_form" value="close"
                                                    name="status">بستن تیکت</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <form class="d-flex align-items-center"
                                        action="{{ route('tickets.changeStatus', $data->id) }}" id="update_form"
                                        enctype="multipart/form-data" method="post">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <div class="chat-body-messages">
                        <div class="message-items">
                            {{-- <div class="message-item message-item-media">
                                <ul>
                                    <li>
                                        <a href="assets/media/image/portfolio-four.jpg">
                                            <img src="{{ asset('assets/media/image/portfolio-four.jpg') }}"
                                                alt="image">
                                            <span>portfolio-four.jpg</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/media/image/portfolio-two.jpg">
                                            <img src="{{ asset('assets/media/image/portfolio-two.jpg') }}"
                                                alt="image">
                                            <span>portfolio-two.jpg</span>
                                        </a>
                                    </li>
                                </ul>
                                <small class="message-item-date text-muted">22.30</small>
                            </div> --}}
                            @foreach ($tickets as $ticket)

                                @if ($ticket->image)
                                    <div
                                        class="message-item {{ auth()->user()->id != $ticket->send_id ? 'outgoing-message' : '' }} message-item-media">
                                        <ul>
                                            <li>
                                                <a href="{{ $ticket->image }}">
                                                    <img src="{{ $ticket->image }}" alt="image">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                                <div
                                    class="message-item {{ auth()->user()->id != $ticket->send_id ? 'outgoing-message' : '' }}">
                                    {!! $ticket->message !!}
                                    <small
                                        class="message-item-date text-muted">{{ verta($ticket->created_at)->format('H:i') }}</small>
                                </div>
                            @endforeach

                            {{-- <div class="message-item message-item-media">
                                <div class="m-b-0 text-muted text-left">
                                    <a href="chat "
                                        class="btn btn-outline-light text-left align-items-center justify-content-center">
                                        <i class="fa fa-download font-size-18 m-r-10"></i>
                                        <div class="small">
                                            <div class="mb-2">example test.txt</div>
                                            <div dir="ltr">10 KB</div>
                                        </div>
                                    </a>
                                </div>
                                <small class="message-item-date text-muted">22.30</small>
                            </div> --}}

                            {{-- <div class="message-item outgoing-message message-item-media">
                                <ul>
                                    <li>
                                        <a href="assets/media/image/portfolio-four.jpg" class="media-error">
                                            <img src="{{ asset('assets/media/image/portfolio-four.jpg') }}"
                                                alt="image">
                                            <span>لورم ایپسوم متن ساختگی با تولید</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="assets/media/image/portfolio-six.jpg">
                                            <img src="{{ asset('assets/media/image/portfolio-six.jpg') }}"
                                                alt="image">
                                            <span>portfolio-six.jpg</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('assets/media/image/portfolio-three.jpg') }}"
                                            class="media-error">
                                            <img src="{{ asset('assets/media/image/portfolio-three.jpg') }}"
                                                alt="image">
                                            <span>لورم ایپسوم متن ساختگی با تولید</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ asset('assets/media/image/portfolio-one.jpg') }}">
                                            <img src="{{ asset('assets/media/image/portfolio-one.jpg') }}"
                                                alt="image">
                                            <span>portfolio-one.jpg</span>
                                        </a>
                                    </li>
                                </ul>
                                <small class="message-item-date text-muted">22.30</small>
                            </div> --}}


                        </div>
                    </div>




                    {{-- send message --}}
                    <div class="chat-body-footer">
                        <form class="d-flex align-items-center" action="{{ route('tickets.update', $data->id) }}"
                            enctype="multipart/form-data" method="post">
                            {{ method_field('PATCH') }}
                            @csrf
                            <input type="hidden" name="receive_id" value="{{ $data->receive_id }}">
                            <input type="hidden" name="ticket_id" value="{{ $data->ticket_id }}">
                            <input type="text" name="message" class="form-control" placeholder="پیام ...">
                            <div class="d-flex">
                                <button type="submit" class="ml-3 btn btn-primary btn-floating">
                                    <i class="fa fa-send"></i>
                                </button>
                                <div class="dropup">
                                    <button type="button" data-toggle="dropdown" class="ml-3 btn btn-success btn-floating">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <div class="dropdown-menu-body">
                                            <ul>
                                                <li>
                                                    {{-- <a class="dropdown-item" href="chat #">
                                                        <i class="icon fa fa-picture-o"></i> تصویر
                                                    </a> --}}
                                                    <input type="file" name="image" id="image" hidden>
                                                    <label for="image" class="dropdown-item">آپلود تصویر</label>
                                                </li>
                                                {{-- <li>
                                                    <a class="dropdown-item" href="chat #">
                                                        <i class="icon fa fa-video-camera"></i> ویدئو
                                                    </a>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Plugin scripts -->
    <script src="{{ assert('vendors/bundle.js') }}"></script>

    <!-- App scripts -->
    <script src="{{ assert('assets/js/app.js') }}"></script>

    <!-- begin::lightbox -->
    <script src="{{ assert('vendors/lightbox/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ assert('assets/js/examples/lightbox.js') }}"></script>

    {{-- <script>
        let ticket_status = document.getElementById("ticket_status")
        ticket_status.addEventListener("click" , function (e){
            let data = {
                "status":e.target.value
            }
            $.ajax({
                type: "PATCH",
                url: ""
            })
        })
    </script> --}}
@endsection
