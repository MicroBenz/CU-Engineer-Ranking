<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

//Addition add
use Illuminate\Support\Facades\Input;
use App\UserGPAX;
use App\User;

class ProfileController extends Controller
{
    public function getAcademicProfile(){
        $user = Auth::user();
        if($user == null)
            return redirect('/login');
        return view('profile.academic-profile',compact('user'));
    }

    public function getRankingViewer(){
        $user = Auth::user();
        if($user == null)
            return redirect('/login');
        $nn = UserGPAX::where('user_gpax.year','2556')->where('user_gpax.semester','1')->join('users','user_gpax.user_id','=','users.user_id')->where('users.major','CP')->orderBy('user_gpax.gpax','desc')->get();
        //$nn = User::where('major',$user->major)->gpax()->orderBy('gpax')->get();
        /*$same_year_student = array();
        $grade_student = array();
        foreach ($same_major_student as $major_student) {
            # code...
            if(substr((string)$major_student->user_id,0,2) == substr((string)$user->user_id,0,2) )
            {
                array_push($same_year_student,$major_student);
                array_push($grade_student, $major_student->gpax()->first());
            }
        }
        
        if(sizeof($grade_student) > 0)
            $nn = $grade_student[1]->gpax;
        else
            $nn = substr((string)$same_major_student[0]->user_id,0,2);*/
        return view('profile.major-ranking',compact('user','nn'));
    }
}
