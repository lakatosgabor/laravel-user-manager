<?php

namespace App\View\Components {
    use Illuminate\Contracts\View\View;
    use Illuminate\View\Component;

    class ProfileImage extends Component
    {
        /**
         * Create a new component instance.
         */
        public function __construct(
            public string $h = '12',
            public string $w = '12',
            public string $t = '3',
        ) {
        }

        /**
         * Get the view / contents that represent the component.
         */
        public function render(): View
        {
            return view('components.profile-image');
        }
    }
}
