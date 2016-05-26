<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Absen;
use App\Daftar_gaji;
use App\Divisi;
use App\Gaji;
use App\Job;
Use DB;
use Auth;
use Validator;
use App\Lembur;
use App\Notif;
use LRedis;
use PDF;
use App\Roles;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class UserController extends Controller
{

 	public function dashboard()
 	{
 		if (Auth::user()->roles != "user"){
			return redirect('admin');
		}
 		return view('user.home');
 	}
 	public function view_divisi()
 	{
 		return view('user.divisi.divisi',['divisi'=> Divisi::paginate(5)]);
 	}

 	public function view_karyawan()
 	{
 		return view('user.employee.employee',['employee' => User::paginate(10)],
                                            ['kar' => Job::paginate(10)]);
 	}

 	public function view_pekerjaan()
 	{
		return view('user.job.job',['job' => Job::paginate(5)]);
 	}
 	public function video()
 	{
 		return view('user.video.video');
 	}
 	public function chats($id)
	{/*
        return view('user.chat.chats',['message' =>  User::find($id)]);*/
	}
	public function view_chat()
	{
        return view('user.chat.chats',['message' =>  User::whereRoles('user')->paginate(10)]);
	}

	public function payroll()
    {
        return view('user.payroll.payroll',['job' => Job::paginate(10)],
                                            ['employee' => User::paginate(10)]);
    }
}