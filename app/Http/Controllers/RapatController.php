<?php

namespace App\Http\Controllers;

use App\Kategori;
use File;
use App\Rapat;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class  RapatController extends Controller
{
    //
    public function index(){

        $data_semua = Rapat::paginate(5);
        $total_rapat = Rapat::count();
        return view('manajemen_rapat.preview_data',[
            'data_rapat' => $data_semua,
            'total_rapat' => $total_rapat
        ]);
    }

    public function search(Request $request){
        $cari = $request->search;

        // Fitur searching untuk mencari data sesuai kolom database
        $cari_rapat= Rapat::where('nama_rapat', 'like','%'.$cari.'%')
                            ->orWhere('kategori', 'like', '%'.$cari. '%')
                            ->orWhere('hasil_rapat', 'like', '%'.$cari. '%')
                            ->orWhere('tanggal_rapat', 'like', '%'.$cari. '%');

        $cari_rapat = $cari_rapat->paginate(5);       
        $cari_rapat = $cari_rapat->appends($request->all());
        $total_rapat = $cari_rapat->count();
        
        // Mengirim request cari data dari user ke halaman preview data
        return view('manajemen_rapat.preview_data',
        ['data_rapat' => $cari_rapat], 
        ['total_rapat' => $total_rapat]
            
        );

    }

    public function view($id){

        // $data_rapat = Rapat::all();
        return view('manajemen_rapat.view',[
            'data_rapat' => Rapat::where('id',$id)->first()

        ]);
    }

    public function edit($id){
        $kategori = Kategori::get()->all();
        return view('manajemen_rapat.edit_rapat', [
            'edit_rapat' => Rapat::where('id', $id)->first(),
            'kategori_rapat' => $kategori
        ]);
    }

    public function update(Request $request,$id){
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'kategori' => 'required',
            'dokumentasi' => 'file|image|nullable|mimes:jpg,png,jpeg|max:10240', 
            'hasil' => 'required',
            
        ],[
            
            'nama.required' => 'Nama harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
            'waktu.required' => 'Waktu harus diisi',
            'kategori.required' => 'Kategori harus diisi',
            'dokumentasi.image' => 'Dokumen harus JPG, PNG, atau PNG',
            'dokumentasi.max' => 'Dokumen Maksimal 10MB',
            // 'dokumentasi.mimes' => 'Dokumen harus JPG, PNG, atau PNG',
            'hasil.required' => 'Hasil Rapat harus diisi',
        ]);

        if (request()->file('dokumentasi')) {

            if ($request->old_image) {
                
                File::delete('data_gambar/'.$request->old_image);
            }

            $gambar= $request->file('dokumentasi');
            $tanggal = date('d-m-Y');
            $angka_acak = rand(1,999);

            $ambil_nama = $gambar->getClientOriginalName();

            $nama_file = $tanggal."_".$angka_acak."_".$ambil_nama;

            $gambar->move('data_gambar/',$nama_file);


        } else {
            // jika user tidak mengganti gambar maka perbolehkan update data tanpa gambar
            $gambar= null;

            // Jika user tidak mengganti gambar maka biarkan gambar yang lama
            $nama_file = $request->old_image;
        }


        $edit =[
            'nama_rapat' => $request->nama,
            'tanggal_rapat' => $request->tanggal,
            'waktu_rapat' => $request->waktu,
            'kategori' => $request->kategori,
            'gambar' => $nama_file,
            'hasil_rapat' => $request->hasil,
            
            
        ];

        $rapat = Rapat::where('id',$id)->update($edit);

        if ($rapat) {
            toast('Update Rapat Berhasil !!','success');
            // Alert::success('Update Rapat Berhasil !!');
            return redirect('/preview_rapat');
        }
        
    }


    public function tambah(){
        // Mengirim data kategori ke inputan tambah rapat
        $kategori = Kategori::get()->all();

        return view('manajemen_rapat.tambah_rapat',[
            'kategori_rapat' => $kategori

        ]);
    }

    public function create_data(Request $request){

        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'waktu' => 'required',
            'kategori' => 'required',
            'dokumentasi' => 'file|image|nullable|mimes:jpg,png,jpeg|max:10240', 
            'hasil' => 'required',
            
        ],[
            
            'nama.required' => 'Nama harus diisi',
            'tanggal.required' => 'Tanggal harus diisi',
            // 'tanggal.unique'=> 'Tanggal rapat sudah ada',
            'waktu.required' => 'Waktu harus diisi',
            'kategori.required' => 'Kategori harus diisi',
            'dokumentasi.image' => 'Dokumen harus JPG, PNG, atau PNG',
            'dokumentasi.max' => 'Dokumen Maksimal 10MB',
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
        $respon = Rapat::create($tambah);
        if ($respon) {
            toast('Data Berhasil ditambahkan!!', 'success');
            return redirect('/preview_rapat');
        }
        
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
