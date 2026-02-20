<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class VacancyTranslation extends Model
{
    protected $fillable = [
        'vacancy_id',
        'locale',
        'title',
        'description',
        'requirements',
        'location',
        'category',
        'slug',
        'employment_type',
    ];

    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }

    
 

}
