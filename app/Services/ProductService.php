<?php

namespace App\Services;

use App\Enums\ImageEnum;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public $path;

    /**
     * ProductService constructor.
     */
    public function __construct()
    {
        $this->path = ImageEnum::PRODUCT_PATH;
    }

    /**
     * @param $request
     * @return Product
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function store($request)
    {
        // upload image
        $path = $request->file('image')->store($this->path);

        // store product
        $product        = new Product();
        $product->image = $path;
        $product->fill($request->only('name', 'price', 'description', 'published'));
        $product->brand()->associate($request->get('brand_id'));
        $product->subCategory()->associate($request->get('sub_category_id'));
        $product->save();

        return $product;
    }

    /**
     * @param $request
     * @param Product $product
     * @return Product
     * @throws \Illuminate\Database\Eloquent\MassAssignmentException
     */
    public function update($request, $product)
    {
        if ($request->file('image')) {
            Storage::delete($product->image);
            $path = $request->file('image')->store($this->path);
            $product->image = $path;
        }

        $product->fill($request->only('name', 'price', 'description', 'published'));
        $product->brand()->associate($request->get('brand_id'));
        $product->subCategory()->associate($request->get('sub_category_id'));
        $product->save();

        return $product;
    }
}
