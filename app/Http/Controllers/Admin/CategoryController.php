<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Http\Requests\Admin\CategoryUpdateRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public $category_service;

    /**
     * ProductController constructor.
     * @param CategoryService $category_service
     */
    public function __construct(CategoryService $category_service)
    {
        $this->category_service = $category_service;
    }

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
        $this->category_service->store($request);

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
        return redirect()->route('admin.sub_category.index', $category);
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
        $this->category_service->update($request, $category);

        return redirect()->route('admin.category.index')->with('alert', [
            'alert'   => 'success',
            'message' => 'Category Data Successfully Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Category $category)
    {
        Storage::delete($category->image);
        $category->delete();

        return redirect()->route('admin.category.index')->with('alert', [
            'alert'   => 'success',
            'message' => 'Category Data Successfully Removed !'
        ]);
    }
}
