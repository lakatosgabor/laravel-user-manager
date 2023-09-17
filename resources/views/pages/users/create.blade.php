<x-app-layout>
    <x-splade-modal>
        <x-splade-form method="post" action="{{ route('users.store') }}" class="space-y-4">
            <div class="my-2">
                <el-divider>Personal Info</el-divider>
            </div>
            <div class="my-2">
                <x-splade-input id="name" type="text" name="name" :label="__('Name')" autofocus/>
            </div>
            <div class="my-2">
                <x-splade-input id="email" type="email" name="email" :label="__('Email')"/>
            </div>
            <div class="my-2">
                <x-splade-input id="username" type="text" name="username" :label="__('Username')"/>
            </div>
            <div class="my-2">
                <x-splade-file filepond :label="__('Image')" name="image" id="image" :show-filename="true" preview/>
            </div>
            <div class="my-2">
                <el-divider>Password</el-divider>
            </div>
            <div class="my-2">
                <x-splade-input id="password" type="password" name="password" :label="__('Password')"
                                autocomplete="new-password"/>
            </div>
            <div class="my-2">
                <x-splade-input id="password_confirmation" type="password" name="password_confirmation"
                                :label="__('Confirm Password')"/>
            </div>

            <div class="my-2">
                <el-divider>Authorization</el-divider>
            </div>
            <div class="my-2">
                <x-splade-select label="Assign Roles" name="roles[]" :options="$roles" option-label="name"
                                 option-value="name" multiple choices/>
            </div>
            <div class="my-2">
                <div class="flex items-center justify-end">
                    <x-splade-submit class="ml-4" :label="__('Save')"/>
                </div>
            </div>
        </x-splade-form>
    </x-splade-modal>
</x-app-layout>
