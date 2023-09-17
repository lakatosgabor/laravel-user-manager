<?php

namespace App\Http\Controllers {
    use App\Http\Helpers\ProfileFeatures;
    use App\Http\Requests;
    use App\Models\User;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Support\Facades\Hash;
    use Illuminate\Support\Str;
    use Illuminate\View\View;
    use ProtoneMedia\Splade\Facades\Toast;
    use Spatie\Permission\Models\Role;

    class UserController extends BaseController
    {
        use ProfileFeatures;

        /**
         * Loads the index view
         *
         * @return View|RedirectResponse
         */
        public function index(): View|RedirectResponse
        {
            return $this->renderIfAuthorized('manage_users', 'users.index', [
                'users' => User::withTrashed()->paginate(env('APP_DEFAULT_PAGINATION'))
            ]);
        }

        /**
         * Loads the create view
         *
         * @return View|RedirectResponse
         */
        public function create(): View|RedirectResponse
        {
            return $this->renderIfAuthorized('create_user', 'users.create', [
                'roles' => Role::all()
            ]);
        }

        /**
         * Loads the edit view
         *
         * @param User $user
         *
         * @return View
         */
        public function edit(User $user): View
        {
            return self::page('users.edit', [
                'roles' => Role::all(),
                'user'  => $user,
            ]);
        }

        /**
         * Store a new record
         *
         * @param Requests\CreateUserRequest $request
         *
         * @return RedirectResponse
         */
        public function store(Requests\CreateUserRequest $request): RedirectResponse
        {
            // validation
            $request->validated();

            // create new user
            $user = User::create([
                'password' => Hash::make($request->password),
                'username' => $request->username,
                'email'    => $request->email,
                'name'     => $request->name,
                'uuid'     => Str::uuid(),
                'image'    => null,
            ]);

            // Handle the user upload of avatar
            $this->uploadProfilePhoto($request, $user);

            // sync roles
            $this->assignUserRoles($request, $user);

            // toast
            Toast::title('User successfully created!')->autoDismiss(5);

            // redirect
            return to_route('users.index');
        }

        /**
         * Update a record
         *
         * @param Requests\UpdateUserRequest $request
         * @param User                       $user
         *
         * @return RedirectResponse
         */
        public function update(Requests\UpdateUserRequest $request, User $user): RedirectResponse
        {
            // validation
            $request->validated();

            // update user
            $user->update([
                'username' => $request->username ?? $user->username,
                'password' => $request->password ?? $user->password,
                'email'    => $request->email ?? $user->email,
                'name'     => $request->name ?? $user->name,
            ]);

            // Handle the user upload of avatar
            $this->uploadProfilePhoto($request, $user);

            // sync roles
            $this->assignUserRoles($request, $user);

            // toast
            Toast::success('Profile Saved Successfully')->autoDismiss(5);

            // redirect
            return to_route('users.index');
        }

        /**
         * Soft-delete a record
         *
         * @param User $user
         *
         * @return RedirectResponse
         */
        public function destroy(User $user): RedirectResponse
        {
            if (auth()->user()->id === $user->id) {
                Toast::title('You cannot delete your own profile.')->autoDismiss(5)->danger();
            } elseif ($user->id === 2) {
                Toast::title('You cannot delete an admin account.')->autoDismiss(5)->danger();
            } else {
                $this->deleteProfilePhoto($user);

                if ($user->delete()) {
                    Toast::title('Ths user was successfully deleted.');
                }
            }

            // redirect
            return to_route('users.index');
        }

        /**
         * Restore a soft-deleted record
         *
         * @param User $user
         *
         * @return RedirectResponse
         */
        public function restore(User $user): RedirectResponse
        {
            $user->restore();

            Toast::title('Ths user was successfully restored')->autoDismiss(5);

            return to_route('users.index');
        }
    }
}
