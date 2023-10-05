<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('img/icons/pln/logo.png') }}" alt="logo" width="100px">
            </span>
            {{-- <span class="app-brand-text demo menu-text fw-bolder ms-2">Rapat Yuk</span> --}}
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    {{-- Admin --}}
    @if (Auth::user()->role == 'Admin')
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Dashboard</span>
            </li>
            <li class="menu-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href=" {{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>

            <!-- Layouts -->

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Data Master</span>
            </li>
            <li class="menu-item {{ request()->routeIs('room.index') ? 'active' : '' }}" >
                    <a href=" {{ route('room.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <div data-i18n="Room">List Room</div>
                </a>
            </li>
            <li class="menu-item {{ request()->routeIs('users.index') ? 'active': '' }}">
                <a href="{{ route('users.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user"></i>
                    <div data-i18n="User">User</div>
                </a>
            </li>

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Transaksi</span>
            </li>
            <li class="menu-item {{ request()->routeIs('bookings.index') ? 'active':'' }}">
                <a href="{{ route('bookings.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                    <div data-i18n="Booking">List Booking</div>
                    @if ($pendingBookingCount > 0)
                    <span class="badge bg-primary ms-2">{{ $pendingBookingCount }}</span>
                    @endif
                </a>
            </li>
        </ul>
    @endif

    {{-- Pegawai --}}
    @if (Auth::user()->role == 'Pegawai')
        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Dashboard</span>
            </li>
            <li class="menu-item {{ request()->routeIs('pegawai.dashboard') ? 'active' : '' }}">
                <a href="{{ route('pegawai.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>

            <!-- Layouts -->

            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Data Master</span>
            </li>
            <li class="menu-item {{ request()->routeIs('room-pegawai.index') ? 'active' : '' }}">
                <a href="{{ route('room-pegawai.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-list-ul"></i>
                <div data-i18n="Room">List Ruangan</div>
                </a>
            </li>

            {{-- Transaksi --}}

        <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Transaksi</span>
            </li>
            <li class="menu-item {{ request()->routeIs('booking.index') ? 'active':'' }}">
                <a href="{{ route('booking.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-calendar"></i>
                    <div data-i18n="Booking">My Booking List</div>
                </a>
            </li>
        </ul>
    @endif
</aside>
