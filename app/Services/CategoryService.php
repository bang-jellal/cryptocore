<?php

namespace App\Services;

use App\Enums\ImageEnum;
use App\Models\Category;

class CategoryService
{
    public $path;

    /**
     * CategoryService constructor.
     */
    public function __construct()
    {
        $this->path = public_path(ImageEnum::CATEGORY_PATH);
    }

    public function store($request)
    {
        // upload image
        $image_name = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move($this->path, $image_name);

        // store category
        $category = new Category();
        $category->name  = $request->get('name');
        $category->image = $image_name;
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
        $old_image  = $this->path.'/'.$category->image;

        $category->name  = $request->get('name');

        if (request()->get('old_image') == 0 && file_exists($old_image)) {
            @unlink($old_image);
            $image_name = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move($this->path, $image_name);
            $category->image = $image_name;
        } elseif (is_null($category->image)) {
            $image_name = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move($this->path, $image_name);
            $category->image = $image_name;
        }

        $category->save();

        return $category;
    }
}