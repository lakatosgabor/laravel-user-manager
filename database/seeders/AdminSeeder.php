<?php

namespace Database\Seeders {
    use Spatie\Permission\Models\Role;
    use Illuminate\Database\Seeder;
    use Illuminate\Support\Str;
    use App\Models\User;

    class AdminSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
            // administrator
            $admin = Role::create(['name' => 'admin']);
            $admin->givePermissionTo('*');
            $user = User::factory()->create([
                'password' => bcrypt('password'),
                'username' => 'administrator',
                'email'    => 'admin@example.com',
                'uuid'     => Str::uuid(),
                'name'     => 'admin',
            ]);
            $user->assignRole($admin);
        }
    }
}
