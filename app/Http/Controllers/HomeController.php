<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_user()
    {
         if (Auth::check()) {
            return redirect('home_user');
        }
        return view('welcome');
    }
    
    public function index()
    {
        if (Auth::check()) {
            return redirect('admin');
        }
        return view('welcome');
    }

    public function errorpage()
    {
        return view('errors.503');
    }
}
