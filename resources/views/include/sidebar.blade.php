<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
      <div class="sidebar-brand-icon">
        <img src="{{ url('logounib.png') }}">
      </div>
      <div class="sidebar-brand-text mx-3">LAB SI UNIVERSITAS BENGKULU</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item @if(Route::is('dashboard')) active @endif">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="fas fa-fw fa-columns"></i>
        <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
      Features
    </div>
    <li class="nav-item @if(Route::is('surat.index') || Route::is('ka_lab.surat.index') || Route::is('ka_lab.surat.index')) active @endif">
        @if(Auth::user()->role==='MAHASISWA')
        <a class="nav-link" href="{{ route('surat.index') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Surat</span>
        </a>
        @elseif(Auth::user()->role==='LABORAN')
        <a class="nav-link" href="{{ route('laboran.surat.index') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Surat</span>
        </a>
        @elseif(Auth::user()->role==='KEPALA LAB')
        <a class="nav-link" href="{{ route('ka_lab.surat.index') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Surat</span>
        </a>
        @endif
    </li>
    @if (Auth::user()->role === 'KEPALA LAB')
    <li class="nav-item @if(Route::is('ka_lab.profile')) active @endif">
        <a class="nav-link" href="{{ route('ka_lab.profile') }}">
          <i class="fas fa-fw fa-id-card-alt"></i>
          <span>Data Laboran</span></a>
    </li>
    <li class="nav-item @if(Route::is('ka_lab.kepala-lab')) active @endif">
        <a class="nav-link" href="{{ route('ka_lab.kepala-lab') }}">
          <i class="fas fa-fw fa-id-card"></i>
          <span>Data Ka. Lab</span></a>
    </li>
    @endif
    @if (Auth::user()->role==='LABORAN'|| Auth::user()->role ==='KEPALA LAB')
    <li class="nav-item @if(Route::is('riwayat-surat')) active @endif">
        <a class="nav-link" href="{{ route('riwayat-surat') }} ">
          <i class="fas fa-fw fa-mail-bulk"></i>
          <span>Riwayat Surat</span></a>
      </li>
      <li class="nav-item @if(Route::is('data-mahasiswa.index')) active @endif">
        <a class="nav-link" href="{{ route('data-mahasiswa.index') }} ">
          <i class="fas fa-fw fa-mail-bulk"></i>
          <span>Data Mahasiswa</span></a>
      </li>
    @endif
  </ul>
