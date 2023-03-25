<?php

namespace App\Http\Controllers;

use File;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    //
    // public function edit(){
        
    //     return view('account.edit');
    // }


    public function update(Request $request){

        $request->validate([

            'name'  => 'required',
            'email' => 'required'
        ],[
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Email harus diisi',
        ]);

        if (request()->file('gambar_profile')) {

            if ($request->old_image) {
                
                File::delete('data_gambar/profile_image/'.$request->old_image);
                
                // if ($request->old_image) {
                //     User::where(Auth::user()->image)->delete();
                // }
                
            } 

            $gambar= $request->file('gambar_profile');
            $tanggal = date('d-m-Y');
            $angka_acak = rand(1,999);

            $ambil_nama = $gambar->getClientOriginalName();

            $nama_file = $tanggal."_".$angka_acak."_".$ambil_nama;

            $gambar->move('data_gambar/profile_image/',$nama_file);


        } else {
            $gambar= null;

            // Jika user tidak mengganti gambar maka biarkan gambar yang lama
            $nama_file = Auth::user()->image;
        }


        $edit =[
            'id'    => $request->idUpdate,
            'name'  => $request->name,
            'email' => $request->email,
            'image' => $nama_file
            // 'level' => $request->level
            
            
        ];

        // return dd($edit);

        User::where('id',$request->idUpdate)->update($edit);
        

        Alert::success('Update Profil Berhasil !!');
        return redirect()->back();

    }

    public function hapusgambar(Request $request){
        if (Auth::user()->image) {
            
           $hapus_file = File::delete('data_gambar/profile_image/'.Auth::user()->image);
        //    $hapus_file = User::where(Auth::user()->image)->delete();

            $hapus_data = User::where(Auth::user()->image)->delete();

            return redirect()->back();    

        } else{
            $hapus_file = null;
            $hapus_data = null;
        }
        
    }
}
