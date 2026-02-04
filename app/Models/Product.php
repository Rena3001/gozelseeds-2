<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ProductTranslation;
use App\Models\Category;

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

    /* ================= NOVA TITLE ================= */

    public function getNovaTitleAttribute()
    {
        return $this->translations()
            ->where('locale', app()->getLocale())
            ->value('title')
            ?? $this->slug;
    }

    /* ================= AUTO SAVE TRANSLATIONS ================= */

    protected static function booted()
    {
        static::saved(function (Product $product) {

            // Nova / HTTP yoxdursa çıx
            if (!request()) {
                return;
            }

            $data = [
                'az' => [
                    'title' => request()->input('title_az'),
                    'short_description' => request()->input('short_description_az'),
                    'description' => request()->input('description_az'),
                ],
                'en' => [
                    'title' => request()->input('title_en'),
                    'short_description' => request()->input('short_description_en'),
                    'description' => request()->input('description_en'),
                ],
                'ru' => [
                    'title' => request()->input('title_ru'),
                    'short_description' => request()->input('short_description_ru'),
                    'description' => request()->input('description_ru'),
                ],
            ];

            foreach ($data as $locale => $fields) {
                if (!empty($fields['title'])) {
                    ProductTranslation::updateOrCreate(
                        [
                            'product_id' => $product->id,
                            'locale' => $locale,
                        ],
                        $fields
                    );
                }
            }
        });
    }
}
