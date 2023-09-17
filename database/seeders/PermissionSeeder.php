<?php

namespace Database\Seeders {
    use Spatie\Permission\Models\Permission;
    use Illuminate\Database\Seeder;

    class PermissionSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            // --------------------------------------------
            // profile
            Permission::create(['name' => 'manage_profile']);
            Permission::create(['name' => 'delete_profile']);
            Permission::create(['name' => 'update_username']);
            Permission::create(['name' => 'update_password']);
            Permission::create(['name' => 'update_email']);
            Permission::create(['name' => 'update_image']);
            Permission::create(['name' => 'update_name']);

            Permission::create(['name' => 'manage_users']);
            Permission::create(['name' => 'manage_user']);
            Permission::create(['name' => 'create_user']);
            Permission::create(['name' => 'update_user']);
            Permission::create(['name' => 'delete_user']);

            Permission::create(['name' => 'manage_roles']);
            Permission::create(['name' => 'manage_role']);
            Permission::create(['name' => 'create_role']);
            Permission::create(['name' => 'update_role']);
            Permission::create(['name' => 'delete_role']);

            Permission::create(['name' => 'manage_permissions']);
            Permission::create(['name' => 'manage_permission']);
            Permission::create(['name' => 'create_permission']);
            Permission::create(['name' => 'update_permission']);
            Permission::create(['name' => 'delete_permission']);

            // UI / UX
            Permission::create(['name' => 'toggle_dark_mode']);

            // admin wildcard
            Permission::create(['name' => '*']);
        }
    }
}
