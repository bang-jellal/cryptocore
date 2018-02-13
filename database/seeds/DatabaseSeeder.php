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
