<?php

if (! function_exists('button_data_table')) {
    function button_data_table($data, $url)
    {
        $show    = '<form action="'.route($url.'.destroy', $data).'" method="POST">
                    <a href="'.route($url.'.show', $data).'" class="btn btn-xs btn-success">
                    <i class="glyphicon glyphicon-eye-open"></i> Show</a>';
        $edit    = '<a href="'.route($url.'.edit', $data).'" class="btn btn-xs btn-primary">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>';
        $delete  = ''. method_field('DELETE'). csrf_field().'
                    <button type="submit" class="btn btn-xs btn-danger" 
                    onclick="return confirm(\'Are you sure you want to delete this item ? \');">
                    <i class="glyphicon glyphicon-trash"></i> Delete</button></form>';

        $buttons = $show.'&ensp;'.$edit.'&ensp;'.$delete;

        return $buttons;
    }
}

if (! function_exists('button_data_table_sub')) {
    function button_data_table_sub($sub_data, $data, $url)
    {
        $show    = '<form action="'.route($url.'.destroy', [$sub_data, $data]).'" method="POST">
                    <a href="'.route($url.'.show', [$sub_data, $data]).'" class="btn btn-xs btn-success">
                    <i class="glyphicon glyphicon-eye-open"></i> Show</a>';
        $edit    = '<a href="'.route($url.'.edit', [$sub_data, $data]).'" class="btn btn-xs btn-primary">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>';
        $delete  = ''. method_field('DELETE'). csrf_field().'
                    <button type="submit" class="btn btn-xs btn-danger" 
                    onclick="return confirm(\'Are you sure you want to delete this item ? \');">
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

if (! function_exists('int_to_currency_dollar')) {
    function int_to_currency_dollar($attribute)
    {
        $formatted = "$ " . number_format(sprintf('%0.2f', preg_replace("/[^0-9.]/", "", $attribute)), 2);
        return $attribute < 0 ? "({$formatted})" : "{$formatted}";
    }
}

if (! function_exists('currency_dollar_to_int')) {
    function currency_dollar_to_int($attribute)
    {
        return (int)preg_replace("/([^0-9\\.])/i", "", $attribute);
    }
}
