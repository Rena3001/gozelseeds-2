<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestimonialTranslation extends Model
{
    public $timestamps = false;

    public function testimonial()
    {
        return $this->belongsTo(Testimonials::class);
    }
}
