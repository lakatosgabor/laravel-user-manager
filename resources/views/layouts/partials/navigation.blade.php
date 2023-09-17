<section class="nav-header">
    <header class="">
        {{ env('APP_NAME') }} <sup>{{ env('APP_VERSION') ? 'v.'.env('APP_VERSION') : '' }}</sup>
    </header>
    <nav class="nav-header__inner mr-4">
        @can('toggle_dark_mode')
            <DarkModeButton class="nav-item mr-1"/>
        @endcan
        <Link confirm method="POST" href="{{ route('logout') }}" class="nav-item">
        <span class="pi pi-sign-out"></span>
        </Link>
    </nav>
</section>
