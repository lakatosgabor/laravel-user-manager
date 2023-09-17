<x-app-layout>
    <x-splade-modal>
        <x-splade-form action="{{ route('roles.store') }}">
            <div class="my-2">
                <x-splade-input name="name" label="Role Name" required/>
            </div>
            <div class="my-2">
                <x-splade-select label="Assign Permissions" name="permissions[]" :options="$permissions"
                                 option-label="name"
                                 option-value="name" multiple choices/>
            </div>
            <div class="my-2">
                <x-splade-submit label="Create Role"/>
            </div>
        </x-splade-form>
    </x-splade-modal>
</x-app-layout>
