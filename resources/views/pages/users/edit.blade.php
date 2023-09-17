<x-app-layout>
    <x-splade-modal>
        <x-splade-form method="put" action="{{ route('users.update', $user) }}" :default="$user" class="space-y-4">
            <div class="my-2">
                <el-divider>Personal Info</el-divider>
            </div>

            @can('update_name')
                <div class="my-2">
                    <x-splade-input id="name" type="text" name="name" :label="__('Name')" autofocus/>
                </div>
            @endcan

            @can('update_email')
                <div class="my-2">
                    <x-splade-input id="email" type="email" name="email" :label="__('Email')"/>
                </div>
            @endcan

            @can('update_username')
                <div class="my-2">
                    <x-splade-input id="username" type="text" name="username" :label="__('Username')"/>
                </div>
            @endcan

            @can('update_image')
                <div class="my-2">
                    <x-splade-file filepond :label="__('Image')" name="image" id="image" :show-filename="true" preview/>
                </div>
            @endcan

            @can('update_password')
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
            @endcan

            @if(auth()->user()->id !== $user->id)
                <div class="my-2">
                    <el-divider>Authorization</el-divider>
                </div>
                <div class="my-2">
                    <x-splade-select label="Assign Roles" name="roles[]" :options="$roles" option-label="name"
                                     option-value="name" multiple choices/>
                </div>
            @endif

            <div class="my-2">
                <x-splade-submit class="w-full" :label="__('Save')"/>
            </div>
        </x-splade-form>
    </x-splade-modal>
</x-app-layout>
