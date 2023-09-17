<?php

namespace App\Http\Controllers {
    use App\Http\Requests\CreatePermissionRequest;
    use Spatie\Permission\Models\Permission;
    use ProtoneMedia\Splade\Facades\Toast;
    use Illuminate\Http\RedirectResponse;
    use Spatie\Permission\Models\Role;
    use Illuminate\View\View;

    class PermissionController extends BaseController
    {
        /**
         * Loads the index view
         *
         * @return View|RedirectResponse
         */
        public function index(): View|RedirectResponse
        {
            return $this->renderIfAuthorized('manage_permissions', 'permissions.index', [
                'permissions' => Permission::paginate(env('APP_DEFAULT_PAGINATION'))
            ]);
        }

        /**
         * Loads the create view
         *
         * @return View|RedirectResponse
         */
        public function create(): View|RedirectResponse
        {
            return $this->renderIfAuthorized('create_permission', 'permissions.form', [
                'roles' => Role::all()
            ]);
        }

        /**
         * Store a new record
         *
         * @param CreatePermissionRequest $request
         *
         * @return RedirectResponse
         */
        public function store(CreatePermissionRequest $request): RedirectResponse
        {
            $request->validated();

            $permission = Permission::create([
                'name' => str($request->name)->snake()
            ]);

            $permission->syncRoles($request->roles ?? []);

            Toast::success('Permission successfully created.');

            return to_route('permissions.index');
        }

        /**
         * Soft-delete a record
         *
         * @param Permission $permission
         *
         * @return RedirectResponse
         */
        public function destroy(Permission $permission): RedirectResponse
        {
            $permission->delete();

            Toast::success('Permission successfully deleted.');

            return to_route('permissions.index');
        }
    }
}
