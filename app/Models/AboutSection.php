<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $guarded = [];

    public function translations()
    {
        return $this->hasMany(AboutSectionTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(AboutSectionTranslation::class)
            ->where('locale', app()->getLocale());
    }
    public function listItems()
    {
        return $this->hasMany(AboutListItem::class)
            ->where('is_active', true)
            ->orderBy('order');
    }
}
