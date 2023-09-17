<x-app-layout>

    @can('create_user')
        <div class="my-2 text-right">
            <Link href="{{ route('users.create') }}" modal class="btn">
            Create User
            </Link>
        </div>
    @endcan

    <div class="my-2">
        <UserTable :data="@js($users)"/>
    </div>

    <div class="py-4 px-1">
        {{ $users->links('vendor.pagination.tailwind') }}
    </div>
</x-app-layout>
