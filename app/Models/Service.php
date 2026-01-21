<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'image',
        'icon',
        'link',
        'order',
        'is_active',
    ];

    public function translations()
    {
        return $this->hasMany(ServiceTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(ServiceTranslation::class)
            ->where('locale', app()->getLocale());
    }
}
