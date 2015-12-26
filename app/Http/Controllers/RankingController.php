<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RankingController extends Controller
{
    public function getFreshyRankCalculator(){
        return view('ranking.freshy-ranking-calculator');
    }
}
