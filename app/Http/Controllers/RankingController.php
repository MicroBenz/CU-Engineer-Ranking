<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\StudyResult;
use App\RankingWeight;
use App\NonMajorRankingScore;

class RankingController extends Controller
{
    public function getFreshyRankCalculator(){
    	$user = Auth::user();
    	if($user == null)
            return redirect('/login');
        if($user->major != 'CP')
        	return redirect('/profile');

        // Only Test Score will delete after finish
        $student_grade = StudyResult::where('studies_result.user_id',$user->user_id)
                            ->join('subjects','studies_result.subject_id','=','subjects.subject_id')->get();
        $ranking_weight = RankingWeight::get();

        foreach ($ranking_weight as $major_weight) {
             # code..
            $score = 0;
        //     $idx = 0;
            foreach ($student_grade as $subject) {
                $grade_char = $subject->grade;
                $subject_weight = $major_weight[$subject->name];
                $grade_val;
                if($grade_char == 'A') $grade_val = 4;
                else if($grade_char == 'B+') $grade_val = 3.5;
                else if($grade_char == 'B') $grade_val = 3;
                else if($grade_char == 'C+') $grade_val = 2.5;
                else if($grade_char == 'C') $grade_val = 2;
                else if($grade_char == 'D+') $grade_val = 1.5;
                else if($grade_char == 'D') $grade_val = 1;
                //else if($grade_char == 'F' || $grade_char == 'W') $grade_val = 0;
                else $grade_val = 0;

                $score += $subject_weight * $grade_val;
            }
            NonMajorRankingScore::where('user_id',$user->user_id)->update([($major_weight->major."_score") => $score]);
            //NonMajorRankingScore::insert(['user_id'=> $user->user_id,($ranking_weight->major."_score") => $score]);
        }                

        $aa = NonMajorRankingScore::first();
        //$aa = ($ranking_weight->major."_score");

        //end of Test Score

        return view('ranking.freshy-ranking-calculator',compact('user','aa'));
    }
}
