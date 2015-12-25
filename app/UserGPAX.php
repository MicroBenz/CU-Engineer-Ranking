<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGPAX extends Model
{
    //
    public $timestamps = false;
    protected $table = 'user_gpax';

    public function gpax_owner(){
        return $this->belongsTo('App\User');
    }
}
