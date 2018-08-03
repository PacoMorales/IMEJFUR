<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
     public function login()
    {
        $credentials =  $this->validate(request(),[
            'FOLIO' => 'integer|required',
            'LOGIN' => 'min:10|max:50|email|required',
            'PASSWORD' => 'min:6|max:25|alpha_num|required'
            ]);

        //return $credentials;

        if(Auth::attempt($credentials))
        {
            return('Existe en BD');
        }

        return back()->withErrors(['Folio' => 'No se encontro un folio.']);
    }

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

    //use AuthenticatesUsers; 

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    //public function __construct()
    //{
    //    $this->middleware('guest')->except('logout');
    //}
}
