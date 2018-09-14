<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function showLoginForm()
    {
        return view('login.login');
    }
    // public function username()
    // {
    //    $login = request()->username;
    //    $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    //    request()->merge([$field => $login]);
    //    return $field;
    // }
    public function login(Request $request)
    {
        if (Auth::attempt(['username'=>$request->username,'password'=>$request->password])) {
            return redirect('home');
        }else{
            return redirect('login')->with('error','Đăng Nhập Thất bại!');
        }
    }
    public function logout()
    {   
        Auth::logout();
        return redirect('login');
    }
}
