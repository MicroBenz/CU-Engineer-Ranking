<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RankingWeight extends Model
{
    //
	protected $table = 'ranking_weights';
    // protected $fillable = ['major', 'gen_phy_1', 'gen_phy_2','cal_1','cal_2','exp_eng_1','exp_eng_2','gen_phy_lab_1'
    // 						,'gen_phy_lab_2','gen_chem','gen_chem_lab','drawing','com_prog','material','exp_eng_world'];
    protected $fillable = ['major', 'drawing', 'material','com_prog','exp_eng_world','cal_1','cal_2','gen_phy_1'
    						,'gen_phy_2','gen_chem','exp_eng_1','exp_eng_2','gen_chem_lab','gen_phy_lab_1','gen_phy_lab_2'];


    public $timestamps = false;
}
