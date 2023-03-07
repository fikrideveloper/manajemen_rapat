<?php

namespace App\Http\Controllers;

use File;
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

    public function view($id){

        // $data_rapat = Rapat::all();
        return view('manajemen_rapat.view',[
            'data_rapat' => Rapat::where('id',$id)->first()

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

        

        
        // $tujuan_uploud = 'image';

        // Jika user menambahkan gambar maka segera proses hasil inputannya
        if (request()->file('dokumentasi')){

            $gambar = $request->file('dokumentasi');
            $tanggal = date('d-m-Y');
            $angka_acak = rand(1,999);

            $nama_ambil = $gambar->getClientOriginalName();

            $nama_file = $tanggal."_".$angka_acak."_".$nama_ambil;    

            $gambar->move('data_gambar/', $nama_file);

        } else {

            // jika user tidak menambahkan gambar maka perbolehkan untuk menambah data
            $gambar = null;
            $nama_file = null;
        }
        

        // ambil semua data dari request (permintaan) dari user 
        $tambah = [ 
            'nama_rapat' => $request->nama,
            'tanggal_rapat' => $request->tanggal,
            'waktu_rapat' => $request->waktu,
            'kategori' => $request->kategori,
            'gambar' => $nama_file,
            'hasil_rapat' => $request->hasil,
        ];


        // kirim hasil inputan user ke database 
        Rapat::create($tambah);
        return redirect('/preview_rapat')->with('success', 'Data berhasil ditambahkan !!');
    }

    public function delete($id){

        // $hapus = Rapat::findOrFail($id);
        $hapus = Rapat::where('id',$id)->first();
        // hapus file dengan mengambil modal File
        File::delete('data_gambar/'.$hapus->gambar);

        // hapus data
        $hapus_gambar= Rapat::where('id',$id)->delete();
        
        // Jika berhasil terhapus maka tampilkan alert
        if ($hapus_gambar) {
            toast('Data Berhasil Dihapus','success');
            // Alert::toast('Toast Message', 'Toast Type');
            return redirect('/preview_rapat');

        }
        
        
    }

}
