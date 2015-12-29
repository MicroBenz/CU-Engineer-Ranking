<?php

namespace App\Http\Controllers;

use App\Adviser;
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
        $max_year = UserGPAX::max('year');
        $max_semester = UserGPAX::where('year',$max_year)->max('semester');
        $gpax = UserGPAX::where('user_id',$user->user_id)->where('year',$max_year)->where('semester',$max_semester)->first();
        $gpax_result = $gpax['gpax'];
        $adviser = $user->adviser()->first();
        $gpax_infos = UserGPAX::where('user_id',$user->user_id)->orderBy('year')->orderBy('semester')->get();
        $gpax_array = array();
        foreach($gpax_infos as $gpax_info){
            $tmp = array();
            $tmp['semester'] = strval($gpax_info->year)."/".strval($gpax_info->semester);
            $tmp['value'] = $gpax_info->gpax;
            array_push($gpax_array,$tmp);
        }
        $gpax_json = json_encode($gpax_array,JSON_UNESCAPED_SLASHES);
        return view('profile.academic-profile',compact('user','gpax_result','adviser','gpax_json'));
    }

    public function getRankingViewer(){
        $user = Auth::user();
        if($user == null)
            return redirect('/login');
        $min_model_year = substr($user->user_id,0,2);
        $max_model_year = $min_model_year + 1;
        $min_id = $min_model_year."00000000";
        $max_id = $max_model_year."00000000";
        $max_year = UserGPAX::max('year');
        $max_semester = UserGPAX::where('year',$max_year)->max('semester');
        if($max_semester > 2)
            $max_semester = 2;
        $same_major_student = UserGPAX::where('user_gpax.year',$max_year)->where('user_gpax.semester',$max_semester)
                                ->join('users','user_gpax.user_id','=','users.user_id')->where('users.major',$user->major)
                                ->where('users.user_id',">=",$min_id)->where('users.user_id',"<",$max_id)->orderBy('user_gpax.gpax','desc')->get();
        $average_gpax = UserGPAX::where('user_gpax.year',$max_year)->where('user_gpax.semester',$max_semester)
                                ->join('users','user_gpax.user_id','=','users.user_id')->where('users.major',$user->major)
                                ->where('users.user_id',">=",$min_id)->where('users.user_id',"<",$max_id)->avg('gpax');
        $i = 1;
        $ranking_array = array();
        $data = array();
        $data['avg_gpax'] = $average_gpax;
        foreach ($same_major_student as $major_student) {
            # code...
            if($major_student->user_id == $user->user_id) $data['rank'] = $i;
            $tmp = array();
            $tmp['rank'] = $i;
            $tmp['value'] = $major_student->gpax;
            $tmp['gpax'] = $average_gpax;
            array_push($ranking_array,$tmp);
            $i++;
        }
        $ranking_json = json_encode($ranking_array,JSON_UNESCAPED_SLASHES);
        return view('profile.major-ranking',compact('user','data','ranking_json'));
    }
}
