@extends('panel.layouts.master')
@section('content')

    @include('panel.layouts.sidebar')
    @include('panel.layouts.header')
<style>
    .table-bordered td, .table-bordered th {
        text-align: center;
    }
</style>
<section class="creat-shop">
    <main class="main-content">
        <div class="card">
            <div class="card-body">
                <a href="{{ route('users.create') }}" class="btn btn-outline-secondary btn-uppercase card-title mb-4">
                    <i class="fas fa-plus m-r-5"></i> ایجاد کاربر
                </a>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام و نام خانوادگی</th>
                            <th>دسترسی</th>
                            <th>ایمیل</th>
                            <th>تاریخ عضویت</th>
                            <th>ویرایش</th>
                            <th>حذف</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                            @php
                                $role = $item->role;
                                if($role == 'admin'){
                                    $role = 'مدیر';
                                }elseif($role == 'user'){
                                    $role == 'کاربر';
                                }
                            @endphp
                        <tr>
                            <td>{{ $data->firstItem() + $key }}</td>
                            <td>{{ findUser(true,$item->id) }}</td>
                            <td>{{ $role }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ verta($item->created_at)->format('Y/m/d - H:i') }}</td>
                            <td>
                                <a href="{{ route('users.edit',$item->id) }}" class="btn btn-warning btn-floating">
                                    <i class="fas fa-pen-square text-white"></i>
                                </a>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-floating trashRow" data-url="{{ route('users.destroy',$item->id) }}" data-id="{{ $item->id }}" >
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
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
            {!! $data->links('vendor.pagination.default') !!}
        </div>
    </main>
</section>

<script>
    let customSwitch = document.getElementsByClassName("customSwitch")
    let status = null

    Array.from(customSwitch).forEach(custom => {

            custom.addEventListener("click", function() {
                if (this.hasAttribute("checked")) {
                    status = 0
                    this.removeAttribute("checked")
                } else {
                    status = 1
                    this.setAttribute("checked", "")
                }
                let id = this.dataset.id
                let data = {
                    "status": status
                }

                $.ajax({
                    type: "POST",
                    url: "/users/changeStatus/"+id,
                    data: data,
                    success: function(response) {
                        console.log(response)
                    }
                })
            })
    })
</script>
@endsection
