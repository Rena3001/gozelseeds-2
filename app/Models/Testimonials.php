<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    public function translations()
    {
        return $this->hasMany(
            TestimonialTranslation::class,
            'testimonial_id', // foreign key
            'id'              // local key
        );
    }

    public function translation()
    {
        return $this->hasOne(
            TestimonialTranslation::class,
            'testimonial_id', // foreign key
            'id'
        )->where('locale', app()->getLocale());
    }
}
