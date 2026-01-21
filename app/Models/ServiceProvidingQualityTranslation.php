<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceProvidingQualityTranslation extends Model
{
    protected $table = 'service_providing_translations';

    public $timestamps = false;

    protected $fillable = [
        'service_providing_id','locale','tagline','title'
    ];
}

