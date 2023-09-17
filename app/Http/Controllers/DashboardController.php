<?php

namespace App\Http\Controllers {
    use Illuminate\View\View;

    class DashboardController extends BaseController
    {
        /**
         * @return View
         */
        public function index(): View
        {
            return self::page('dashboard.index');
        }
    }
}
