<?php

namespace App\Http\Helpers {
    use App\Models\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Storage;

    trait ProfileFeatures
    {
        /**
         * Upload a profile image
         *
         * @param Request $request
         * @param User    $user
         *
         * @return void
         */
        public function uploadProfilePhoto(Request $request, User $user): void
        {
            // Handle the user upload of avatar
            if ($request->hasFile('image')) {
                $avatar = $request->file('image');
                $filename = $user->uuid . '.' . $avatar->getClientOriginalExtension();
                $path = 'storage/images/avatars';

                $request->image->move(public_path($path), $filename);
                $user->image = '/' . $path . '/' . $filename;
                $user->save();
            }
        }

        /**
         * Delete a profile image
         *
         * @param User $user
         * @param bool $reset
         *
         * @return void
         */
        public function deleteProfilePhoto(User $user, bool $reset = true): void
        {
            $file = public_path($user->image);
            if (Storage::exists($file)) {
                if ($reset) {
                    $user->image = null;
                }
                Storage::delete($file);
            }
        }

        /**
         * Assign a users roles
         *
         * @param Request $request
         * @param User    $user
         *
         * @return void
         */
        public function assignUserRoles(Request $request, User $user): void
        {
            $user->syncRoles($request->roles ?? $user->roles ?? ['member']);
        }
    }
}
