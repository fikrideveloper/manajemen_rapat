<?php

namespace App\Http\Controllers;

use App\Rapat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
            'dokumentasi' => 'file|image|nullable|mimes:jpg,png,jpeg', 
            'hasil' => 'required',
            
        ],[
            
            'nama.required' => 'Nama harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
            'waktu.required' => 'Waktu harus diisi',
            'kategori.required' => 'Kategori harus diisi',
            'dokumentasi.image' => 'Dokumen harus JPG, PNG, atau PNG',
            // 'dokumentasi.mimes' => 'Dokumen harus JPG, PNG, atau PNG',
            'hasil.required' => 'Hasil Rapat harus diisi',
        ]);

        $file = $request->file('dokumentasi');
        $ambil_nama = date('d-m-Y');

        $angka_acak = rand(1,999)."_".$file->getClientOriginalName();

        $nama_file = $ambil_nama."_".$angka_acak;
        $tujuan_uploud = 'image';
        $file->move(public_path($tujuan_uploud,$nama_file));

        $tambah = [
            'nama_rapat' => $request->nama,
            'tanggal_rapat' => $request->tanggal,
            'waktu_rapat' => $request->waktu,
            'kategori' => $request->kategori,
            'gambar' => $nama_file,
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

            toast('Data Berhasil Dihapus','success');
            // Alert::toast('Toast Message', 'Toast Type');
            return redirect('/preview_rapat');

        }
        
    }

}
