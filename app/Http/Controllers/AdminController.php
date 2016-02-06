<?php

namespace App\Http\Controllers;

use App\SubjectInfo;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use App\StudyResult;
use App\RankingWeight;
use App\NonMajorRankingScore;

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

    public function postUploadCSV()
    {
        $user = Auth::user();
        if (!$user)
            return redirect('/admin');
        if (Input::hasFile('file')) {
            set_time_limit(600);
            $course_info_column_name = ["", "", ""];
            $file = Input::file('file');
            $name = time() . '-' . $file->getClientOriginalName();
            $new_path = public_path() . '/uploads/';
            $file->move($new_path, $name);
            $csv = fopen($new_path . $name, 'r');
            $csv_col_names = fgetcsv($csv);
            for ($i = 0; $i < count($course_info_column_name); $i++) {
                if($csv_col_names[$i]== 'COURSECODE') $course_info_column_name[$i] = 'subject_id';
                else if($csv_col_names[$i]== 'NAMEENGLISHABBR') $course_info_column_name[$i] = 'name';
                else if($csv_col_names[$i]== 'TOTALCREDIT') $course_info_column_name[$i] = 'credit';
            }

            while (!feof($csv)) {
                $var = fgetcsv($csv);
                if ($var) {
                    $new_var = [];
                    $isnull = false;
                    for ($i = 0; $i < count($course_info_column_name); $i++) {
                        if($var[$i]=='') $isnull = true;
                        $new_var[$course_info_column_name[$i]] = $var[$i];
                    }
                    if(!$isnull)
                        SubjectInfo::create($new_var);
                }
            }
            try{
                unlink($new_path . $name);
            }catch(Exception $e){}
            return view('upload-csv')->with('success', true);
        }
        return view('upload-csv')->with('error', 'Please select file');
    }

    public function getAddEditQA(){
        $user = Auth::user();
        if($user == null){
            return redirect('/admin');
        }
        return view('dashboard.edit-qa');
    }

    public function calOneStudentMajorScore(Array $user){
        
        $student_grade = StudyResult::where('studies_result.user_id',$user->user_id)
                            ->join('subjects','studies_result.subject_id','=','subjects.subject_id')->get();
        $ranking_weight = RankingWeight::get();

        foreach ($ranking_weight as $major_weight) {
             # code..
            $score = 0;
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

    }

    public function calAllStudentMajorScore(){
        $non_major_student = User::where('major','Normal')->get();
        foreach ($non_major_student as $student) {
            # code...
            calOneStudentMajorScore($student);
        }
    }


}
