<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryTranslation;
use App\Models\Product;

class Category extends Model
{
    protected $fillable = [
        'slug',
        'parent_id',
    ];

    /* ================= RELATIONS ================= */

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

    // Aktiv locale üçün
    public function translation()
    {
        return $this->hasOne(CategoryTranslation::class)
            ->where('locale', app()->getLocale());
    }

    // Bütün dillər
   public function translations()
{
    return $this->hasMany(CategoryTranslation::class);
}

public function getNovaTitleAttribute()
{
    return $this->translations
        ->firstWhere('locale', app()->getLocale())
        ?->title
        ?? $this->translations->first()?->title
        ?? $this->slug;
}
   public static function uriKey()
    {
        return 'categories';
    }



    /* ================= AUTO SAVE TRANSLATIONS ================= */

  protected static function booted()
    {
        static::saved(function ($category) {

            $data = [
                'az' => request('title_az'),
                'en' => request('title_en'),
                'ru' => request('title_ru'),
            ];

            foreach ($data as $locale => $title) {
                if ($title) {
                    CategoryTranslation::updateOrCreate(
                        [
                            'category_id' => $category->id,
                            'locale' => $locale,
                        ],
                        [
                            'title' => $title,
                        ]
                    );
                }
            }
        });
    }
}
