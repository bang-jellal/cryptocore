<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\SubCategoryStoreRequest;
use App\Http\Requests\Admin\SubCategoryUpdateRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        return view('admin.category.sub_category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function create(Category $category)
    {
        return view('admin.category.sub_category.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Category $category
     * @param  SubCategoryStoreRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function store(Category $category, SubCategoryStoreRequest $request)
    {
        $sub_category = new SubCategory();
        $sub_category->fill($request->except(['_token']));
        $sub_category->category()->associate($category);
        $sub_category->save();

        return redirect()->route('admin.sub_category.index', $category)->with('alert', [
            'alert'   => 'success',
            'message' => 'Sub Category Data Successfully Stored!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Category  $category
     * @param  SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, SubCategory $sub_category)
    {
        return view('admin.category.sub_category.show', compact('category', 'sub_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Category  $category
     * @param  SubCategory  $sub_category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, SubCategory $sub_category)
    {
        return view('admin.category.sub_category.edit', compact('category', 'sub_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Category $category
     * @param  SubCategoryUpdateRequest $request
     * @param  SubCategory $sub_category
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(Category $category, SubCategoryUpdateRequest $request, SubCategory $sub_category)
    {
        $sub_category->fill($request->except(['_token']));
        $sub_category->category()->associate($category);
        $sub_category->save();

        return redirect()->route('admin.sub_category.index', $category)->with('alert', [
            'alert'   => 'success',
            'message' => 'Sub Category Data Successfully Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Category $category
     * @param  SubCategory $sub_category
     * @throws \Exception
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, SubCategory $sub_category)
    {
        $sub_category->delete();

        return redirect()->route('admin.sub_category.index', $category)->with('alert', [
            'alert'   => 'success',
            'message' => 'Category Data Successfully Removed !'
        ]);
    }
}
