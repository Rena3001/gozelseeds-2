<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $guarded = [];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function translations()
    {
        return $this->hasMany(FeatureTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(FeatureTranslation::class)
            ->where('locale', app()->getLocale());
    }
}
