<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailResponse extends Model
{
    protected $table = "mail_response";
    protected $fillable = [

        'incoming_mail_id',
        'email',
        'message',
        'active',

    ];
}
