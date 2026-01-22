<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// App\Models\Category.php
class Category extends Model
{
    protected $fillable = ['slug'];

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(CategoryTranslation::class)
            ->where('locale', app()->getLocale());
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
