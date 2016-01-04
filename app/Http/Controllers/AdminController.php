<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getIndex(){
        return view('dashboard.main');
    }
    public function getEditRatio(){
        return view('dashboard.edit-ratio');
    }
    public function getUploadCSV(){
        return view('dashboard.upload-csv');
    }
    public function getAddEditQA(){
        return view('dashboard.edit-qa');
    }
}
