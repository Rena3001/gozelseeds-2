<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    protected $table = 'category_translations';

    protected $fillable = [
        'category_id',
        'locale',
        'title',
    ];

    /**
     * Category relation
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
