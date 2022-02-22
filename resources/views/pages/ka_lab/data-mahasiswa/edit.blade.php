@extends('layouts.admin')

@section('title')
<title>Edit Data Mahasiswa</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Mahasiswa</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item"><a href="./">Data Mahasiswa</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
    </ol>
</div>

<div class="row mb-3">
    <div class="card col-12">
        <div class="card-body">
            <form action="{{ route('data-mahasiswa-update', $item->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="{{ $item->nama }}">
                </div>
                <div class="form-group">
                    <label for="npm">NPM</label>
                    <input type="text" name="npm" id="npm" class="form-control" placeholder="NPM" value="{{ $item->npm }}">
                </div>
                <div class="form-group">
                    <label for="no_hp">No HP</label>
                    <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No HP" value="{{ $item->no_hp }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $item->email }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Simpan</button>
            </form>
        </div>
    </div>
</div>
<!--Row-->
@endsection
