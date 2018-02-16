<?php

if (! function_exists('button_data_table')) {
    function button_data_table($data, $url)
    {
        $show    = '<form action="'.route($url.'.destroy', $data).'" method="POST">
                    <a href="'.route($url.'.show',   $data).'" class="btn btn-xs btn-info">
                    <i class="glyphicon glyphicon-eye-open"></i> Show</a>';
        $edit    = '<a href="'.route($url.'.edit',   $data).'" class="btn btn-xs btn-primary">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>';
        $delete  = ''. method_field('DELETE'). csrf_field().'
                    <button type="submit" class="btn btn-xs btn-danger" 
                    onclick="return confirm(\'Are you sure you want to delete this item?\');">
                    <i class="glyphicon glyphicon-trash"></i> Delete</button></form>';

        $buttons = $show.'&ensp;'.$edit.'&ensp;'.$delete;

        return $buttons;
    }
}

if (! function_exists('user_data_table_role')) {
    function user_data_table_role($data)
    {
        $role = '';

        if ($data->hasRole('Admin')) {
            $role .= '<span class="label label-success">Admin</span>&ensp;';
        }

        if ($data->hasRole('User')) {
            $role .= '<span class="label label-warning">User</span>';
        }

        return $role;
    }
}
