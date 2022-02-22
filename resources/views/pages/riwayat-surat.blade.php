@extends('layouts.admin')

@section('title')
<title>Riwayat Surat</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Riwayat Surat</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Riwayat Surat</li>
    </ol>
</div>

<div class="row mb-3 text-center justify-content-center">
    <div class="card col-12">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">

                    <head>
                        <tr>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Nomor Surat</th>
                            <th>Tanggal Ajuan</th>
                            <th>Tanggal Proses</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                        </tr>
                    </head>

                    <body>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->user->npm }}</td>
                            <td>{{ $item->nomor_surat }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_ajuan)->translatedFormat('d F Y') }}</td>
                            <td>
                                @if ($item->tanggal_proses != NULL)
                                {{ \Carbon\Carbon::parse($item->tanggal_proses)->translatedFormat('d F Y') }}
                                @else
                                -
                                @endif
                            </td>
                            <td>
                                @if ($item->tanggal_selesai != NULL)
                                {{ \Carbon\Carbon::parse($item->tanggal_selesai)->translatedFormat('d F Y') }}
                                @else
                                -
                                @endif
                            </td>
                            <td>{{ $item->status }}</td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="7">---Data Kosong---</td>
                        </tr>

                        @endforelse

                        </tr>
                    </body>
                </table>
            </div>
            <div class="d-flex justify-content-end">
                <a href="{{ route('ka_lab.laporan') }}" class="btn btn-primary mt-3">Cetak Laporan</a>
            </div>
        </div>
    </div>


</div>
<!--Row-->



@endsection
