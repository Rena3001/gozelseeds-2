<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = [
        'code',
        'label',
        'name',
        'flag', 
        'is_active',
        'order'
    ];
}
