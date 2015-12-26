<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    //
    public $timestamps = false;
    protected $table = 'advisers';
    protected $fillable = ['code','title','name','surname','major','email'];

    public function student(){
        return $this->belongsToMany('App\User','adviser_code','code');
    }
}
