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
            'password'       => 'secret',
            'remember_token' => str_random(10),
        ]);
        $admin_profile = factory(\App\Models\UserProfile::class)->make();
        $admin->profile()->save($admin_profile);
        $admin->assignRole('Admin');

        $users = factory(\App\Models\User::class)
            ->times(5)
            ->create()
            ->each(function ($user) {
                $profile = factory(\App\Models\UserProfile::class)->make();
                $user->profile()->save($profile);
                $user->assignRole('User');
            });

        // 3. DATA BRAND
        $brands = factory(\App\Models\Brand::class)->times(5)->create();

        // 4. DATA CATEGORIES
        $categories = factory(\App\Models\Category::class)->times(6)->create();

        // 5. SUB CATEGORIES
        $sub_categories = factory(\App\Models\SubCategory::class)->times(10)->make();
        $sub_categories->each(function($sub_categories) use ($categories) {
            $category = $categories->random();
            $sub_categories->category()->associate($category);
            $sub_categories->save();
        });

        $product = factory(\App\Models\Product::class)->times(100)->make();
        $product->each(function($product) use ($brands, $sub_categories) {
            $brand        = $brands->random();
            $sub_category = $sub_categories->random();
            $product->brand()->associate($brand);
            $product->subCategory()->associate($sub_category);
            $product->save();
        });
    }
}
