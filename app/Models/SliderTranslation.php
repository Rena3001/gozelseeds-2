<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'slider_id',
        'locale',
        'tagline',
        'title',
        'text',
    ];
     public function slider()
    {
        return $this->belongsTo(Slider::class);
    }
}
