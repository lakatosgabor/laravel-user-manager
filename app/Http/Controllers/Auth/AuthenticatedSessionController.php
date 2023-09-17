<?php

namespace App\Http\Controllers\Auth {
    use App\Http\Controllers\BaseController;
    use App\Http\Requests\Auth\LoginRequest;
    use ProtoneMedia\Splade\Facades\Toast;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use Illuminate\View\View;

    class AuthenticatedSessionController extends BaseController
    {
        /**
         * Display the login view.
         *
         * @return View
         */
        public function create(): View
        {
            return self::page('auth.login');
        }

        /**
         * Handle an incoming authentication request.
         *
         * @return RedirectResponse
         */
        public function store(LoginRequest $request): RedirectResponse
        {
            $request->authenticate();

            $request->session()->regenerate();

            Toast::title('You\'ve successfully logged in!')->autoDismiss(5);

            return redirect()->route('dashboard');
        }

        /**
         * Destroy an authenticated session.
         *
         * @return RedirectResponse
         */
        public function destroy(Request $request): RedirectResponse
        {
            Auth::guard('web')->logout();

            $request->session()->regenerateToken();

            Toast::title('You\'ve successfully logged out!')->autoDismiss(5);

            return redirect()->route('login');
        }
    }
}
