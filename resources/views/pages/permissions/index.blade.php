@php use Spatie\Permission\Models\Permission; @endphp
<x-app-layout>
    <div class="my-2 text-right">
        <Link href="{{ route('permissions.create') }}" modal class="btn">
        Create Permission
        </Link>
    </div>
    <div class="my-2">
        <PermissionTable :data="@js($permissions)"/>
    </div>

    <div class="py-4 px-1">
        {{ $permissions->links() }}
    </div>
</x-app-layout>
