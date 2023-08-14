<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #05e8ba;
background-image: linear-gradient(315deg, #05e8ba 0%, #087ee1 74%);">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
        <div class="sidebar-brand-icon">
            <img src="{{asset('assets/lg-bns.png')}}" width="50" height="50">
        </div>
        <div class="sidebar-brand-text mx-3">SIBANSER</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
         {{-- menu anggota --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAnggota"
                aria-expanded="true" aria-controls="collapseAnggota">
                <i class="fas fa-fw fa-user"></i>
                <span>Keanggotaan</span>
            </a>
            <div id="collapseAnggota" class="collapse" aria-labelledby="headingAnggota"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if(auth()->user()->role == 'admin')
                        <a class="collapse-item" href="{{ route('anggota')}}">Anggota</a>
                        <a class="collapse-item" href="{{ route('tambah.anggota')}}">Tambah Anggota</a>
                        <a class="collapse-item" href="{{ route('index.ranting')}}">Ranting</a>
                        @else
                        <a class="collapse-item" href="{{ route('profile', auth()->user()->remember_token)}}">Profile</a>
                    @endif
                </div>
            </div>
        </li>

        {{-- menu program kerja --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProker"
                aria-expanded="true" aria-controls="collapseProker">
                <i class="fas fa-fw fa-file"></i>
                <span>Program Kerja</span>
            </a>
            <div id="collapseProker" class="collapse" aria-labelledby="headingProker"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    @if(auth()->user()->role == 'admin')
                    <a class="collapse-item" href="{{ route('proker')}}">Program Kerja</a>
                    <a class="collapse-item" href="{{ route('tambah.proker')}}">Tmbah Program Kerja</a>
                        @else
                        <a class="collapse-item" href="{{ route('proker')}}">Program Kerja</a>
                    @endif
                </div>
            </div>
        </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKegiatan"
            aria-expanded="true" aria-controls="collapseKegiatan">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            <span>Kegiatan</span>
        </a>
        <div id="collapseKegiatan" class="collapse" aria-labelledby="headingKegiatan"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                @if(auth()->user()->role == 'admin')
                <a class="collapse-item" href="{{ route('kegiatan')}}">Riwayat Kegiatan</a>
                <a class="collapse-item" href="{{ route('tambah.kegiatan')}}">Tambah Riwayat Kegiatan</a>
                @else
                    <a class="collapse-item" href="{{ route('kegiatan')}}">Riwayat Kegiatan</a>
                @endif
            </div>
        </div>
    </li>
    
@if(auth()->user()->role == 'admin')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ route('pesan')}}">
            <i class="fab fa-telegram-plane"></i>
            &nbsp;<span>Kirim Pesan</span>
        </a>
    </li>
@endif

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>