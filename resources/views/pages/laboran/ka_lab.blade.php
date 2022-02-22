@extends('layouts.admin')

@section('title')
<title>Data Kepala Lab</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Kepala Laboratorium</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Kepala Laboratorium</li>
    </ol>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('ka_lab.kepala-lab-update') }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama" value="{{ $user->nama }}">
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control" placeholder="NIP" value="{{ $user->nip }}">
            </div>
            <div class="form-group">
                <label for="no_hp">No. Handphone</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control" placeholder="No. Handphone" value="{{ $user->no_hp }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Email" value="{{ $user->email }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" value="">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password" value="">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan Perubahan</button>
        </form>
    </div>
</div>
@endsection
