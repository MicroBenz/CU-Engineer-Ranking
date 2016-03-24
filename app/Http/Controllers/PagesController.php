<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function login(){
        $user = Auth::user();
        if($user != null) {
            if($user['status'] == 'admin')
                return redirect('/admin/index');
            else
                return redirect('/profile');
        }
        $hasError = Session::get('hasError');
        return view('login',compact('hasError'));
    }
    public function postLogin(){
        $uid = Input::get('student-id');
        $pw = Input::get('pwd');
        $remember = Input::get('remember');
        if(Auth::attempt(['user_id' => $uid, 'password' => $pw], $remember)) {
            $user = Auth::user();
            if($user['status']=='admin')
                return redirect('/admin/index');
            else
                return redirect('profile');
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
            return view('profile.academic-profile');
    }
}
