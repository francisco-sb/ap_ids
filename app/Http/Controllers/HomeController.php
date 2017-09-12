<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Auth;
use Redirect;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {   
        if (Auth::check()) {
            return Redirect::to('/profile');
        }else{
            return view('viewSession');            
        }
    }

    public function studentRegister()
    {
        if (Auth::check()) {
            return Redirect::to('/profile');
        }else{
            return view('student.studentRegister');
        }
    }

    public function teacherRegister()
    {
        if (Auth::check()) {
            return Redirect::to('/profile');
        }else{
            return view('teacher.teacherRegister');
        }
    }
    
}


