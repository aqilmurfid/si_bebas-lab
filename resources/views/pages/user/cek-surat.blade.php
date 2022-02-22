@extends('layouts.user')

@section('content')
<section class="banner_area">
    <div class="banner_inner d-flex align-items-center">
        <div class="container">
            <div class="banner_content text-center">
                <h2>Cek Riwayat Surat</h2>
                <div class="page_link">
                    <a href="{{ route('home') }}">Home</a>
                    <a href="{{ route('riwayat-surat') }}">Riwayat Surat</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================ End Banner Area =================-->

<!-- Start Sample Area -->
<section class="sample-text-area">
    <div class="container">
        <h3 class="text-heading title_color">Riwayat Surat</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NPM</th>
                        <th>Tanggal Ajuan</th>
                        <th>Tanggal Proses</th>
                        <th>Tanggal Selesai</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->user->npm }}</td>
                        <td>{{ $item->tanggal_ajuan }}</td>
                        <td>{{ $item->tanggal_proses }}</td>
                        <td>{{ $item->tanggal_selesai }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
