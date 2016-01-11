<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\StudyResult;
use App\RankingWeight;

class AdminController extends Controller
{
    public function login(){
        $user = Auth::user();
        if($user != null){
            return redirect('/admin/index');
        }
        $hasError = Session::get('hasError');
        return view('back-login',compact('hasError'));
    }
    public function getIndex(){
        $user = Auth::user();
        if($user == null){
            return redirect('/admin');
        }
        return view('dashboard.main');
    }
    public function getEditRatio(){
        $user = Auth::user();
        if($user == null){
            return redirect('/admin');
        }
        return view('dashboard.edit-ratio');
    }
    public function getUploadCSV(){
        $user = Auth::user();
        if($user == null){
            return redirect('/admin');
        }
        return view('dashboard.upload-csv');
    }
    public function getAddEditQA(){
        $user = Auth::user();
        if($user == null){
            return redirect('/admin');
        }
        return view('dashboard.edit-qa');
    }

    public function getMajorScore(){
        $user = Auth::user();
        if($user == null)
            return redirect('/login');
        
        $student_grade = StudyResult::where('studies_result.user_id',$user->user_id)
                            ->join('subjects','studies_result.subject_id','=','subjects.subject_id')->get();
        $ranking_weight = RankingWeight::table('ranking_weights')->get();
        $score = 0;
        foreach ($student_grade as $subject) {
            $grade_char = $subject->grade;
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
            $score += $subject->credit * $grade_val;
        }
        domxml_xslt_stylesheet_doc(xsl_doc);

    }
}
