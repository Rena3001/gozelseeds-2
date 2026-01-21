<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoSection extends Model
{
    protected $fillable = [
        'background_image',
        'button_url',
        'video_url',
        'is_active',
    ];

    /**
     * All translations
     */
    public function translations()
    {
        return $this->hasMany(VideoSectionTranslation::class);
    }

    /**
     * Current locale translation
     */
    public function translation()
    {
        return $this->hasOne(VideoSectionTranslation::class)
            ->where('locale', app()->getLocale());
    }
}
