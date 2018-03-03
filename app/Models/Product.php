<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'published' => 'boolean',
    ];

    /**
     * Get the product's price.
     *
     * @param  string $value
     * @return string
     */
    public function getPriceAttribute($value)
    {
        return int_to_currency_dollar($value);
    }

    /**
     * Get the product's image.
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
     * Set the product's price.
     *
     * @param  string $value
     * @return void
     */
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = currency_dollar_to_int($value);
    }

    /**
     * Scope a query to only include published product.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('published', true);
    }

    /**
     * Get the brand that owns the product.
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    /**
     * Get the sub category that owns the product.
     */
    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    /**
     * Get the product images for the product.
     */
    public function productImages()
    {
        return $this->hasMany(SubCategory::class);
    }
}
