<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = ['user_id', 'password', 'name', 'surname', 'major', 'adviser_code','status'];
    protected $hidden = ['password', 'remember_token'];

    public function gpax(){
        return $this->hasMany('App\UserGPAX', 'user_id', 'user_id');
    }

    public function study_result(){
        return $this->hasMany('App\StudyResult', 'user_id', 'user_id');
    }

    public function adviser(){
        return $this->belongsTo('App\Adviser','adviser_code','code');
    }

}
