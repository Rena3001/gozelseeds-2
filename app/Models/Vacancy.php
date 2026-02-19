<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    protected $fillable = [
        'image',
        'salary',
        'deadline',
        'email',
        'is_active',
        'order',
    ];

    protected $casts = [
        'deadline' => 'date',
        'is_active' => 'boolean',
    ];

    public function translations()
    {
        return $this->hasMany(VacancyTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(VacancyTranslation::class)
            ->where('locale', app()->getLocale());
    }
}
