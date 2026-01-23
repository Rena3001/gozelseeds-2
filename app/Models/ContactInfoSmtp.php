<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInfoSmtp extends Model
{
    protected $fillable = [
        'mailer',
        'host',
        'port',
        'encryption',
        'from_email',
        'from_name',
        'client_id',
        'client_secret',
        'tenant_id',
    ];
}
