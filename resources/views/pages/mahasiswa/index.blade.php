@extends('layouts.admin')

@section('title')
<title>Surat</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Surat</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Surat</li>
    </ol>
  </div>

  <div class="row mb-3 text-center justify-content-center">
    <div class="card col-12">
        <div class="card-body">
            @if ($surat)
            <div class="table-responsive">
                <table class="table table-bordered text-nowrap">
                    <head>
                        <tr>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Tanggal Ajuan</th>
                            <th>Tanggal Proses</th>
                            <th>Tanggal Selesai</th>
                            <th>Status</th>
                            <th>Aksi</th>
                           </tr>
                    </head>
                    <body>
                        <tr>
                            <td>{{ $surat->user->nama }}</td>
                            <td>{{ $surat->user->npm }}</td>
                            <td>{{ $surat->tanggal_ajuan }}</td>
                            <td>{{ $surat->tanggal_proses }}</td>
                            <td>{{ $surat->tanggal_selesai }}</td>
                            <td>{{ $surat->status }}</td>
                            <td>
                                @if ($surat->status === 'Selesai')
                                <a href="{{ route('surat.cetak') }}"class="btn btn-info" target="_blank">Cetak Surat</a>

                                @else
                                    Surat Belum Disetujui
                                @endif
                            </td>
                        </tr>
                    </body>
                </table>
            </div>
            @else
                <div class="text-center">
                    <h2>Belum Mengajukan Surat</h2>
                    <a href="{{ route('surat.create') }}" class="btn btn-primary mt-1">Ajukan Surat</a>
                </div>
            @endif

        </div>
    </div>


  </div>
  <!--Row-->



@endsection
