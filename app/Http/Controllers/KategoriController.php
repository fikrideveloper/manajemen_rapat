<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan semua data kategori ke preview kategori
    public function index(){
        $datasemua = Kategori::get()->all();
        $datasemua = Kategori::paginate(5);
        return view('manajemen_kategori.preview_kategori',[
            'rekapkategori' => $datasemua
        ]);
    }

    public function edit($id){
        // $ambil_kategori = Kategori::where('id',$id)->first();
        return view('manajemen_kategori.edit_kategori',[
            'ambil_kategori'=> Kategori::where('id',$id)->first()
        ]);

    }

    public function update(Request $request, $id){
        $request->validate([
            'kode' => 'required|numeric',
            'nama_kategori' =>'required',


        ],[
            'kode.required' => 'Kode harus diisi',
            'kode.numeric' => 'Kode harus berisikan nomor',
            'nama_kategori.required' => 'Kategori harus diisi'
        ]);

        $update = [
            'kode_kategori' => $request->kode,
            'kategori' => $request->nama_kategori,
        ];

        $proses = Kategori::where('id', $id)->update($update);

        if ($proses) {

            toast('Kategori berhasil diedit !!','success');

            return redirect('/kategori_rapat');

        } else{
            toast('Kategori gagal diedit !!','error');

        }
    }

    // Memproses fungsi tambah data ke database
    public function create_kategori(Request $request){
        $request->validate([
            // validasi kode kategori dengan input hanya angka
            'kode' =>'required|numeric',
            'nama_kategori' => 'required'
        ],[
            'kode.required' => 'Kode harus diisi',
            'kode.numeric' => 'Kode harus berisikan nomor',
            'nama_kategori.required' => 'Kategori harus diisi'
        ]);

        $tambah = [
            'kode_kategori' => $request->kode,
            'kategori' => $request->nama_kategori
        ];

        $proses_nambah = Kategori::create($tambah);
        if ($proses_nambah) {
            toast('Kategori telah ditambahkan!!','success');
            return redirect('/kategori_rapat');
        }
        

    }

    // Menghapus data
    public function delete($id){
        $hapus = Kategori::where('id',$id)
                ->first()
                ->delete();
        if ($hapus) {
            toast('Kategori Berhasil dihapus !!','success');
            return redirect('/kategori_rapat');
        }


        

    }

    
}
