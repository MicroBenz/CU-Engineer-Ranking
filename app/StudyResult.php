<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyResult extends Model
{
    protected $table = 'studies_result';
    protected $fillable = ['user_id', 'year', 'semester', 'subject_id', 'grade'];

    public function result_owner(){
        return $this->belongsTo('App\User', 'user_id', 'user_id');
    }

    public function subject(){
        return $this->hasOne('App\SubjectInfo', 'subject_id', 'subject_id');
    }
}
