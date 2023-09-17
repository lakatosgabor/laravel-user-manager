<x-app-layout>
    <x-splade-modal>
        <x-splade-form action="{{ route('permissions.store') }}">
            <div class="my-2">
                <x-splade-input name="name" label="Permission Name" required/>
            </div>
            <x-splade-select label="Assign To Roles" name="roles[]" :options="$roles" option-label="name"
                             option-value="name" multiple choices/>
            <div class="my-2">
                <x-splade-submit label="Create Permission"/>
            </div>
        </x-splade-form>
    </x-splade-modal>
</x-app-layout>
