<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $sub_category
 */

class Category extends Model
{
    protected $fillable = ['name'];

    public function subCategory()
    {
        return $this->hasMany(SubCategory::class);
    }
}
