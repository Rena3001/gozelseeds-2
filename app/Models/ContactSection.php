<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSection extends Model
{
    protected $fillable = [
        'image_1',
        'image_2',
        'is_active',
    ];

    public function translations()
    {
        return $this->hasMany(
            ContactSectionTranslation::class,
            'contact_section_id',
            'id'
        );
    }

    public function translation()
    {
        return $this->hasOne(
            ContactSectionTranslation::class,
            'contact_section_id',
            'id'
        )->where('locale', app()->getLocale());
    }
}
