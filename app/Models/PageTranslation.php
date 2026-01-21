<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'page_id',
        'locale',


        'tagline',
        'content_title',
        'subtitle',
        'description',
        'feature_1_title',
        'feature_1_text',
        'feature_2_title',
        'feature_2_text',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
