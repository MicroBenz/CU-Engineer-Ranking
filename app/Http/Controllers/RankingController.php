<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RankingController extends Controller
{
    public function getFreshyRankCalculator(){
    	$user = Auth::user();
    	if($user == null)
            return redirect('/login');
        $study_result = $user->study_result()->first();
        if($study_result->major != 'Normal')
        	return redirect('/profile');
        return view('ranking.freshy-ranking-calculator',compact('user'));
    }
}
