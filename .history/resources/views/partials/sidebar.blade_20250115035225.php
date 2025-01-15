<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
        </a>
        <div class="navbar-nav w-100">
            <a href="{{ route('dashboard') }}" class="nav-item nav-link @if(Route::currentRouteName() == 'dashboard') active @endif">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>
            <a href="#" class="nav-item nav-link">
                <i class="fa fa-th me-2"></i>Manage Skill's
            </a>
            <a href="#" class="nav-item nav-link">
                <i class="fa fa-keyboard me-2"></i>Manage Service's
            </a>
            <a href="#" class="nav-item nav-link">
                <i class="fa fa-table me-2"></i>Manage Project's
            </a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    <i class="far fa-user me-2"></i>Setting
                </a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('manage-user') }}" class="dropdown-item">Manage User</a>
                    <a href="{{ route('profile.page') }}" class="dropdown-item @if(Route::currentRouteName() == 'profile.page') active @endif">My Profile</a>
                </div>
            </div>
        </div>
    </nav>
</div>
