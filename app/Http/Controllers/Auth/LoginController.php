<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout','loginShool','loginShoolForm');
    }

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
    public function loginForm($type){

        return view('Auth.login',compact('type'));

    }

    //

    public function login(Request $request){

        if($request->type == 'student'){
            $guardName= 'student';
        }
        elseif ($request->type == 'teacher'){
            $guardName= 'teacher';
        }
        else{
            $guardName= 'web';
        }
        if (Auth::guard($guardName)->attempt(['email' => $request->email, 'password' => $request->password])) {
            if($request->type == 'student'){
                return redirect()->intended(RouteServiceProvider::STUDENT);
            }
            elseif ($request->type == 'teacher'){

                return redirect()->intended(RouteServiceProvider::TEACHER);
            }
            else{
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }else{
            return back()->withErrors([
                'emial' => 'Inccorect emial or password'
            ])->onlyInput('emial');
        }
    }
    public function logout(Request $request,$type)
    {
        Auth::guard($type)->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function loginShoolForm(){
        return view('auth.loginShool');
    }
    public function loginShool(Request $request){
        if (Auth::guard('school')->attempt(['email' => $request->email, 'password' => $request->password])) {
            // dd(true);
                return redirect()->intended(RouteServiceProvider::SHOOL);
        }else{
            // dd(false);
            return redirect()->back()->withErrors([
                'email' => 'Inccorect emial or password'
            ])->onlyInput('email');
        }
    }

}

