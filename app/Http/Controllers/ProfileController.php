<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;


class ProfileController extends Controller
{
    //
    public function edit(){
        
        return view('account.edit');
    }

    public function update(Request $request){

        $request->validate([

            'name'  => 'required',
            'level' => 'required',
            'email' => 'required'
        ],[
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
            
            'level.required' => 'Hak Akses tidak dapat dirubah !!',
            'level.min' => 'Hak Akses tidak dapat dirubah !!'
        ]);

        $edit =[
            'id'    => $request->idUpdate,
            'name'  => $request->name,
            'email' => $request->email
            // 'level' => $request->level
            
            
        ];

        // return dd($edit);

        \DB::table('users')->where('id',$request->idUpdate)->update($edit);
        return redirect()->back()->with(['success'=> 'Update Profil  berhasil !!']);

    }
}
