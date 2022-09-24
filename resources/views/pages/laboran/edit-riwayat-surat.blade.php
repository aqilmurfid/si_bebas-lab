@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Riwayat Surat</li>
    </ol>
</div>

<form action="{{ route('laboran.riwayat-surat.update', $item->id) }}" method="post">
    @csrf
    @method('PATCH')
    <div class="row mb-3 justify-content-center">
        <div class="col-10 card">
            <div class="card-body">
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ $item->user->nama }}" readonly>
                </div>
                <div class="form-group">
                    <label for="npm">NPM</label>
                    <input type="text" name="npm" id="npm" class="form-control" value="{{ $item->user->npm }}" readonly>
                </div>
                <div class="form-group">
                    <label for="nomor_surat">Nomor Surat</label>
                    <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" placeholder="Masukkan Nomor Surat" value="{{ $item->nomor_surat }}">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </div>
        </div>
    </div>
</form>

@endsection
