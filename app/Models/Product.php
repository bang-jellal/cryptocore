<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property bool $published
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

    public function getPriceAttribute($value)
    {
        return int_to_currency_dollar($value);
    }

    public function settPriceAttribute($value)
    {
        $this->attributes['price'] = currency_dollar_to_int($value);
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
