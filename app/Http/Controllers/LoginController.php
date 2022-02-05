<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
    return view('login.login');
    }

    public function authenticate(Request $request)
{
    $credentails = $request->validate([
        'email'=>['required', 'email'],
        'password'=>['required'],
    ]);

    if (Auth::attempt($credentails)){
        $request->session()->regenerate();

        return redirect(RouteServiceProvider::HOME);
    }

    return back()->withErrors([
        'email'=>'Username atau password salah.',
    ]);
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
}