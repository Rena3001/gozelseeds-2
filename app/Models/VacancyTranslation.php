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

    
        protected static function boot()
    {
        parent::boot();

        static::saving(function ($translation) {

            if (!$translation->slug && $translation->title) {

                $baseSlug = Str::slug($translation->title);
                $slug = $baseSlug;
                $i = 1;

                while (
                    self::where('slug', $slug)
                        ->where('locale', $translation->locale)
                        ->where('id', '!=', $translation->id)
                        ->exists()
                ) {
                    $slug = $baseSlug . '-' . $i;
                    $i++;
                }

                $translation->slug = $slug;
            }
        });
    }

}
