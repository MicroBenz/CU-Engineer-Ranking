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
        $max_year = UserGPAX::max('year');
        $max_semester = UserGPAX::where('year',$max_year)->max('semester');
        if($max_semester > 2)
            $max_semester = 2;
        $same_major_student = UserGPAX::where('user_gpax.year',$max_year)->where('user_gpax.semester',$max_semester)->join('users','user_gpax.user_id','=','users.user_id')->where('users.major',$user->major)->orderBy('user_gpax.gpax','desc')->get();
        $average_gpax = UserGPAX::where('user_gpax.year',$max_year)->where('user_gpax.semester',$max_semester)->avg('gpax');
        $rank = 1;
        foreach ($same_major_student as $major_student) {
            # code...
            if($major_student->user_id == $user->user_id)
            {
                break;
            }
            $rank++;
        }
        $data = array();
        $data['rank'] = $rank;
        $data['avg_gpax'] = $average_gpax;
        return view('profile.major-ranking',compact('user','data'));
    }
}
