<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
 
class VideoSectionTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'video_section_id',
        'locale',
        'title',
        'button_url',
        'video_url',
        'video_title',
    ];

    public function videoSection()
    {
        return $this->belongsTo(VideoSection::class);
    }
}
