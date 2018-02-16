<?php

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'role:Admin'], function() {

    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::resource('/user', 'UserController');
    Route::resource('/category', 'CategoryController');

    // Sub Category
    Route::get('/category/{category}/sub-category', 'SubCategoryController@index')->name('sub_category.index');
    Route::get('/category/{category}/sub-category/create', 'SubCategoryController@create')->name('sub_category.create');
    Route::post('/category/{category}/sub-category/', 'SubCategoryController@store')->name('sub_category.store');
    Route::get('/category/{category}/sub-category/{sub_category}', 'SubCategoryController@show')->name('sub_category.show');
    Route::get('/category/{category}/sub-category/{sub_category}/edit', 'SubCategoryController@edit')->name('sub_category.edit');
    Route::put('/category/{category}/sub-category/{sub_category}', 'SubCategoryController@update')->name('sub_category.update');
    Route::delete('/category/{category}/sub-category/{sub_category}', 'SubCategoryController@destroy')->name('sub_category.destroy');

    // DataTable
    Route::get('/data-table/user', 'DataTableController@user')->name('data_table.user');
    Route::get('/data-table/category', 'DataTableController@category')->name('data_table.category');
    Route::get('/data-table/category/{category}/sub-category', 'DataTableController@subCategory')->name('data_table.sub_category');

});