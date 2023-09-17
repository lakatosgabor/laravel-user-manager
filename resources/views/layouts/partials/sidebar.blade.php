<aside class="sidebar">
    <div class="sidebar-upper">
        <x-profile-image/>
    </div>
    <div class="sidebar-body">
        <nav class="sidebar-nav">
            <Link href="{{ route('dashboard') }}" class="nav-item">
            <span class="pi pi-home text-xl"></span>
            </Link>

            @can('manage_users')
                <Link href="{{ route('users.index') }}" class="nav-item">
                <span class="pi pi-users text-xl"></span>
                </Link>
            @endcan

            @can('manage_roles')
                <Link href="{{ route('roles.index') }}" class="nav-item">
                <span class="pi pi-list text-xl"></span>
                </Link>
            @endcan

            @can('manage_permissions')
                <Link href="{{ route('permissions.index') }}" class="nav-item">
                <span class="pi pi-eye text-xl"></span>
                </Link>
            @endcan
        </nav>
    </div>
</aside>
