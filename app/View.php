<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class View extends Model
{
    
    protected $fillable = [
        'flat_id',
        'ip_address',
        'created_at'
    ];

    

    //Relazioni
    protected function apartment(){
        return $this->belongsTo('App\Apartment');
    }
}
