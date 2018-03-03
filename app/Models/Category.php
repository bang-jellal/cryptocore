<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the product image attribute.
     *
     * @return string
     */
    public function getImageUrlAttribute()
    {
        $exists = Storage::disk('local')->exists($this->attributes['image']);

        if ($exists) {
            return Storage::url($this->attributes['image']);
        }

        return asset('template/fashe/images/banner-05.jpg');
    }

    /**
     * Get the sub category for the category.
     */
    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }

    /**
     * Get all of the product for the category.
     */
    public function product()
    {
        return $this->hasManyThrough(Product::class, SubCategory::class);
    }
}
