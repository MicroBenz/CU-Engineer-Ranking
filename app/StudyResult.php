<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyResult extends Model
{
    //
    protected $table = 'studies_result';

    public function result_owner(){
        return $this->belongsTo('App\User');
    }
}
