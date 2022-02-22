@extends('layouts.user')

@section('content')
<!--================ Start Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="banner_content">
                        <h3 class="text-capitalize">Selamat Datang</h3>
                        <h2 class="text-capitalize">Di Sistem Informasi</h2>
                        <h5 class="text-capitalize">Surat Bebas Lab Prodi Sistem Informasi</h5>
                        @if (Auth::user())
                        <div class="d-flex align-items-center">
                            <a class="primary_btn" href="{{ route('dashboard') }}"><span>Dashboard</span></a>
                        </div>
                        @else
                        <div class="d-flex align-items-center">
                            <a class="primary_btn" href="{{ route('login') }}"><span>Masuk</span></a>
                        </div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="home_right_img">
                        <img class="" src="{{ url('frontend/img/banner/home-right.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Home Banner Area =================-->
@endsection
