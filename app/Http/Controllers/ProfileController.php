<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function getAcademicProfile(){
        return view('profile.academic-profile');
    }

    public function getRankingViewer(){
        return view('profile.major-ranking');
    }
}
