<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Rapat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        
        // Menampilkan jumlah data Rapat ke Dashboard
        $total_rapat = Rapat::count();

        // Menampilkan jumlah data Kategori ke Dashboard
        $total_kategori = Kategori::count();

        // Kirim hasil jumlah data Rapat & Kategori ke Dashboard Page
        return view('dashboard',[
            'total_rapat' => $total_rapat,
            'total_kategori' => $total_kategori
        ]);
    }
}
