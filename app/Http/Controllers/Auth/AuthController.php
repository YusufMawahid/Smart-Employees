<?php

namespace App\Http\Controllers\Auth;


use App\User;
use App\Divisi;
use App\Job;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

use Illuminate\Support\Facades\Input;
class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    //protected $redirectTo = '/';
    protected $redirectTo = '/';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    
    

    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /*public function postLogin()
    {
        # code...
    }*/
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
   
    public function getLogin()
    {
      return view('login.login');
    }

    public function postLogin(Request $r)
    {
    $email = Input::get('email');
    $password = Input::get('password');

        if (Auth::attempt(['email'=>$email,'password'=>$password])) {
            if (Auth::User()->roles=='admin') {   
                return redirect('admin');
            }

            else if (Auth::User()->roles=='user') {
                return redirect('home_user');
            }
        }
        else{
            return 'Password salah';
        }
    }

    public function getLogout()
    {
      Auth::logout();
      return redirect('home');
    }

    public function getRegister()
    {
        return view('login.register',['kar' => Job::paginate(100)],
                                      ['div' => Divisi::paginate(100)]);
    }

    public function postRegister()
    {
        $akun = new \App\User;
        $akun->nama = Input::get('nama');
        $akun->job_id = Input::get('job_id');
        $akun->gaji = Input::get('gaji');
        $akun->divisi = Input::get('divisi');
        $akun->code_div = Input::get('code_div');
        $akun->tgl_lahir = Input::get('tgl_lahir');
        $akun->jenis_kelamin = Input::get('jenis_kelamin');
        $akun->alamat = Input::get('alamat');
        $akun->no_hp = Input::get('no_hp');
        $akun->norek = Input::get('norek');
        $akun->umur = Input::get('umur');
        $akun->status = Input::get('status');
        $akun->uang_makan = Input::get('uang_makan');
        $akun->roles = Input::get('roles');
        $akun->email = Input::get('email');
        $akun->password = bcrypt(Input::get('password'));

         if(Input::hasFile('photo')){
            $photo = date("YmdHis")
            .uniqid()
            ."."
            .Input::file('photo')->getClientOriginalExtension();
        
            Input::file('photo')->move(storage_path(),$photo);
            $akun->photo = $photo;
        }      
        $akun->save();
        return redirect('login');
    }
}
