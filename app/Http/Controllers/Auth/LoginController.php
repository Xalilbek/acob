<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/admin/';

    public function username()
    {
        return "username";
    }

    public function login(Request $request)
    {
        $validator = validator($request->all(),[
            'username' => 'required|string|exists:users,username|min:3|max:30',
            'password' => 'required|min:6|max:30'
        ]);

        if ($validator->fails()){
            session()->flash('message','İstifadəçi adı və ya şifrə yanlışdır');
            return redirect()->back();
        }
        else{
            if (auth()->attempt($request->only('username','password'))){
                return redirect()->route('admin.statistics');
            }
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
