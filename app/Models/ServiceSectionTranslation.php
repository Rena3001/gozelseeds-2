<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSectionTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'service_section_id',
        'locale',
        'tagline',
        'title',
    ];

    public function section()
    {
        return $this->belongsTo(ServiceSection::class, 'service_section_id');
    }
}
