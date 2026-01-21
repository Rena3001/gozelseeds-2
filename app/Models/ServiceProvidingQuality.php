<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\ServiceProvidingQualityTranslation; // ✅ ADD THIS
use App\Models\ServiceProvidingQualityItem;

class ServiceProvidingQuality extends Model
{
    protected $fillable = [
        'bg_image','main_image','logo_image','is_active','order'
    ];

    public function translations()
    {
        return $this->hasMany(
            ServiceProvidingQualityTranslation::class,
            'service_providing_id'
        );
    }

    public function translation()
    {
        return $this->hasOne(
            ServiceProvidingQualityTranslation::class,
            'service_providing_id'
        )->where('locale', app()->getLocale());
    }

    public function items()
    {
        return $this->hasMany(
            ServiceProvidingQualityItem::class,
            'service_providing_quality_id'
        )->orderBy('order');
    }
}
