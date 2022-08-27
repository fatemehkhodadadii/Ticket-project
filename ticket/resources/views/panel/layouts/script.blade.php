<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"
integrity="sha512-o0rWIsZigOfRAgBxl4puyd0t6YKzeAw9em/29Ag7lhCQfaaua/mDwnpE2PVzwqJ08N7/wqrgdjc2E0mwdSY2Tg=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"
integrity="sha512-zMfrMAZYAlNClPKjN+JMuslK/B6sPM09BGvrWlW+cymmPmsUT1xJF3P4kxI3lOh9zypakSgWaTpY6vDJY/3Dig=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('vendors/charts/chartjs/chart.min.js') }}"></script>
<script src="{{ asset('vendors/circle-progress/circle-progress.min.js') }}"></script>
<script src="{{ asset('vendors/charts/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('assets/js/examples/charts/peity.js') }}"></script>
<script src="{{ asset('vendors/datepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendors/slick/slick.min.js') }}"></script>
<script src="{{ asset('vendors/vmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('vendors/vmap/maps/jquery.vmap.usa.js') }}"></script>
<script src="{{ asset('assets/js/examples/vmap.js') }}"></script>
<script src="{{ asset('assets/js/examples/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.0/html2canvas.min.js"
integrity="sha512-UcDEnmFoMh0dYHu0wGsf5SKB7z7i5j3GuXHCnb3i4s44hfctoLihr896bxM0zL7jGkcHQXXrJsFIL62ehtd6yQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- advance table --}}
<script>
    {{-- ajax setup --}}
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    {{-- end ajax setup --}}

    {{-- sweet alerts --}}
    @if (isset($errors))
        @foreach ($errors->all() as $error)
            Swal.fire({
            title: '{{ $error }}',
            icon: 'error',
            showConfirmButton: false,
            toast: true,
            timer: 2000,
            timerProgressBar: true,
            position: 'top-start',
            customClass: {
            popup: 'my-toast',
            icon: 'icon-center',
            title: 'left-gap',
            content: 'left-gap',
            }
            })
        @endforeach
    @endif

    @if (session()->has('status'))
        Swal.fire({
        title: '{{ session('status') }}',
        icon: 'success',
        showConfirmButton: false,
        toast: true,
        timer: 2000,
        timerProgressBar: true,
        position: 'top-start',
        customClass: {
        popup: 'my-toast',
        icon: 'icon-center',
        title: 'left-gap',
        content: 'left-gap',
        }
        })
    @endif

    @if (session()->has('error_status'))
        Swal.fire({
        title: '{{ session('error_status') }}',
        icon: 'error',
        showConfirmButton: false,
        toast: true,
        timer: 2000,
        timerProgressBar: true,
        position: 'top-start',
        customClass: {
        popup: 'my-toast',
        icon: 'icon-center',
        title: 'left-gap',
        content: 'left-gap',
        }
        })
    @endif

    {{-- end sweet alerts --}}

    {{-- ajax --}}

    {{-- delete tables row --}}
    $(document).on('click','.trashRow', function() {
        let self = $(this)
        Swal.fire({
            title: 'حذف شود؟',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#e04b4b',
            confirmButtonText: 'حذفش کن',
            cancelButtonText: 'لغو',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: self.data('url'),
                    type: 'post',
                    data: {
                        id: self.data('id'),
                        _method: 'delete'
                    },
                    success: function(res) {
                        $('.table').html($(res).find('.table').html());
                        Swal.fire({
                            title: 'با موفقیت حذف شد',
                            icon: 'success',
                            showConfirmButton: false,
                            toast: true,
                            timer: 2000,
                            timerProgressBar: true,
                            position: 'top-start',
                            customClass: {
                                popup: 'my-toast',
                                icon: 'icon-center',
                                title: 'left-gap',
                                content: 'left-gap',
                            }
                        })
                    }
                })

            }
        })
    })
    {{-- end delete tables row --}}

    {{-- end ajax --}}
</script>
