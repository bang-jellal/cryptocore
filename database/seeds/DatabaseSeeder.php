<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1. DATA ROLES
        $roles = ['Admin', 'User'];
        foreach ($roles as $role) {
            \App\Models\Role::create(['name' => $role]);
        }


        // 2. DATA USERS
        $admin = \App\Models\User::create([
            'name'           => 'Admin',
            'email'          => 'admin@mail.com',
            'password'       => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(10),
        ]);
        $admin_profile = factory(\App\Models\UserProfile::class)->make();
        $admin->profile()->save($admin_profile);
        $admin->assignRole('Admin');

        $users = factory(\App\Models\User::class)
            ->times(20)
            ->create()
            ->each(function ($user) {
                $profile = factory(\App\Models\UserProfile::class)->make();
                $user->profile()->save($profile);
                $user->assignRole('User');
            });
    }
}
