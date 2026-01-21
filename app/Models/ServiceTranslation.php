<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'service_id',
        'locale',
        'title',
        'text',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
