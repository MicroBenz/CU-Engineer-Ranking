<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudyResult extends Model
{
    protected $table = 'studies_result';
    protected $fillable = ['user_id', 'year', 'semester', 'subject_id', 'grade'];

    public function result_owner(){
        return $this->belongsTo('App\User');
    }

    public function subject(){
        return $this->belongsTo('App\SubjectInfo');
    }
}
