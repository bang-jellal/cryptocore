<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Brand extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get the brand's image.
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
     * Get the product for the brand.
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
