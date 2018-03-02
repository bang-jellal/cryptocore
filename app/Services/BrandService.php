<?php

namespace App\Services;

use App\Enums\ImageEnum;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandService
{
    public $path;

    /**
     * CategoryService constructor.
     */
    public function __construct()
    {
        $this->path = ImageEnum::BRAND_PATH;
    }

    public function store($request)
    {
        // upload image
        $path = $request->file('image')->store($this->path);

        // store category
        $category = new Brand();
        $category->name  = $request->get('name');
        $category->image = $path;
        $category->save();

        return $category;
    }

    /**
     * @param $request
     * @param $brand
     * @return mixed
     */
    public function update($request, $brand)
    {
        if ($request->file('image')) {
            Storage::delete($brand->image);
            $path = $request->file('image')->store($this->path);
            $brand->image = $path;
        }

        $brand->name  = $request->get('name');
        $brand->save();

        return $brand;
    }
}
