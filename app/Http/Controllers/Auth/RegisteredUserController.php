<?php

namespace App\Http\Controllers\Auth {
    use App\Http\Controllers\BaseController;
    use App\Http\Requests\CreateUserRequest;
    use ProtoneMedia\Splade\Facades\Toast;
    use App\Http\Helpers\ProfileFeatures;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;
    use Illuminate\View\View;
    use App\Models\User;

    class RegisteredUserController extends BaseController
    {
        use ProfileFeatures;

        /**
         * Display the registration view.
         *
         * @return View
         */
        public function create(): View
        {
            return self::page('auth.register');
        }

        /**
         * Handle an incoming registration request.
         *
         * @param CreateUserRequest $request
         *
         * @return RedirectResponse
         */
        public function store(CreateUserRequest $request): RedirectResponse
        {
            $request->validated();

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'username' => $request->username,
                'uuid'     => Str::uuid(),
                'image'    => null,
                'password' => Hash::make($request->password),
            ]);

            $user->assignRole('member');

            // Handle the user upload of avatar
            $this->uploadProfilePhoto($request, $user);

            Auth::login($user);

            Toast::title('You\'ve successfully registered!')->autoDismiss(5);

            return redirect()->route('dashboard');
        }
    }
}
