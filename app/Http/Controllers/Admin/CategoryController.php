<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function store(CategoryStoreRequest $request)
    {
        $category = new Category();
        $category->fill($request->except(['_token']));
        $category->save();

        return redirect()->route('admin.category.index')->with('alert', [
            'alert'   => 'success',
            'message' => 'Category Data Successfully Stored!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CategoryUpdateRequest $request
     * @param  Category $category
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $category->fill($request->except('_token', '_method'));
        $category->save();

        return redirect()->route('admin.category.index')->with('alert', [
            'alert'   => 'success',
            'message' => 'Category Data Successfully Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('admin.category.index')->with('alert', [
            'alert'   => 'success',
            'message' => 'Category Data Successfully Removed !'
        ]);
    }
}
