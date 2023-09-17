<?php

namespace App\Http\Controllers {
    use Illuminate\Support\Facades\Redirect;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;

    class ProfileController extends BaseController
    {
        /**
         * Soft-delete a record
         *
         * @return \Illuminate\Http\RedirectResponse
         */
        public function destroy(Request $request)
        {
            $request->validateWithBag('userDeletion', [
                'password' => ['required', 'current-password'],
            ]);

            $user = $request->user();

            Auth::logout();

            $user->delete();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        }
    }
}
