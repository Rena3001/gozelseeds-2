<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// App\Models\Category.php
class Category extends Model
{
    protected $fillable = ['slug', 'parent_id'];

    // Subkateqoriyalar
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Əsas kateqoriya
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function translation()
    {
        return $this->hasOne(CategoryTranslation::class)
            ->where('locale', app()->getLocale());
    }
    public function translations()
{
    return $this->hasMany(CategoryTranslation::class);
}
    public function getNovaTitleAttribute()
{
    return $this->translations()
        ->where('locale', app()->getLocale())
        ->value('title')
        ?? $this->translations()->value('title')
        ?? 'No title';
}

}

