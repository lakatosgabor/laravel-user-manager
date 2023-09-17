@php use Spatie\Permission\Models\Role; @endphp
<x-app-layout>
    <div class="my-2 text-right">
        <Link href="{{ route('roles.create') }}" modal class="btn">
        Create Role
        </Link>
    </div>
    <div class="my-2">
        <RoleTable :data="@js($roles)"/>
    </div>

    <div class="py-4 px-1">
        {{ $roles->links() }}
    </div>
</x-app-layout>
