<?php

namespace App\Models;

use App\Models\SliderTranslation;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'image',
        'button_url',
        'order',
        'is_active',
    ];

    public function translations()
    {
        return $this->hasMany(SliderTranslation::class);
    }
public function translation()
{
    return $this->hasOne(SliderTranslation::class, 'slider_id')
        ->where('locale', app()->getLocale());
}

}

