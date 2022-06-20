<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Muy Humano</span>
        {{-- <span class="brand-text font-weight-light">AdminLTE 3</span> --}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Buscar" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->
                
                <li class="nav-item">
                    <a href="/start" class="nav-link {{ request()->is('start') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Inicio
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Panel de Control
                            {{-- <span class="right badge badge-danger">New</span> --}}
                        </p>
                    </a>
                </li>
                @can('company_index')
                    <li class="nav-item {{ request()->is('companies*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('companies*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building"></i>
                            <p>
                                Empresas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/companies" class="nav-link {{ request()->is('companies') ? 'active' : '' }}">
                                    {{-- <i class="far fa-circle nav-icon"></i> --}}
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>Ver Empresas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/companies/create" class="nav-link {{ request()->is('companies/create') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>Crear Empresa</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                {{-- <li class="nav-item menu-open"> --}}
                @can('user_index')
                    <li class="nav-item {{ request()->is('users*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Usuarios
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/users" class="nav-link {{ request()->is('users') ? 'active' : '' }}">
                                    {{-- <i class="far fa-circle nav-icon"></i> --}}
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>Ver Usuarios</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/users/create" class="nav-link {{ request()->is('users/create') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>Crear Usuario</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                
                @can('permission_index')
                    <li class="nav-item {{ request()->is('permissions*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-key"></i>
                            <p>
                                Permisos
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('permissions.index') }}" class="nav-link {{ request()->is('permissions') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>Ver Permisos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('permissions.create') }}" class="nav-link {{ request()->is('permissions/create') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>Crear Permiso</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                
                @can('role_index')
                    <li class="nav-item {{ request()->is('roles*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->is('roles*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-robot"></i>
                            <p>
                                Roles
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('roles.index') }}" class="nav-link {{ request()->is('roles') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>Ver Roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('roles.create') }}" class="nav-link {{ request()->is('roles/create') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-ellipsis-h"></i>
                                    <p>Crear Rol</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>