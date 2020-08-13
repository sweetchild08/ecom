<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }
    protected function authenticated(\Illuminate\Http\Request $request, $user)
    {
        $request->session()->flash('msg.success','successfully logged in');
        if($user->acctype=='admin')
           $this->redirectTo='admin/home';
        redirect()->intended($this->redirectTo);
    }
    protected function loggedOut(\Illuminate\Http\Request $request)
    {
        $request->session()->flash('msg.success','successfully logged out');
        redirect()->intended('login');
    }
}
