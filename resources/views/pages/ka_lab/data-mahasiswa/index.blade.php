@extends('layouts.admin')

@section('title')
<title>Data Mahasiswa</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Surat</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="card col-12">
        <div class="card-body">
            @if (Auth::user()->role == 'LABORAN')
            <a href="{{ route('data-mahasiswa-create') }}" class="btn btn-info mb-3">Tambah Data Mahasiswa</a>
            <button type="button" class="btn btn-info px-4 mb-3 text-white" data-toggle="modal"
                data-target="#modal-import">
                Import Database
            </button>
            <!-- Modal -->
            <div class="modal fade" id="modal-import" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Database Alumni</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('data-mahasiswa-import') }}" method="POST" enctype="multipart/form-data">
                            <div class="modal-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="file">Pilih file yang ingin diimport</label>
                                    <input type="file" class="form-control" name="file" id="file">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                <button type='submit' class='btn btn-primary'>Import</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @endif
            <div class="table-responsive text-center">
                <table class="table table-bordered text-nowrap">

                    <head>
                        <tr>
                            <th>Nama</th>
                            <th>NPM</th>
                            <th>Aksi</th>
                        </tr>
                    </head>

                    <body>
                        @forelse ($items as $item)
                        <tr>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->npm }}</td>
                            <td>
                                @if (Auth::user()->role == 'LABORAN')
                                <a href="{{ route('data-mahasiswa-edit', $item->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                @endif
                                @if (Auth::user()->role == 'KEPALA LAB')
                                <form action="{{ route('data-mahasiswa-destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                                @endif
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
