<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the product that owns the sub category.
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
