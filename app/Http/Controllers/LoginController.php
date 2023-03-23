<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
        Alert::error('Username / Password Salah !!');
        return redirect('login');
        

    }

    public function logout(Request $request){
        Auth::logout();

        Alert::success('Berhasil LOGOUT !!');
        return redirect('/login');
    }

    public function register(){
        return view('account.register');
    }

    public function create(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $create = [
            'name' =>$request->nama,
            'email' =>$request->email,
            'password' => Hash::make($request->password)
        ];

        User::create($create);

        return redirect('/login')->with('success', 'Berhasil membuat Akun');
        // return redirect('/preview_rapat')->with('success', 'Data berhasil ditambahkan !!');
    }
}
