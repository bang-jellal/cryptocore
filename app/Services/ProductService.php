<?php

namespace App\Services;

use App\Enums\ImageEnum;
use App\Models\Product;

class ProductService
{
    public function store($request)
    {
        // upload image
        $image_name = time().'.'.request()->image->getClientOriginalExtension();
        $path       = public_path(ImageEnum::PRODUCT_PATH);
        request()->image->move($path, $image_name);

        // store product
        $product        = new Product();
        $product->image = $image_name;
        $product->fill($request->only('name', 'price', 'description', 'published'));
        $product->brand()->associate($request->get('brand_id'));
        $product->subCategory()->associate($request->get('sub_category_id'));
        $product->save();

        return $product;
    }

    /**
     * @param $request
     * @param Product $product
     * @return mixed
     */
    public function update($request, $product)
    {
        $path       = public_path('product_image');
        $old_image  = $path.'/'.$product->image;

        $product->fill($request->only('name', 'price', 'description', 'published'));

        if (request()->get('old_image') == 0 && file_exists($old_image)) {
            @unlink($old_image);
            $image_name = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move($path, $image_name);
            $product->image = $image_name;
        }

        $product->brand()->associate($request->get('brand_id'));
        $product->subCategory()->associate($request->get('sub_category_id'));
        $product->save();

        return $product;
    }
}