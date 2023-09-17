<?php

namespace App\Http\Controllers {
    use ProtoneMedia\Splade\Facades\Toast;
    use Illuminate\Foundation\Auth\Access;
    use Illuminate\Foundation\Validation;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Gate;
    use Illuminate\Routing\Controller;
    use Illuminate\View\View;

    class BaseController extends Controller
    {
        use Validation\ValidatesRequests;
        use Access\AuthorizesRequests;

        /**
         * Render a view, and redirect if a gate condition is not met
         *
         * @param string $can  The gate parameter to check
         * @param string $page The page view to render
         * @param array  $data The data to pass to the view
         * @param string $to   Where to redirect to upon failure
         *
         * @return View|RedirectResponse
         */
        protected function renderIfAuthorized(string $can, string $page, array $data = [], string $to = 'dashboard'): View|RedirectResponse
        {
            if (!Gate::allows($can)) {
                Toast::title('You\'re not allowed to access this resource')->autoDismiss(5)->danger();
                return to_route($to);
            }
            return self::page($page, $data);
        }

        /**
         * Renders a view in views/pages
         *
         * @param string $page
         * @param array  $data
         *
         * @return View
         */
        protected static function page(string $page, array $data = []): View
        {
            return view('pages.' . $page, $data);
        }
    }
}
