<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutListItem extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'about_section_id',
        'locale',
        'text',
        'order',
        'is_active',
    ];

    public function aboutSection()
    {
        return $this->belongsTo(AboutSection::class);
    }
}