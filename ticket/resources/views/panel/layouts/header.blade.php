<style>
    .switcher{
        width: 130px;
        height : 38px;
        display: flex;
        align-items: flex-start;
    }




    .left {
        width: 25%;
        height: 38px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: x-large;
    }

    .center {
        width: 50%;
        height: 38px;

    }

    .right {
        width: 25%;
        height: 38px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: x-large;
    }


    .swiper{
        display: flex;
        width: 100%;
        height: 38px;
        border-radius: 50px;
        align-items: center;
        justify-content: flex-start;
        border-style: solid;
        border-color: #262626;
        border-width: 1px;
        padding: 1px
    }

    .swiperInner {

        width: 32px;
        height: 32px;
        background-color: #242424;
        border-radius: 50%;
        box-shadow: #ffffff 0px 0px 10px;
    }

    .swiperInner:hover {
        box-shadow: #2436c2 0px 0px 10px;
    }




</style>


<script>
    $(document).ready(()=>{

        let day = true
        $('.swiper').click(()=>{
            if (day){
                $('.swiper').css('justify-content','flex-end');
                $('.main-content').css('background' ,'#38385f');
                $('body').css('background' ,'#38385f');
                $('.header-body').css('background' ,'#38385f');
                $('.page-title').css('color' ,'white');
                $('.breadcrumb-item').css('color' ,'#dcc314');
                $('h6').css('color' ,'black');
                $('i').css('color' ,'black');
                $('.fa-sun').css('color' , 'white')
                $('.fa-moon').css('color' , 'white')
                $('.swiperInner').css('color' , 'white');
                $('.card').css('background' , 'gray')
                day = false
            }else{
                $('.swiper').css('justify-content','flex-start');
                $('.main-content').css('background' ,' #e7ebee');
                $('body').css('background' ,'#e7ebee');
                $('.header-body').css('background' ,'#e7ebee');
                $('.page-title').css('color' ,'black');
                $('a').css('color' ,'black');
                $('.breadcrumb-item').css('color' ,'#5867dd');
                $('h6').css('color' ,'black');
                $('.fa-moon').css('color' , 'black')
                $('.fa-sun').css('color' , 'black')
                $('.swiperInner').css('background' , '#dcc314')
                day = true
            }

        })
    })
</script>




<!-- begin::header -->
<div class="header">

    <!-- begin::header logo -->
    <div class="header-logo">
        <a href="index.html">
            <img width="80" height="80" class="large-logo rounded-circle" src="{{ asset('assets/media/image/avatar.jpg') }}" alt="image">
            <!-- <img width="80" height="80" class="small-logo" src="{{ asset('assets/media/image/login-sm.jpg') }}" alt="image"> -->
            <!-- <img width="80" height="80" class="dark-logo" src="{{ asset('assets/media/image/login-sm.jpg') }}" alt="image"> -->
        </a>
    </div>
    <!-- end::header logo -->

    <!-- begin::header body -->
    <div class="header-body">

        <div class="header-body-left">

            <h3 class="page-title">داشبورد</h3>

            <!-- begin::breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html#">داشبورد</a></li>
                </ol>
            </nav>
            <!-- end::breadcrumb -->

        </div>

        <div class="header-body-right">
            <!-- begin::navbar main body -->
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                        <div>
                            <figure class="avatar avatar-state-success avatar-sm">
                                <img src="assets/media/image/avatar.jpg"
                                    class="rounded-circle" alt="image">
                            </figure>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- end::navbar main body -->

            <div class="d-flex align-items-center">
                <!-- begin::navbar navigation toggler -->
                <div class="d-xl-none d-lg-none d-sm-block navigation-toggler">
                    <a href="index.html#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                <!-- end::navbar navigation toggler -->

                <!-- begin::navbar toggler -->
                <div class="d-xl-none d-lg-none d-sm-block navbar-toggler">
                    <a href="index.html#">
                        <i class="fas fa-ellipsis-h"></i> </a>
                </div>
                <!-- end::navbar toggler -->
            </div>
        </div>

    </div>
    <!-- end::header body -->

</div>
<!-- end::header -->

