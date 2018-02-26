<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * @property bool $published
 * @property mixed $brand
 * @property string $price
 * @property mixed $sub_category
 */

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'price', 'description', 'published'
    ];

    protected $casts = [
        'published' => 'boolean',
    ];

    /**
     * @param $value
     * @return string
     */
    public function getPriceAttribute($value)
    {
        return int_to_currency_dollar($value);
    }

    /**
     * @param $value
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = currency_dollar_to_int($value);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('published', true);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }
}
