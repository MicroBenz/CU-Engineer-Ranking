<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
}
