<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SettingTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'setting_id',
        'locale',
        'address',
    ];

    public function setting()
    {
        return $this->belongsTo(
            Setting::class,
            'setting_id',
            'id'
        );
    }
}
