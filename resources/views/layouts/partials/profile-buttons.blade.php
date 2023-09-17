<div class="join">
    @can('delete_profile')
        <div class="">
            <x-splade-form
                method="delete"
                :action="route('profile.destroy')"
                :confirm="__('Are you sure you want to delete your account?')"
                :confirm-text="__('Once your account is deleted, all of its data will be lost. Please enter your password to confirm you would like to permanently delete your account.')"
                :confirm-button="__('Delete Account')"
                require-password
            >
                <button type="submit" class="btn btn-sm btn-error text-white join-item">
                    <span class="pi pi-trash"></span>
                </button>
            </x-splade-form>
        </div>
    @endcan
</div>
