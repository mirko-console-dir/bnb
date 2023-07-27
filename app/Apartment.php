<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Sponsor;
use App\View;


class Apartment extends Model
{
    protected $fillable = [
        'title','slug','num_rooms','num_beds','num_baths','mq','city','province','state','latitude','longitude','description','main_img','price','active','andress'
    ];
    //relation with user *
    public function user(){
        return $this->belongsTo('App\User');
    }
    //relation with message 1
    public function messages(){
        return $this->hasMany('App\Message');
    }

    //relation with service{BRIDGE}
    public function services(){
        return $this->belongsToMany('App\Service');
    }
    //relation with view 1
    public function views(){
        return $this->hasMany('App\View');
    }
    //relation with sponsor{BRIDGE}
    public function sponsors(){
        return $this->belongsToMany('App\Sponsor')->withPivot('end_date', 'status');
    }
    //relation with images 1
    public function images(){
        return $this->hasMany('App\Image');
    }

    public function addView()
    {
        $visita = new View();                    
        $visita->ip_address = Request()->ip();

        return $this->views()->save( $visita );    
    }
}