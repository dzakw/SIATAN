<nav id="sidebarMenu" class="sidebar d-md-block bg-primary text-white collapse" data-simplebar>
    <div class="sidebar-inner px-4 pt-3">
        <div
            class="user-card d-flex d-md-none align-items-center justify-content-between justify-content-md-center pb-4">
            <div class="d-flex align-items-center">
                <div class="user-avatar lg-avatar mr-4">
                    <img src="{{ Storage::url('public/'. auth()->user()->image) }}"
                        class="card-img-top rounded-circle border-white" alt="Bonnie Green">
                </div>
                <div class="d-block">
                    <h2 class="h6">Hi, {{ auth()->user()->name }}</h2>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();" class="btn btn-secondary text-dark btn-xs"><span
                            class="mr-2"><span class="fas fa-sign-out-alt"></span></span>Sign Out</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            <div class="collapse-close d-md-none">
                <a href="#sidebarMenu" class="fas fa-times" data-toggle="collapse" data-target="#sidebarMenu"
                    aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation"></a>
            </div>
        </div>
        <ul class="nav flex-column">

            {{-- Sidebar Admin --}}
            @can('isAdmin')
            <li class="nav-item ">
                <a href="{{ route('dashboard.admin') }}" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#gapoktan">
                    <span>
                        <span class="sidebar-icon"><span class="fas fa-tractor"></span></span>
                        Gapoktan
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                </span>
                <div class="multi-level collapse {{ (Request::route()->getName() == 'ketua.gapoktan.index') ||
                                                      (Request::route()->getName() == 'ketua.gapoktan.create') ||
                                                      (Request::route()->getName() == 'ketua.gapoktan.show')  ? 'show' : '' }}"
                    role="list" id="gapoktan" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ (Request::route()->getName() == 'ketua.gapoktan.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('ketua.gapoktan.index') }}"><span>Data Gapoktan</span></a>
                        </li>
                        <li class="nav-item {{ (Request::route()->getName() == 'ketua.gapoktan.create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('ketua.gapoktan.create') }}"><span>Tambah Gapoktan</span></a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#poktan">
                    <span>
                        <span class="sidebar-icon"><span class="fas fa-object-group"></span></span>
                        Poktan
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                </span>
                <div class="multi-level collapse {{ (Request::route()->getName() == 'poktan.index') ||
                                                      (Request::route()->getName() == 'poktan.create') ||
                                                      (Request::route()->getName() == 'poktan.show') ? 'show' : '' }}"
                    role="list" id="poktan" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ (Request::route()->getName() == 'poktan.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('poktan.index') }}"><span>Data Poktan</span></a>
                        </li>
                        <li class="nav-item {{ (Request::route()->getName() == 'poktan.create') ? 'active' : '' }}">
                            <a class="nav-link" href="/admin/ketua/poktan/create"><span>Tambah Poktan</span></a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">
    <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
        data-toggle="collapse" data-target="#submenu-app">
        <span>
            <span class="sidebar-icon"><span class="fas fa-users"></span></span>
            Anggota Poktan
        </span>
        <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
    </span>
    <div class="multi-level collapse {{ (Request::route()->getName() == 'anggota_poktan.index') ||
                                          (Request::route()->getName() == 'anggota_poktan.create') ||
                                          (Request::route()->getName() == 'anggota_poktan.show') ? 'show' : '' }}" role="list"
        id="submenu-app" aria-expanded="false">
        <ul class="flex-column nav">
            <li class="nav-item {{ (Request::route()->getName() == 'anggota_poktan.index') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('anggota_poktan.index') }}"><span>Data Anggota</span></a>
            </li>
            <li class="nav-item {{ (Request::route()->getName() == 'anggota_poktan.create') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('anggota_poktan.create') }}"><span>Tambah Anggota</span></a>
            </li>
        </ul>
    </div>
</li>

            <li class="nav-item">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#pinjaman-app">
                    <span>
                        <span class="sidebar-icon"><span class="fas fa-table"></span></span>
                        Pinjaman
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                </span>
                <div class="multi-level collapse {{ (Request::route()->getName() == 'pinjaman.index') ||
                                          (Request::route()->getName() == 'pinjaman.create') ||

                                          (Request::route()->getName() == 'pinjaman.show')  ? 'show' : '' }}"
                    role="list" id="pinjaman-app" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ (Request::route()->getName() == 'pinjaman.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pinjaman.index') }}"><span>Data Pinjaman</span></a>
                        </li>
                        <li class="nav-item {{ (Request::route()->getName() == 'pinjaman.create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pinjaman.create') }}"><span>Tambah Pinjaman</span></a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- Sidebar Ketua --}}
            @elsecan('isKetua')
            <li class="nav-item {{ (request()->is('ketua') ? 'active' : '') }}">
                <a href="{{ route('dashboard.ketua') }}" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-chart-pie"></span></span>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="nav-item {{ (request()->is('ketua/user*') ? 'active' : '') }}">
                <span class="nav-link  collapsed  d-flex justify-content-between align-items-center"
                    data-toggle="collapse" data-target="#submenu-app">
                    <span>
                        <span class="sidebar-icon"><span class="fas fa-users"></span></span>
                        User
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                </span>
                <div class="multi-level collapse {{ (Request::route()->getName() == 'user.index') ||
                                        (Request::route()->getName() == 'user.create') ||
                                        (Request::route()->getName() == 'user.show')  ? 'show' : '' }}" role="list"
                    id="submenu-app" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ (Request::route()->getName() == 'user.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.index') }}"><span>Data User</span></a>
                        </li>
                        <li class="nav-item {{ (Request::route()->getName() == 'user.create') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user.create') }}"><span>Tambah User</span></a>
                        </li>
                    </ul>
                </div>
            </li>


            <li class="nav-item {{ request()->is('ketua/pinjaman-ketua*') ? 'active' : '' }}">
                <a href="{{ route('pinjaman-ketua.index') }}" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-database"></span></span>
                    <span>Data Pinjaman</span>
                </a>
            </li>

            <li class="nav-item {{ request()->is('ketua/pengaturan*') ? 'active' : '' }}">
                <a href="{{ route('pengaturan.index') }}" class="nav-link">
                    <span class="sidebar-icon"><span class="fas fa-anchor"></span></span>
                    <span>Pengaturan</span>
                </a>
            </li>
            @endcan




        </ul>
    </div>
</nav>
