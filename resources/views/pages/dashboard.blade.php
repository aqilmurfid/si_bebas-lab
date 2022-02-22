@extends('layouts.admin')

@section('title')
<title>Dashboard</title>
@endsection

@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="./">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
  </div>

  <div class="row mb-3 text-center justify-content-center">
  <div class="col-8">
      <div class="card">
          <div class="card-body">
              <h2>Selamat Datang, {{ Auth::user()->nama }}</h2>
          </div>
      </div>
  </div>

  </div>
  <!--Row-->
@endsection
