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
                <span class="nav-link collapsed d-flex justify-content-between align-items-center"
                      data-toggle="collapse" data-target="#pinjaman-app">
                    <span>
                        <span class="sidebar-icon"><span class="fas fa-table"></span></span>
                        Pinjaman
                    </span>
                    <span class="link-arrow"><span class="fas fa-chevron-right"></span></span>
                </span>
                <div class="multi-level collapse {{ (Request::route()->getName() == 'pinjaman.index') ||
                                                      (Request::route()->getName() == 'pinjaman.create') ||

                                                      (Request::route()->getName() == 'pinjaman.show') ? 'show' : '' }}"
                     role="list" id="pinjaman-app" aria-expanded="false">
                    <ul class="flex-column nav">
                        <li class="nav-item {{ (Request::route()->getName() == 'pinjaman.index') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pinjaman.index') }}"><span>Data Pinjaman</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pinjaman.pdf')}}"><span>Print PDF</span></a>
                        </li>
                    </ul>
                </div>
            </li>

        </ul>
    </div>
</li>
</nav>
