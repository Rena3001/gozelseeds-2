<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceProvidingQualityItem extends Model
{
    protected $fillable = [
        'service_providing_quality_id',
        'icon_class',
        'is_active',
        'order',
    ];

    /**
     * 🔗 Parent section
     */
    public function serviceProvidingQuality()
    {
        return $this->belongsTo(
            ServiceProvidingQuality::class,
            'service_providing_quality_id'
        );
    }

    /**
     * 🌍 All translations
     */
    public function translations()
    {
        return $this->hasMany(
            ServiceProvidingQualityItemTranslation::class,
            'service_providing_quality_item_id'
        );
    }

    /**
     * 🌐 Current locale translation
     */
    public function translation()
    {
        return $this->hasOne(
            ServiceProvidingQualityItemTranslation::class,
            'service_providing_quality_item_id'
        )->where('locale', app()->getLocale());
    }
}
