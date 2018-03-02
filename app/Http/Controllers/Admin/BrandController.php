<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Http\Requests\Admin\BrandStoreRequest;
use App\Http\Requests\Admin\BrandUpdateRequest;
use App\Http\Controllers\Controller;
use App\Services\BrandService;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public $brand_service;

    /**
     * ProductController constructor.
     * @param BrandService $brand_service
     */
    public function __construct(BrandService $brand_service)
    {
        $this->brand_service = $brand_service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BrandStoreRequest $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function store(BrandStoreRequest $request)
    {
        $this->brand_service->store($request);

        return redirect()->route('admin.brand.index')->with('alert', [
            'alert'   => 'success',
            'message' => 'Brand Data Successfully Stored!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return redirect()->route('admin.brand.show', $brand);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BrandUpdateRequest $request
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        $this->brand_service->update($request, $brand);

        return redirect()->route('admin.brand.index')->with('alert', [
            'alert'   => 'success',
            'message' => 'Brand Data Successfully Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Brand $brand
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Brand $brand)
    {
        Storage::delete($brand->image);
        $brand->delete();

        return redirect()->route('admin.brand.index')->with('alert', [
            'alert'   => 'success',
            'message' => 'Brand Data Successfully Removed !'
        ]);
    }
}
