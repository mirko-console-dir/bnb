<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [

        'src'

    ];

    // Relation
    protected function apartment() {
        return $this->belongsTo('App\Apartment');
    }
}
