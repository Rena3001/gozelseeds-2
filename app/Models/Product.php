<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'slug',
        'image',
        'is_active',
    ];

    /* ================= RELATIONS ================= */

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function translations()
    {
        return $this->hasMany(ProductTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(ProductTranslation::class)
            ->where('locale', app()->getLocale());
    }

    /* ================= NOVA TITLE ================= */

    public function getNovaTitleAttribute()
    {
        return optional(
            $this->translations
                ->where('locale', app()->getLocale())
                ->first()
        )->title ?? $this->slug;
    }

    /* ================= AUTO SAVE TRANSLATIONS ================= */

    protected static function booted()
    {
        static::saved(function (Product $product) {

            if (!request()) return;

            $locales = ['az', 'en', 'ru'];

            foreach ($locales as $locale) {

                $title = request()->input("title_$locale");

                if (!$title) continue;

                $product->translations()->updateOrCreate(
                    ['locale' => $locale],
                    [
                        'title' => $title,
                        'short_description' => request()->input("short_description_$locale"),
                        'description' => request()->input("description_$locale"),
                    ]
                );
            }
        });
    }
}
