<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;

class DataTableController extends Controller
{
    public function user()
    {
        $users = User::all();
        $data_table = datatables($users)
            ->addColumn('action',
                function ($users) {
                    return button_data_table($users, 'admin.user');
                })
            ->toJson();

        return $data_table;


    }
}
