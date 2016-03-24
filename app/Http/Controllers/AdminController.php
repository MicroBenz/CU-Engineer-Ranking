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

    //Note !!!!!!! Not Finish 
    // public function uploadUserCSV()
    // {
    //     $user = Auth::user();
    //     if (!$user)
    //         return redirect('/admin');
    //     if (Input::hasFile('file')) {
    //         set_time_limit(600);
    //         $user_column_name = ["", "", "", "", "", "", ""];
    //         $file = Input::file('file');
    //         $name = time() . '-' . $file->getClientOriginalName();
    //         $new_path = public_path() . '/uploads/';
    //         $file->move($new_path, $name);
    //         $csv = fopen($new_path . $name, 'r');
    //         $csv_col_names = fgetcsv($csv);
    //         for ($i = 0; $i < count($user_column_name); $i++) {
    //             if($csv_col_names[$i]== 'INSTRCTORNO') $user_column_name[$i] = 'instructor_no';
    //             else if($csv_col_names[$i]== 'POSITION') $user_column_name[$i] = 'title';
    //             else if($csv_col_names[$i]== 'NAMEENGLISH') $user_column_name[$i] = 'name';
    //             else if($csv_col_names[$i]== 'SURNAMEENGLISH') $user_column_name[$i] = 'surname';
    //             else if($csv_col_names[$i]== 'NAMEABBR') $user_column_name[$i] = 'code';
    //             else if($csv_col_names[$i]== 'DEPNAME') $user_column_name[$i] = 'major';                
    //         }

    //         while (!feof($csv)) {
    //             $var = fgetcsv($csv);
    //             if ($var) {
    //                 $new_var = [];
    //                 $isnull = false;
    //                 for ($i = 0; $i < count($user_column_name); $i++) {
    //                     if($var[$i]=='') $isnull = true;
    //                     $new_var[$user_column_name[$i]] = $var[$i];
    //                 }
    //                 if(!$isnull)
    //                     User::create($new_var);
    //             }
    //         }
    //         try{
    //             unlink($new_path . $name);
    //         }catch(Exception $e){}
    //         return view('upload-csv')->with('success', true);
    //     }
    //     return view('upload-csv')->with('error', 'Please select file');
    // }

    //Note !!!!!!! Not Finish ขาด Email
    public function uploadAdviserCSV()
    {
        $user = Auth::user();
        if ($user == null || $user['status'] != 'admin')
            return redirect('/login');
        if (Input::hasFile('file')) {
            set_time_limit(600);
            $adviser_column_name = ["", "", "", "", "", "", ""];
            $file = Input::file('file');
            $name = time() . '-' . $file->getClientOriginalName();
            $new_path = public_path() . '/uploads/';
            $file->move($new_path, $name);
            $csv = fopen($new_path . $name, 'r');
            $csv_col_names = fgetcsv($csv);
            for ($i = 0; $i < count($adviser_column_name); $i++) {
                if($csv_col_names[$i]== 'INSTRCTORNO') $adviser_column_name[$i] = 'instructor_no';
                else if($csv_col_names[$i]== 'POSITION') $adviser_column_name[$i] = 'title';
                else if($csv_col_names[$i]== 'NAMEENGLISH') $adviser_column_name[$i] = 'name';
                else if($csv_col_names[$i]== 'SURNAMEENGLISH') $adviser_column_name[$i] = 'surname';
                else if($csv_col_names[$i]== 'NAMEABBR') $adviser_column_name[$i] = 'code';
                else if($csv_col_names[$i]== 'DEPNAME') $adviser_column_name[$i] = 'major';  
            }

            while (!feof($csv)) {
                $var = fgetcsv($csv);
                if ($var) {
                    $new_var = [];
                    $isnull = false;
                    for ($i = 0; $i < count($adviser_column_name); $i++) {
                        if($var[$i]=='') $isnull = true;
                        $new_var[$adviser_column_name[$i]] = $var[$i];
                    }
                    if(!$isnull)
                        Adviser::create($new_var);
                }
            }
            try{
                unlink($new_path . $name);
            }catch(Exception $e){}
            return view('upload-csv')->with('success', true);
        }
        return view('upload-csv')->with('error', 'Please select file');
    }

    public function uploadUser()
    {
        $user = Auth::user();
        if ($user == null || $user['status'] != 'admin')
            return redirect('/login');
        if (Input::hasFile('file')) {
            set_time_limit(600);
            $users_column_name = ["","","",""];
            $file = Input::file('file');
            $name = time() . '-' . $file->getClientOriginalName();
            $new_path = public_path() . '/uploads/';
            $file->move($new_path, $name);
            $csv = fopen($new_path . $name, 'r');
            $csv_col_names = fgetcsv($csv,null,',');
            for ($i = 0; $i < count($users_column_name); $i++) {
                var_dump($i);
                var_dump($csv_col_names[$i]);
                if(trim($csv_col_names[$i])== "STUDENTCODE") $users_column_name[$i] = 'user_id';
                else if(trim($csv_col_names[$i])== 'NAME') $users_column_name[$i] = 'name';
                else if(trim($csv_col_names[$i])== 'DEPARTMENT') $users_column_name[$i] = 'major';
                else if(trim($csv_col_names[$i])== 'STATUS') $users_column_name[$i] = 'status';
                var_dump($users_column_name[$i]);
            }
//            var_dump("1)",$csv_col_names);
//            var_dump("2)",$users_column_name);

            while (!feof($csv)) {
                $var = fgetcsv($csv,null,',');
                if ($var) {
                    $new_var = [];
                    $isnull = false;
                    for ($i = 0; $i < count($users_column_name); $i++) {
                        if (trim($var[$i]) == '') $isnull = true;
                        $new_var[$users_column_name[$i]] = trim($var[$i]);
                    }
                    $new_var['password'] = bcrypt('111111');
                    $new_var['surname'] = "";
                    $new_var['adviser_code'] = "PVK";
                    if(!$isnull) {
                        $get_user = User::find($new_var['user_id']);
                        if($get_user) $get_user->update($new_var);
                        else User::create($new_var);
                    }
                }
            }
            try{
                unlink($new_path . $name);
            }catch(Exception $e){}
            return view('upload-csv')->with('success', true);
        }
        return view('upload-csv')->with('error', 'Please select file');
    }

    public function uploadUserGPAXCSV()
    {
        $user = Auth::user();
        if ($user == null || $user['status'] != 'admin')
            return redirect('/login');
        if (Input::hasFile('file')) {
            set_time_limit(600);
            $user_gpax_column_name = ["", "", "", "", ""];
            $file = Input::file('file');
            $name = time() . '-' . $file->getClientOriginalName();
            $new_path = public_path() . '/uploads/';
            $file->move($new_path, $name);
            $csv = fopen($new_path . $name, 'r');
            $csv_col_names = fgetcsv($csv);
            for ($i = 0; $i < count($user_gpax_column_name); $i++) {
                if($csv_col_names[$i]== 'STUDENTCODE') $user_gpax_column_name[$i] = 'user_id';
                else if($csv_col_names[$i]== 'ACAD_YEAR') $user_gpax_column_name[$i] = 'year';
                else if($csv_col_names[$i]== 'SEMESTER') $user_gpax_column_name[$i] = 'semester';
                else if($csv_col_names[$i]== 'GPA') $user_gpax_column_name[$i] = 'gpa';
                else if($csv_col_names[$i]== 'GPAX') $user_gpax_column_name[$i] = 'gpax';
            }

            while (!feof($csv)) {
                $var = fgetcsv($csv);
                if ($var) {
                    $new_var = [];
                    $isnull = false;
                    for ($i = 0; $i < count($user_gpax_column_name); $i++) {
                        if($var[$i]=='') $isnull = true;
                        $new_var[$user_gpax_column_name[$i]] = $var[$i];
                    }
                    if(!$isnull)
                        UserGPAX::create($new_var);
                }
            }
            try{
                unlink($new_path . $name);
            }catch(Exception $e){}
            return view('upload-csv')->with('success', true);
        }
        return view('upload-csv')->with('error', 'Please select file');
    }

    public function uploadCourseInfoCSV()
    {
        $user = Auth::user();
        if ($user == null || $user['status'] != 'admin')
            return redirect('/login');
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

    public function uploadStudyResultCSV()
    {
        $user = Auth::user();
        if ($user == null || $user['status'] != 'admin')
            return redirect('/login');
        if (Input::hasFile('file')) {
            set_time_limit(600);
            $study_result_column_name = ["", "", "", "", ""];
            $file = Input::file('file');
            $name = time() . '-' . $file->getClientOriginalName();
            $new_path = public_path() . '/uploads/';
            $file->move($new_path, $name);
            $csv = fopen($new_path . $name, 'r');
            $csv_col_names = fgetcsv($csv);
            for ($i = 0; $i < count($study_result_column_name); $i++) {
                if($csv_col_names[$i]== 'STUDENTCODE') $study_result_column_name[$i] = 'user_id';
                else if($csv_col_names[$i]== 'YEAR') $study_result_column_name[$i] = 'year';
                else if($csv_col_names[$i]== 'SEMESTER') $study_result_column_name[$i] = 'semester';
                else if($csv_col_names[$i]== 'COURSECODE') $study_result_column_name[$i] = 'subject_id';
                else if($csv_col_names[$i]== 'GRADE') $study_result_column_name[$i] = 'grade';   
            }

            while (!feof($csv)) {
                $var = fgetcsv($csv);
                if ($var) {
                    $new_var = [];
                    $isnull = false;
                    for ($i = 0; $i < count($study_result_column_name); $i++) {
                        if($var[$i]=='') $isnull = true;
                        $new_var[$study_result_column_name[$i]] = $var[$i];
                    }
                    if(!$isnull)
                        StudyResult::create($new_var);
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

    public function uploadXlsx(){
        $file = Input::file('file');
        $name = time() . '-' . $file->getClientOriginalName();
        $new_path = public_path() . '/uploads/';
        $file->move($new_path, $name);
        echo '<pre>' .Carbon::now(). '</pre>';
        $uploader = [];
        $results = Excel::load('uploads\\'.$name,function($reader) {
            $reader->each(function($row) {
                if(!is_null($row['studentcode'])) {
                    $name_surname = explode(" ", $row['name']);
//                    $r = array('user_id'=>$row['studentcode'],'password'=>bcrypt('111111'),'name'=>$name_surname[0],'surname'=>$name_surname[1],'major'=>$row['department'],'adviser_code'=>'PVK','status'=>$row['status']);
//                    $uploader[]=$r;
                    User::create(['user_id'=>$row['studentcode'],'password'=>bcrypt('111111'),'name'=>$name_surname[0],'surname'=>$name_surname[1],'major'=>$row['department'],'adviser_code'=>'PVK','status'=>$row['status']]);
                }
            });
        })->toArray();
        echo '<pre>' .Carbon::now(). '</pre>';
        dd($results);
//        User::insert($uploader);
//        foreach($uploader as $row){
//            echo '<pre>'.implode(",",$row).'</pre>';
//        }
//        echo '<pre>' .$uploader. '</pre>';
//        User::create($uploader);
        unlink($new_path.$name);
    }

}
