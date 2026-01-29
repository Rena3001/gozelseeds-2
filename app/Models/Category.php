<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// App\Models\Category.php
class Category extends Model
{
    protected $fillable = ['slug','title'];

    public function translations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }

   public function translation()
{
    return $this->hasOne(CategoryTranslation::class);
}

// Frontend üçün ayrıca
public function translationByLocale($locale = null)
{
    $locale = $locale ?? app()->getLocale();

    return $this->hasOne(CategoryTranslation::class)
        ->where('locale', $locale);
}

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
