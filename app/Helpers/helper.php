<?php

if (! function_exists('button_data_table')) {
    function button_data_table($data, $url)
    {
        $edit    = '<form action="'.route($url.'.destroy', $data).'" method="POST">
                    <a href="'.route($url.'.edit',   $data).'" class="btn btn-xs btn-primary">
                    <i class="glyphicon glyphicon-edit"></i> Edit</a>';
        $delete  = ''. method_field('DELETE'). csrf_field().'
                    <button type="submit" class="btn btn-xs btn-danger" 
                    onclick="return confirm(\'Are you sure you want to delete this item?\');">
                    <i class="glyphicon glyphicon-trash"></i> Delete</button></form>';

        $buttons = $edit.'&ensp;'.$delete;

        return $buttons;
    }
}
