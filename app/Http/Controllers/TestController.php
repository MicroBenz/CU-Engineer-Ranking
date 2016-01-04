<?php

namespace App\Http\Controllers;

use App\Adviser;
use App\StudyResult;
use App\SubjectInfo;
use App\User;
use App\UserGPAX;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function testUser()
    {
        $user = User::where('user_id','5631036721')->first();
        $data = [];
        $data['user'] = $user;
        $data['gpax'] = $user->gpax()->get();
        $data['study_result'] = $user->study_result()->get();
        $data['adviser'] = $user->adviser()->first();
        return $data;
    }
    public function testSubject()
    {
        $subject = StudyResult::where('subject_id','123')->first();
        $data = [];
        $data['subject'] = $subject;
        $data['study_result'] = $subject->subject()->get();
        return $data;
    }
    public function testGPAX()
    {
        $gpax = UserGPAX::where('user_id','5631036721')->first();
        $data = [];
        $data['gpax'] = $gpax;
        $data['user'] = $gpax->gpax_owner()->first();
        return $data;
    }
    public function testResult()
    {
        $result = StudyResult::where('user_id','5631036721')->first();
        $data = [];
        $data['result'] = $result;
        $data['user'] = $result->result_owner()->first();
        $data['subject'] = $result->subject()->first();
        return $data;
    }

    public function testAdviser()
    {
        $adviser = Adviser::where('code','PVK')->first();
        $data = [];
        $data['adviser'] = $adviser;
        $data['student']= $adviser->student()->get();
        return $data;
    }
    public function testDashboard(){
        return view('dashboard.master-dashboard');
    }
}
