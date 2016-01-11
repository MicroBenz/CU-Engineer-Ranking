<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NonMajorRankingScore extends Model
{
    //
	protected $table = 'non_major_ranking_scores';
    protected $fillable = ['user_id', 'me_score', 'ee_score','pe_score','cp_score','che_score','ce_score','ie_score'
    						,'metal_score','env_score','auto_score','be_score'];

    //public $timestamps = false;
}
