<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    //
    public $timestamps = false;
    protected $table = 'advisers';
    protected $fillable = ['instructor_no','code','title','name','surname','major','email'];

    public function student(){
        return $this->hasMany('App\User','adviser_code','code');
    }
}
