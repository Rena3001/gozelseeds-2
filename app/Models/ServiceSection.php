<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    protected $fillable = ['is_active'];

    public function translations()
    {
        return $this->hasMany(ServiceSectionTranslation::class);
    }

    public function translation()
    {
        return $this->hasOne(ServiceSectionTranslation::class)
            ->where('locale', app()->getLocale());
    }

    public function services()
    {
        return $this->hasMany(Service::class);
    }
    
}
