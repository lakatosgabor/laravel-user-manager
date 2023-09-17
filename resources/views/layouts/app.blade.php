<main class="app-wrapper">
    @include('layouts.partials.sidebar')
    <section class="app-body">
        <div>
            @include('layouts.partials.navigation')
        </div>
        <div class="grid flex-row grid-cols-2 gap-4 app-card">
            <div class="inline-block align-middle text-lg mt-0.5">
                @include('layouts.partials.welcome-message')
            </div>
            <div class="inline-block align-middle text-right">
                @include('layouts.partials.profile-buttons')
            </div>
        </div>
        <div class="app-card">
            @if (isset($header))
                <div class="mb-2 pb-2">
                    {{ $header }}
                </div>
            @endif

            <div>
                {{ $slot }}
            </div>
        </div>
        <div>
            @include('layouts.partials.footer')
        </div>
    </section>
</main>
