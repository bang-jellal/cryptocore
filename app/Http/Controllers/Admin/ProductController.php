<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\admin\ProductStoreRequest;
use App\Http\Requests\admin\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Product;
use App\Models\SubCategory;
use App\Services\ProductService;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public $product_service;

    /**
     * ProductController constructor.
     * @param ProductService $product_service
     */
    public function __construct(ProductService $product_service)
    {
        $this->product_service = $product_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands         = Brand::pluck('name', 'id');
        $sub_categories = SubCategory::pluck('name', 'id');


        return view('admin.product.create', compact('brands', 'sub_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        $this->product_service->store($request);

        return redirect()->route('admin.product.index')->with('alert', [
            'alert'   => 'success',
            'message' => 'Product Data Successfully Stored!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return redirect()->route('admin.product.show', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands         = Brand::pluck('name', 'id');
        $sub_categories = SubCategory::pluck('name', 'id');

        return view('admin.product.edit', compact('product', 'brands', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $this->product_service->update($request, $product);

        return redirect()->route('admin.product.index')->with('alert', [
            'alert'   => 'success',
            'message' => 'Product Data Successfully Updated!'
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
        Product::findOrFail($id)->delete();

        return redirect()->route('admin.product.index')->with('alert', [
            'alert'   => 'success',
            'message' => 'Product Data Successfully Removed !'
        ]);
    }
}
