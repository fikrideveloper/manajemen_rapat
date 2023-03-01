<?php

namespace App\Http\Controllers;

use App\Rapat;
use Illuminate\Http\Request;

class  RapatController extends Controller
{
    //
    public function index(){

        // $data_rapat = Rapat::all();
        return view('manajemen_rapat.preview_data',[
            'data_rapat' => Rapat::paginate(5)
        ]);
    }


    public function tambah(){
        return view('manajemen_rapat.tambah_rapat');
    }

    public function create_data(Request $request){

        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'kategori' => 'required',
            'hasil' => 'required',
            
        ],[
            'nama.required' => 'Nama harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
            'waktu.required' => 'Waktu harus diisi',
            'kategori.required' => 'Kategori harus diisi',
            'hasil.required' => 'Hasil Rapat harus diisi',
        ]);

        $tambah = [
            'nama_rapat' => $request->nama,
            'tanggal_rapat' => $request->tanggal,
            'waktu_rapat' => $request->waktu,
            'kategori' => $request->kategori,
            'hasil_rapat' => $request->hasil,
        ];


        Rapat::create($tambah);
        // Rapat::create([
        //     'nama_rapat' => $request->nama,
        //     'tanggal_rapat' => $request->tanggal,
        //     'waktu_rapat'=> $request->waktu,
        //     'kategori' => $request->kategori,
        //     'gambar' => $request->dokumentasi,
        //     'hasil_rapat' => $request->hasil,
        // ]);
        // dd($request->all());

        return redirect('/preview_rapat')->with('success', 'Data berhasil ditambahkan !!');
    }

    public function delete($id){

        $hapus = Rapat::findOrFail($id);
        $hapus->delete();

        if ($hapus) {
            return redirect('/preview_rapat')->with('success', 'Berhasil Dihapus');

        }
        
    }

}
