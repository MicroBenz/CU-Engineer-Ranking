<?php

namespace App\Http\Controllers;


use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

use App\User;
use App\Adviser;
use App\SubjectInfo;
use App\UserGPAX;
use App\StudyResult;
use App\RankingWeight;
use App\NonMajorRankingScore;

class AdminController extends Controller
{
    public function getIndex(){
        $user = Auth::user();
        if($user == null || $user['status'] != 'admin'){
            return redirect('/');
        }
        return view('dashboard.main');
    }
    public function getEditRatio(){
        $user = Auth::user();
        if($user == null || $user['status'] != 'admin'){
            return redirect('/');
        }
        return view('dashboard.edit-ratio');
    }
    public function getUploadCSV(){
        $user = Auth::user();
        if($user == null || $user['status'] != 'admin'){
            return redirect('/');
        }
        return view('dashboard.upload-csv');
    }

    public function getAddEditQA(){
        $user = Auth::user();
        if($user == null || $user['status'] != 'admin'){
            return redirect('/login');
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

    public function uploadUserXlsx(){
        $file = Input::file('file');
        $name = time() . '-' . $file->getClientOriginalName();
        $new_path = public_path() . '/uploads/';
        $file->move($new_path, $name);
        echo '<pre>' .Carbon::now(). '</pre>';
        $results = Excel::load('uploads\\'.$name)->toArray();
        $bc_pw = bcrypt('111111');
        foreach($results as $row)
            if(!is_null($row['studentcode'])) {
                $name_surname = explode(" ", $row['name']);
//                $r = array('user_id'=>$row['studentcode'],'password'=>bcrypt('111111'),'name'=>$name_surname[0],'surname'=>$name_surname[1],'major'=>$row['department'],'adviser_code'=>'PVK','status'=>$row['status']);
//                $uploader[]=$r;
                User::create(['user_id'=>$row['studentcode'],'password'=>$bc_pw,'name'=>$name_surname[0],'surname'=>$name_surname[1],'major'=>$row['department'],'adviser_code'=>'PVK','status'=>$row['status']]);
            }
        echo '<pre>' .Carbon::now(). '</pre>';
        unlink($new_path.$name);
        dd($results);
    }

    public function uploadStudentGPAXXlsx(){
        $file = Input::file('file');
        $name = time() . '-' . $file->getClientOriginalName();
        $new_path = public_path() . '/uploads/';
        $file->move($new_path, $name);
        echo '<pre>' .Carbon::now(). '</pre>';
        $results = Excel::load('uploads\\'.$name)->toArray();
        foreach($results as $row)
            if(!is_null($row['studentcode'])) {
//                $r = array('user_id'=>$row['studentcode'],'password'=>bcrypt('111111'),'name'=>$name_surname[0],'surname'=>$name_surname[1],'major'=>$row['department'],'adviser_code'=>'PVK','status'=>$row['status']);
//                $uploader[]=$r;
                UserGPAX::create(['user_id'=>$row['studentcode'],'year'=>$row['acad_year'],'semester'=>$row['semester'],'gpa'=>$row['gpa'],'gpax'=>$row['gpax']]);
            }
        echo '<pre>' .Carbon::now(). '</pre>';
        unlink($new_path.$name);
        dd($results);
    }

    public function uploadCourseXlsx(){
        $file = Input::file('file');
        $name = time() . '-' . $file->getClientOriginalName();
        $new_path = public_path() . '/uploads/';
        $file->move($new_path, $name);
        echo '<pre>' .Carbon::now(). '</pre>';
        $results = Excel::load('uploads\\'.$name)->toArray();
        foreach($results as $row)
            if(!is_null($row['studentcode'])) {
//                $r = array('user_id'=>$row['studentcode'],'password'=>bcrypt('111111'),'name'=>$name_surname[0],'surname'=>$name_surname[1],'major'=>$row['department'],'adviser_code'=>'PVK','status'=>$row['status']);
//                $uploader[]=$r;
                SubjectInfo::create(['subject_id'=>$row['coursecode'],'name'=>$row['nameenglishabbr'],'credit'=>$row['credit']);
            }
        echo '<pre>' .Carbon::now(). '</pre>';
        unlink($new_path.$name);
        dd($results);
    }

    public function uploadAdviserXlsx(){
        $file = Input::file('file');
        $name = time() . '-' . $file->getClientOriginalName();
        $new_path = public_path() . '/uploads/';
        $file->move($new_path, $name);
        echo '<pre>' .Carbon::now(). '</pre>';
        $results = Excel::load('uploads\\'.$name)->toArray();
        foreach($results as $row)
            if(!is_null($row['studentcode'])) {
//                $r = array('user_id'=>$row['studentcode'],'password'=>bcrypt('111111'),'name'=>$name_surname[0],'surname'=>$name_surname[1],'major'=>$row['department'],'adviser_code'=>'PVK','status'=>$row['status']);
//                $uploader[]=$r;
                Adviser::create(['code'=>'PVK','title'=>'Ph.D','name'=>'Peerapon','surname'=>'Vateekul','major'=>'CP','email'=>'peerapon.vateekul@gmail.com']);
            }
        echo '<pre>' .Carbon::now(). '</pre>';
        unlink($new_path.$name);
        dd($results);
    }

    public function uploadStudentStudyResultXlsx(){
        $file = Input::file('file');
        $name = time() . '-' . $file->getClientOriginalName();
        $new_path = public_path() . '/uploads/';
        $file->move($new_path, $name);
        echo '<pre>' .Carbon::now(). '</pre>';
        $results = Excel::load('uploads\\'.$name)->toArray();
        foreach($results as $row)
            if(!is_null($row['studentcode'])) {
//                $r = array('user_id'=>$row['studentcode'],'password'=>bcrypt('111111'),'name'=>$name_surname[0],'surname'=>$name_surname[1],'major'=>$row['department'],'adviser_code'=>'PVK','status'=>$row['status']);
//                $uploader[]=$r;
                StudyResult::create(['user_id'=>'5631036721','year'=>'2557','semester'=>'2','subject_id'=>'123','grade'=>'A']);
            }
        echo '<pre>' .Carbon::now(). '</pre>';
        unlink($new_path.$name);
        dd($results);
    }

}
