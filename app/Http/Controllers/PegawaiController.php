<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Validator;
use File;
use Illuminate\Support\Str;
use App;
use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PegawaiController extends Controller
{	
	public function __construct()
	{
		$this->middleware('auth');
	}
	

	public function home()
	{
		return view('welcome');
	}

	public function admin()
	{
		if (Auth::user()->roles != "admin") {
			return redirect('home_user');
		}
	$employees = \App\User::count();
    $payroll = \App\User::groupBy('nama')->get()->count();
    $admin = \App\User::groupBy('roles')->get()->count();
    $user = \App\User::groupBy('roles')->get()->count();

    return view('admin.dashboard')->with('employees',$employees)->with('payroll',$payroll)->with('admin',$admin)->with('user',$user);
	}
}