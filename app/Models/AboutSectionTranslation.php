<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSectionTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'about_section_id',
        'locale',
        'tagline',
        'title',
        'subtitle',
        'text',
        'counter_text',
        'video_title',
        'video_text',
    ];

    public function aboutSection()
    {
        return $this->belongsTo(AboutSection::class);
    }
}

