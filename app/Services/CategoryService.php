<?php

namespace App\Services;

use App\Enums\ImageEnum;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    public $path;

    /**
     * CategoryService constructor.
     */
    public function __construct()
    {
        $this->path = ImageEnum::CATEGORY_PATH;
    }

    public function store($request)
    {
        // upload image
        $path = $request->file('image')->store($this->path);

        // store category
        $category = new Category();
        $category->name  = $request->get('name');
        $category->image = $path;
        $category->save();

        return $category;
    }

    /**
     * @param $request
     * @param Category $category
     * @return mixed
     */
    public function update($request, $category)
    {
        Storage::delete($category->image);
        $path = $request->file('image')->store($this->path);

        $category->image = $path;
        $category->name  = $request->get('name');
        $category->save();

        return $category;
    }
}