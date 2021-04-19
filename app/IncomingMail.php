<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IncomingMail extends Model
{
    protected $table = "incoming_mails";
    protected $fillable = [

        'from_mail',
        'from_name',
        'to_mail',
        'to_name',
        'subject',
        'body',
        'is_read',
        'active'

    ];
}
