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
                         @forelse ($surat as $item)
                         <tr>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->user->npm }}</td>
                            <td>{{ $item->tanggal_ajuan }}</td>
                            <td>{{ $item->tanggal_proses }}</td>
                            <td>{{ $item->tanggal_selesai }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <form action="{{ route('ka_lab.surat.terima',$item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Terima</button>
                                </form>

                            </td>
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
        </div>
    </div>


  </div>
  <!--Row-->



@endsection
