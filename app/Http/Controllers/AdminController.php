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
use Validator;
use Auth;
use App\Lembur;
use App\Notif;
use PDF;
use App\Roles;
use Illuminate\Support\Facades\Input;


use App\Http\Requests;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function homeadmin()
    {
        return view('admin.home',['kar' => User::paginate(10)]);
    }
    public function view_tambahkerja()
	{
		return view('admin.pekerjaan.tambahpekerjaan');
	}
	public function view_kerja()
	{
		return view('admin.pekerjaan.pekerjaan',['job' => Job::paginate(5)]);
        

	}

	public function add_tambahkerja(Request $request)
	{
	 $this->validate($request, [
            'name' => 'required',
            'pekerjaan' => 'required'
        ]);
	 	$job = new \App\Job;
	 	$job->name = $request->name;
	 	$job->pekerjaan = $request->pekerjaan;
        $job->save();
        return redirect('pekerjaan');
    }

    public function deletepeker($id)
    {
    	Job::destroy($id);
        return redirect('pekerjaan');
    }
    
    public function view_tambahkar()
    {
    	return view('admin.karyawan.tambah',['kar' => Job::paginate(100)],
    										['div' => Divisi::paginate(100)]);
    }

    public function view_tambahdiv()
    {
    	return view('admin.divisi.tambah',['divisi' => Divisi::paginate(100)]);
    }

    public function view_divisi()
    {
    	return view('admin.divisi.divisi',['divisi' => Divisi::paginate(5)]);

    }

    public function add_divisi(Request $r)
    {
    	$this->validate($r, [
    		'nama' => 'required',
    		'code' => 'required'
    		]);
    	$div = new \App\Divisi;
    	$div->nama = $r->nama;
    	$div->code = $r->code;
    	$div->save();
    	return redirect('divisi');
    }

    public function delete_div($id)
    {
        Divisi::destroy($id);
        return redirect('divisi');
    }

    public function add_karyawan(Request $r)
    {	
    	
    	$post = new \App\User;
        $post->nama = Input::get('nama');
    	$post->job_id = Input::get('job_id');
    	$post->gaji = Input::get('pekerjaan');
    	$post->divisi = Input::get('divisi');
    	$post->code_div = Input::get('code_div');
    	$post->tgl_lahir = Input::get('tgl_lahir');
    	$post->jenis_kelamin = Input::get('jenis_kelamin');
    	$post->alamat = Input::get('alamat');
        $post->no_hp = Input::get('no_hp');
        $post->email = Input::get('email');
        $post->roles = Input::get('roles');
        $post->umur = Input::get('umur');
        $post->norek = Input::get('norek');
        $post->uang_makan = Input::get('uang_makan');
        $post->password= bcrypt(Input::get('password'));
        
        if(Input::hasFile('photo')){
            $photo = date("YmdHis")
            .uniqid()
            ."."
            .Input::file('photo')->getClientOriginalExtension();
        
            Input::file('photo')->move(storage_path(),$photo);
            $post->photo = $photo;
        }
    	$post->save();
    	return redirect('karyawan');
    }

    public function view_karyawan()
    {
        return view('admin.karyawan.karyawan',['employee' => User::paginate(10)],
                                              ['kar' => Job::paginate(10)]);

        // $employee = User::paginate(10);

        // foreach ($employee as $key => $data) {
        //     $divisi = \App\Divisi::whereId($data->divisi)->first();
        //     $kara = \App\Job::whereId($data->job_id)->first();

        //     echo $divisi->nama;
        // }
        // // dd($employee);
    }

    public function AjaxPekerjaan($id)
    {
    	// $data = \App\Job::where(['name'=>$karyawan])->first();
    	// echo "<option value=".$data->pekerjaan.">".$data->pekerjaan."</option>";
    	$gaji  = \App\Job::find($id);
    	return response()->json($gaji);
    }
	
	public function AjaxDivisi($id)
	    {
	    	$divisi  = \App\Divisi::find($id);
    		return response()->json($divisi);
	    }    
	public function view_adduser()
	{
		return view('admin.user.tambah');
	}

    public function view_user()
    {   
        // User::where('roles', 'user')->get()
        // if () {
            // if (User::find('roles') =='user') {   
                return view('admin.user.user',['user'=> User::whereRoles('user')->paginate(10)]);
            // }
        // }
    }

    public function add_user(Request $r)
    {
        $user = new \App\User;
        $user->nama = Input::get('nama');
        $user->tgl_lahir = Input::get('tgl_lahir');
        $user->jenis_kelamin = Input::get('jenis_kelamin');
        $user->alamat = Input::get('alamat');
        $user->no_hp = Input::get('no_hp');
        $user->email = Input::get('email');
        $user->password = bcrypt(Input::get('password'));

        if(Input::hasFile('photo')){
            $photo = date("YmdHis")
            .uniqid()
            ."."
            .Input::file('photo')->getClientOriginalExtension();
        
            Input::file('photo')->move(storage_path(),$photo);
            $user->photo = $photo;
        }

        $user->save();
        return redirect('user');
    
    }

    public function delete_kar($id)
    {
        User::destroy($id);
        return redirect('karyawan');
    }

    public function delete_user($id)
    {
        User::destroy($id);
        return redirect('user');
    }

    public function detail($id)
    {
        return view('admin.karyawan.detail',['detail' =>  User::find($id)]);
    }

    public function view_reportjob()
    {   
        $User = User::find(Input::get('job_id'));
        $job = array('job'=> Job::where('name', '=',$User));
        $pdf = PDF::loadView('admin.pekerjaan.reportjob');
        return $User;
        // return view('admin.pekerjaan.reportjob')->with($job);
        // return $pdf->stream('data.pdf');
        /*$data['data'] = User::where('job_id',Input::get('job_id'))->get();*/
    }

    public function payroll()
    {
        return view('admin.payroll.payroll',['job' => Job::paginate(100)],
                                            ['employee' => User::paginate(100)]);
    }

    public function viewedit_karyawan($id)
    {
        return view('admin.karyawan.edit',['edit' =>  User::find($id),
                                            'div' => Divisi::get(),
                                            'kar' => Job::get()]);
    }

    public function edit_karyawan(Request $r)
    {
        $this->validate($r, [
        'nama' => 'required',
        'job_id' => 'required',
        // 'pekerjaan' => 'required',
        'divisi' => 'required',
        'code_div' => 'required',
        'tgl_lahir' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'umur' => 'required',
        'norek' => 'required',
        'photo' => 'required',
        'uang_makan' => 'required',
        'email' => 'required',
        'password' => 'required',
        ]);

            $emp = User::find($r->id);
            $emp->nama = $r->nama;
            $emp->job_id =$r->job_id;
            // $emp->pekerjaan = $r->pekerjaan;
            $emp->divisi = $r->divisi;
            $emp->code_div = $r->code_div;
            $emp->tgl_lahir = $r->tgl_lahir;
            $emp->jenis_kelamin = $r->jenis_kelamin;
            $emp->alamat = $r->alamat;
            $emp->umur = $r->umur;
            $emp->no_hp = $r->no_hp;
            $emp->norek = $r->norek;
            $emp->uang_makan = $r->uang_makan;
            $emp->email = $r->email;
            $emp->password = bcrypt($r->password);

            if(Input::hasFile('photo')){
            $photo = date("YmdHis")
            .uniqid()
            ."."
            .Input::file('photo')->getClientOriginalExtension();
        
            Input::file('photo')->move(storage_path(),$photo);
            $emp->photo = $photo;
            }

            $emp->save();
            return redirect('karyawan');
    }

    public function errorpage()
    {
        return view('errors.503');
    }

    public function chat()
    {
        date_default_timezone_set('Asia/Jakarta');
        $receiver = $request->input('receiver');
        $content = htmlspecialchars($request->input('content'));

        $validator = Validator::make($request->all(),[
            'receiver'  =>  'required',
            'content'   =>  'required',
            ]);

        if ($validator->fails()) {
            return redirect('dashboard');
        }
        else {

        }
    }
    public function view_addAdmin()
    {
        return view('admin.admin.addAdmin',['kar' => Job::paginate(100)],
                                            ['div' => Divisi::paginate(100)]);
    }
    public function post_admin(Request $r)
    {   
        $admin = new \App\User;
        $admin->nama = Input::get('nama');
        $admin->job_id = Input::get('job_id');
        $admin->gaji = Input::get('pekerjaan');
        $admin->divisi = Input::get('divisi');
        $admin->code_div = Input::get('code_div');
        $admin->tgl_lahir = Input::get('tgl_lahir');
        $admin->jenis_kelamin = Input::get('jenis_kelamin');
        $admin->alamat = Input::get('alamat');
        $admin->no_hp = Input::get('no_hp');
        $admin->email = Input::get('email');
        $admin->roles = Input::get('roles');
        $admin->umur = Input::get('umur');
        $admin->norek = Input::get('norek');
        $admin->uang_makan = Input::get('uang_makan');
        $admin->password= bcrypt(Input::get('password'));
        
        if(Input::hasFile('photo')){
            $photo = date("YmdHis")
            .uniqid()
            ."."
            .Input::file('photo')->getClientOriginalExtension();
        
            Input::file('photo')->move(storage_path(),$photo);
            $admin->photo = $photo;
        }
        $admin->save();
        return redirect('dataAdmin');
    }

    public function data_admin()
    {
        return view('admin.admin.admin',['emp' => User::whereRoles('admin')->paginate(10)],
                                        ['kar' => Job::paginate(10)]);
    }
    public function delete_admin($id)
    {
        User::destroy($id);
        return redirect('dataAdmin');   
    }
    public function detail_admin($id)
    {
        return view('admin.admin.detail',['detail' =>  User::find($id)]);
    }

    public function view_edit_admin($id)
    {
         return view('admin.admin.edit',['edit' =>  User::find($id),
                                            'div' => Divisi::get(),
                                            'kar' => Job::get()]);
    }
    public function post_edit_admin(Request $r)
    {
        $this->validate($r, [
        'nama' => 'required',
        'job_id' => 'required',
        'divisi' => 'required',
        'code_div' => 'required',
        'tgl_lahir' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required',
        'umur' => 'required',
        'norek' => 'required',
        'uang_makan' => 'required',
        'email' => 'required',
        'photo' => 'required',
        'password' => 'required'
        ]);

            $emp = User::find($r->id);
            $emp->nama = $r->nama;
            $emp->job_id =$r->job_id;
            $emp->divisi = $r->divisi;
            $emp->code_div = $r->code_div;
            $emp->tgl_lahir = $r->tgl_lahir;
            $emp->jenis_kelamin = $r->jenis_kelamin;
            $emp->alamat = $r->alamat;
            $emp->umur = $r->umur;
            $emp->no_hp = $r->no_hp;
            $emp->norek = $r->norek;
            $emp->uang_makan = $r->uang_makan;
            $emp->email = $r->email;
            $emp->password = bcrypt($r->password);

            if(Input::hasFile('photo')){
            $photo = date("YmdHis")
            .uniqid()
            ."."
            .Input::file('photo')->getClientOriginalExtension();
        
            Input::file('photo')->move(storage_path(),$photo);
            $emp->photo = $photo;
            }
            $emp->save();
            return redirect('dataAdmin');
    }

    
}