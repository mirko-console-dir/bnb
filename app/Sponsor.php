<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $fillable = ['price', 'duration', 'description'];

    public function apartments()
    {
        return $this->belongsToMany('App\Apartment')->withPivot('end_date', 'status');
    }
}
