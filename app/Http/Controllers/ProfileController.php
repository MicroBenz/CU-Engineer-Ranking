<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function getAcademicProfile(){
        $user = Auth::user();
        if($user == null)
            return redirect('/login');
        return view('profile.academic-profile',compact('user'));
    }

    public function getRankingViewer(){
        return view('profile.major-ranking');
    }
}
