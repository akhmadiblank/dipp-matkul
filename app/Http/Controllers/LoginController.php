<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'password' => ['required', 'min:3']
        ]);
        // $password = 'admin';
        // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        // dd($hashed_password);  

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('jadwal');
        }

        return back()->with('loginError', 'your login is failed');
    }

    public function logout(request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
