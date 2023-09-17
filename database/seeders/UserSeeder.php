<?php

namespace Database\Seeders {
    use Spatie\Permission\Models\Role;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Str;
    use App\Models\User;

    class UserSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            // member
            $member = Role::create(['name' => 'member']);
            $member->givePermissionTo('toggle_dark_mode');
            $member->givePermissionTo('manage_profile');
            $member->givePermissionTo('delete_profile');
            $member->givePermissionTo('update_username');
            $member->givePermissionTo('update_password');
            $member->givePermissionTo('update_email');
            $member->givePermissionTo('update_image');
            $member->givePermissionTo('update_name');


            // manager
            $manager = Role::create(['name' => 'manager']);
            $manager->givePermissionTo('toggle_dark_mode');
            $manager->givePermissionTo('manage_users');
            $manager->givePermissionTo('manage_user');
            $manager->givePermissionTo('create_user');
            $manager->givePermissionTo('update_user');
            $manager->givePermissionTo('delete_user');

            $manager->givePermissionTo('manage_profile');
            $manager->givePermissionTo('delete_profile');
            $manager->givePermissionTo('update_username');
            $manager->givePermissionTo('update_password');
            $manager->givePermissionTo('update_email');
            $manager->givePermissionTo('update_image');
            $manager->givePermissionTo('update_name');

            $manager->givePermissionTo('manage_roles');
            $manager->givePermissionTo('manage_role');
            $manager->givePermissionTo('create_role');
            $manager->givePermissionTo('update_role');
            $manager->givePermissionTo('delete_role');

            $manager->givePermissionTo('manage_permissions');
            $manager->givePermissionTo('manage_permission');
            $manager->givePermissionTo('create_permission');
            $manager->givePermissionTo('update_permission');
            $manager->givePermissionTo('delete_permission');

            // create user
            $user = User::factory()->create([
                'password' => bcrypt('password'),
                'username' => fake()->username(),
                'email'    => 'manager@example.com',
                'uuid'     => Str::uuid(),
                'name'     => fake()->name(),
            ]);
            $user->assignRole($manager);
        }
    }
}
