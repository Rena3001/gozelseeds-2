<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeatureTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'feature_id',
        'locale',
        'title',
        'button_text',
        'description',
    ];

    public function feature()
    {
        return $this->belongsTo(Feature::class);
    }
}
