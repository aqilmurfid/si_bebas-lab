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
                             <th>Nomor Surat</th>
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
                            <td>{{ $item->nomor_surat }}</td>
                            <td>{{ $item->tanggal_ajuan }}</td>
                            <td>{{ $item->tanggal_proses }}</td>
                            <td>{{ $item->tanggal_selesai }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                @if ($item->status == 'Menunggu')
                                <form action="{{ route('laboran.surat.teruskan',$item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-primary">Teruskan</button>
                                </form>
                                @elseif ($item->status=='Selesai' && $item->nomor_surat == NULL)
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $item->id }}">
                                Beri Nomor Surat
                                  </button>
                                  @else
                                  -
                                @endif


                            </td>
                         </tr>
                         @empty
                         <tr>
                            <td colspan="8">---Data Kosong---</td>
                         </tr>

                         @endforelse

                         </tr>
                     </body>
                 </table>
             </div>
        </div>
    </div>
    @foreach ($surat as $item2)
    <div class="modal fade" id="exampleModal{{ $item2->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Beri Nomor Surat</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('laboran.simpan-nomor-surat', $item2->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    Surat telah disetujui,silahkan masukkan nomor surat <br>
                    <label for="nomor_surat">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" placeholder="Masukkan Nomor Surat" required>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan Nomor Surat</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    @endforeach

  </div>
  <!--Row-->



@endsection
