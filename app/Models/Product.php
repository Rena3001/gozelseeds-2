<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// App\Models\Product.php
class Product extends Model
{
    protected $fillable = ['slug', 'image', 'is_active'];

    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(ProductTranslation::class)
            ->where('locale', app()->getLocale());
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}

