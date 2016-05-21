<?php

namespace App\Http\Controllers;

use DB;
use Mail;
use Validator;
use File;
use Illuminate\Support\Str;
use App;
use Auth;
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
		return view('admin.dashboard');
	}
	public function absenuser()
	{
		return view('user.absen.absen');
	}
	

}