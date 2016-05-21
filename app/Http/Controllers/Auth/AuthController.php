<?php

namespace App\Http\Controllers\Auth;

use App\pegawai;
use Validator;
use App\Http\Controllers\Controller;
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
      $username = $r->input('email');
      $password = $r->input('password');
      $remember = ($r->input('remember')) ? true : false;

      if (Auth::attempt(['email' => $username, 'password' => $password],$remember)) {
        if (Auth::viaRemember()) {
          return redirect('admin');
        }
        return redirect('admin');
      }

      $msgclass = "danger";
      $msg = "Email atau password tidak valid";
      return redirect('login')->with('msgclass',$msgclass)->with('msg',$msg)->withInput();
    }

    public function getLogout()
    {
      Auth::logout();
      return redirect('home');
    }
}
