<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="{{asset("dashboard/dist/img/AdminLTELogo.png")}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dashboard/dist/img/AdminLTELogo.png')}}" class="img-circle elevation-3" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('admin.account')}}" id="logoUserName" class="d-block">{{auth()->user()->user_name}}</a>
                <div class="icon text-center">
                    <a href="{{route('admin.logout')}}" class="d-block text-danger">Logout <i class="fas fa-sign-out-alt"></i></a>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                            Users
                            <span class="badge badge-info right">{{((\App\Models\User::with('roles')->get())->reject(function ($query) {return $query->hasRole('admin');}))->count()}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('color.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-palette"></i>
                        <p>
                            Colors
                            <span class="badge badge-info right">{{\App\Models\Colour::count()}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('face_shape.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-skull"></i>
                        <p>
                            Face Shapes
                            <span class="badge badge-info right">{{\App\Models\Face_shape::count()}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('hair_style.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Hair Styles
                            <span class="badge badge-info right">{{\App\Models\Hair_style::count()}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('hair_length.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Hair Lengths
                            <span class="badge badge-info right">{{\App\Models\Hair_length::count()}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('skin_tone.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-skull"></i>
                        <p>
                            Skin Tones
                            <span class="badge badge-info right">{{\App\Models\Skin_tone::count()}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('combination_feature.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Combination Feature
                            <span class="badge badge-info right">{{\App\Models\Combination_feature::count()}}</span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user_feature.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            User Activity
                            <span class="badge badge-info right">{{\App\Models\User_feature::count()}}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
