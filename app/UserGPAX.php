<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserGPAX extends Model
{
    protected $table = 'user_gpax';
    public $timestamps = false;
    protected $fillable = ['user_id', 'year', 'semester', 'gpa', 'gpax'];

    public function gpax_owner(){
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }
}
