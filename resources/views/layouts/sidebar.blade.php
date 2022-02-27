<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            
            <li class="sidebar-item  {{ (request()->is('admin')) ? 'active' : '' }}">
                <a href="/admin" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <li class="sidebar-item  has-sub {{ (request()->is('admin')) ? '' : 'active' }}">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-stack"></i>
                    <span>Master</span>
                </a>
                <ul class="submenu {{ (request()->is('admin')) ? '' : 'active' }}">
                    <li class="submenu-item {{ (request()->is('admin/place*')) ? 'active' : '' }}">
                        <a href="/admin/place">Wisata</a>
                    </li>
                    <li class="submenu-item {{ (request()->is('admin/paket*')) ? 'active' : '' }}">
                        <a href="/admin/paket">Paket</a>
                    </li>
                </ul>
            </li>            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
</div>