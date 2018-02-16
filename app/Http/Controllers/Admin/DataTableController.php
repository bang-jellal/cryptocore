<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\User;
use App\Http\Controllers\Controller;

class DataTableController extends Controller
{
    public function user()
    {
        $users = User::all();
        $data_table = datatables($users)
            ->addColumn('role',
                function ($users) {
                    return user_data_table_role($users);
                })
            ->addColumn('action',
                function ($users) {
                    return button_data_table($users, 'admin.user');
                })
            ->rawColumns(['role', 'action'])
            ->toJson();

        return $data_table;
    }

    public function category()
    {
        $categories = Category::all();
        $data_table = datatables($categories)
            ->addColumn('action',
                function ($categories) {
                    return button_data_table($categories, 'admin.category');
                })
            ->toJson();

        return $data_table;
    }
}
