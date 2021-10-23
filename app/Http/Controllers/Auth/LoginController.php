<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo()
    {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.home');
        } elseif (Auth::user()->hasRole('citizen')) {
            return redirect()->route('citizen.home');
        } elseif (Auth::user()->hasRole('paramedic')) {
            return redirect()->route('paramedic.home');
        } elseif (Auth::user()->hasRole('vaccination-center')) {
            return redirect()->route('vaccinaiton_center.home');
        }
        Auth::logout();
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
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.home');
        } elseif (Auth::user()->hasRole('citizen')) {
            return redirect()->route('citizen.home');
        } elseif (Auth::user()->hasRole('paramedic')) {
            return redirect()->route('paramedic.home');
        } elseif (Auth::user()->hasRole('vaccination-center')) {
            return redirect()->route('vaccination_center.home');
        }
        Auth::logout();
    }
}
