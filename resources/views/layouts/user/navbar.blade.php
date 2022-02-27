<header class="mb-5">
    <div class="header-top">
        <div class="container">
            <div class="logo">
                <a href="/"><img src="{{asset('assets/images/logo/logo.png')}}" alt="Logo" srcset=""></a>
            </div>
            <div class="header-top-right">
                <div class="dropdown">
                    <a href="#" class="user-dropdown d-flex dropend" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar avatar-md2" >
                            <img src="{{asset('assets/images/faces/1.jpg')}}" alt="Avatar">
                        </div>
                        <div class="text">
                            <h6 class="user-dropdown-name">{{ auth()->user()->name }}</h6>
                            <p class="user-dropdown-status text-sm text-muted">User</p>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow-lg" aria-labelledby="dropdownMenuButton1">
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                    </ul>
                </div>

                <!-- Burger button responsive -->
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </div>
        </div>
    </div>
    <nav class="main-navbar">
        <div class="container">
            <ul>
                <li class="menu-item">
                    <a href="{{route('dashboard')}}" class='menu-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{route('riwayat')}}" class='menu-link'>
                    <i class="bi bi-clock-history"></i>
                        <span>Riwayat pembelian</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

</header>