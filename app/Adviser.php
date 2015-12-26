<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adviser extends Model
{
    //
    public $timestamps = false;
    protected $table = 'advisers';
    protected $fillable = ['adviser_code','adviser_title','adviser_name','adviser_surname','adviser_major','adviser_email'];

    public function student(){
        return $this->belongsToMany('App\User','adviser_code','adviser_code');
    }
}
