<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        
        'sender_name',
        'sender_mail',
        'msg_txt',
        'status',
    ];

    // Relation
    protected function apartment() {
        return $this->belongsTo('App\Apartment');
    }
}
