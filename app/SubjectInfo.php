<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectInfo extends Model
{
    protected $table = 'subjects';
    protected $fillable = ['subject_id', 'name', 'credit'];

    public function study_result(){
        return $this->belongsToMany('App\StudyResult', 'subject_id', 'subject_id');
    }
}
