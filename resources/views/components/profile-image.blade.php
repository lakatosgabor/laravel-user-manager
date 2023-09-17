@can('manage_profile')
    <Link modal href="{{ route('users.edit', auth()->user()) }}">
@endcan

@if (auth()->user()->image)
    <img class="h-11 w-11 rounded-full border border-gray-300 bg-contain bg-center" src="{{ auth()->user()->image }}"
         alt="{{ auth()->user()->uuid }}"/>
@else
    <div class="avatar placeholder">
        <div class="bg-neutral-focus text-neutral-content rounded-full h-11 w-11">
            <span class="text-3xl ml-0.5 mb-1">{{ strtoupper(substr(auth()->user()->name, 0, 1))  }}</span>
        </div>
    </div>
    @endif

    @can('manage_profile')
        </Link>
@endcan
