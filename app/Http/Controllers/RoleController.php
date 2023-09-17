<?php

namespace App\Http\Controllers {
    use App\Http\Requests\CreateRoleRequest;
    use Spatie\Permission\Models\Permission;
    use ProtoneMedia\Splade\Facades\Toast;
    use Illuminate\Http\RedirectResponse;
    use Spatie\Permission\Models\Role;
    use Illuminate\View\View;

    class RoleController extends BaseController
    {
        /**
         * Loads the index view
         *
         * @return View|RedirectResponse
         */
        public function index(): View|RedirectResponse
        {
            return $this->renderIfAuthorized('manage_roles', 'roles.index', [
                'roles' => Role::paginate(env('APP_DEFAULT_PAGINATION'))
            ]);
        }

        /**
         * Loads the create view
         *
         * @return View|RedirectResponse
         */
        public function create(): View|RedirectResponse
        {
            return $this->renderIfAuthorized('create_role', 'roles.form', [
                'permissions' => Permission::all()
            ]);
        }

        /**
         * Store a new record
         *
         * @param CreateRoleRequest $request
         *
         * @return RedirectResponse
         */
        public function store(CreateRoleRequest $request): RedirectResponse
        {
            $request->validated();

            $role = Role::create([
                'name' => str($request['name'])->snake()->singular()
            ]);

            $role->syncPermissions($request->permissions ?? []);

            Toast::success('Role successfully created.');

            return to_route('roles.index');
        }

        /**
         * Soft-delete a record
         *
         * @param Role $role
         *
         * @return RedirectResponse
         */
        public function destroy(Role $role): RedirectResponse
        {
            $role->delete();

            Toast::success('Role successfully deleted.');

            return to_route('roles.index');
        }
    }
}
