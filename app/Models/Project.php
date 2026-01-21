<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'image',
        'category',
        'is_active',
        'order',
    ];

    public function translations()
    {
        return $this->hasMany(ProjectTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(ProjectTranslation::class)
            ->where('locale', app()->getLocale());
    }
}
