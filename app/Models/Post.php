<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'image',
        'author',
        'comments_count',
        'published_at',
        'order',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'date',
    ];

    public function translations()
    {
        return $this->hasMany(
            PostTranslation::class,
            'post_id',
            'id'
        );
    }

    public function translation()
    {
        return $this->hasOne(
            PostTranslation::class,
            'post_id',
            'id'
        )->where('locale', app()->getLocale());
    }
}
