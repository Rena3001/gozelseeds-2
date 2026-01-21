<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'working_hours',
        'logo_dark',
        'logo_light',
        'facebook',
        'instagram',
        'twitter',
        'youtube',
        'copyright_link',
    ];
    public function translations()
    {
        return $this->hasMany(
            SettingTranslation::class,
            'setting_id',
            'id'
        );
    }

    public function translation()
    {
        return $this->hasOne(
            SettingTranslation::class,
            'setting_id',
            'id'
        )->where('locale', app()->getLocale());
    }
}
