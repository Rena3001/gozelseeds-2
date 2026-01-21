<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSectionTranslation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'contact_section_id',
        'locale',
        'text',
        'list_1',
        'list_2',
        'list_3',
    ];

    public function section()
    {
        return $this->belongsTo(
            ContactSection::class,
            'contact_section_id',
            'id'
        );
    }
}
