<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Absen;
use App\Daftar_gaji;
use App\Divisi;
use App\Gaji;
use App\Job;
Use DB;
use Validator;
use App\Lembur;
use App\Notif;
use PDF;
use App\Roles;
use App\pegawai;
use App\User;
use Illuminate\Support\Facades\Input;


use App\Http\Requests;
use App\Http\Controllers\Controller;
class AdminController extends Controller
{
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
    	
    	$post = new \App\pegawai;
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
    	return view('admin.karyawan.karyawan',['employee' => pegawai::paginate(10)],
                                            ['kar' => Job::paginate(100)]);
    }

    public function AjaxPekerjaan($id)
    {
    	// $data = \App\Job::where(['name'=>$karyawan])->first();
    	// echo "<option value=".$data->pekerjaan.">".$data->pekerjaan."</option>";
    	$gaji  = \App\Job::find($id);
    	echo $gaji;
    }
	
	public function AjaxDivisi($id)
	    {
	    	$divisi  = \App\Divisi::find($id);
    		echo $divisi;
	    }    
	public function view_adduser()
	{
		return view('admin.user.tambah');
	}

    public function view_user()
    {
        return view('admin.user.user',['user' => pegawai::paginate(10)]);
    }

    public function add_user(Request $r)
    {
        $user = new \App\pegawai;
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
        pegawai::destroy($id);
        return redirect('karyawan');
    }

    public function detail($id)
    {
        return view('admin.karyawan.detail',['detail' =>  pegawai::find($id)]);
    }

    public function view_reportjob()
    {   
    $data['data'] = pegawai::where('job_id',Input::get('job_id'))->get();
    $pdf = PDF::loadView('admin.pekerjaan.reportjob', $data);
    return $pdf->stream('data.pdf');
    }
}
