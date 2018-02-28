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

    protected $casts = [
        'published' => 'boolean',
    ];

    /**
     * Get the product price attribute.
     *
     * @return string
     */
    public function getPriceAttribute($value)
    {
        return int_to_currency_dollar($value);
    }

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

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = currency_dollar_to_int($value);
    }

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
