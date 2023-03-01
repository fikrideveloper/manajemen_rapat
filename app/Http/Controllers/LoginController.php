<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    //
    // public function login(){
    //     return view('login');
    // }

    public function postlogin(Request $request){
        // dd($request->all());

        if (Auth::attempt($request->only('email','password'))) {
            return redirect('dashboard');
        
        }
        return redirect('login')->with(['errors', 'Anda gagal login']);
        

    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/login');
    }
}
