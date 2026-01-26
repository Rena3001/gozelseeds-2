<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceProvidingQualityItemTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'service_providing_quality_item_id','locale','title','text'
    ];
      public function item()
    {
        return $this->belongsTo(
            ServiceProvidingQualityItem::class,
            'service_providing_quality_item_id'
        );
    }
    
}
 