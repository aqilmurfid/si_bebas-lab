@extends('layouts.admin')

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="./">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Surat</li>
    </ol>
</div>

<div class="row mb-3 justify-content-center">
    <div class="col-10 card">
        <div class="card-body">
            <a href="{{ route('surat.preview') }}" class="btn btn-info mb-2" target="_blank">Template Surat</a>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ Auth::user()->nama }}" readonly>
            </div>
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" name="npm" id="npm" class="form-control" value="{{ Auth::user()->npm }}" readonly>
            </div>
            <a href="{{route('surat.store') }}" class="btn btn-primary btn-block">Ajukan Surat</a>
        </div>
    </div>
</div>
<!--Row-->



@endsection
