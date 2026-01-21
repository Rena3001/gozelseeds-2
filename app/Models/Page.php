<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'slug',
        'header_bg',
        'image_main',
        'image_icon',
        'is_active',
    ];

    public function translations()
    {
        return $this->hasMany(PageTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(PageTranslation::class)
            ->where('locale', app()->getLocale());
    }
}
