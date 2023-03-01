<?php

namespace App\Http\Controllers;

use App\Rapat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        

        // $total_rapat = Rapat::get()->count();
        $total_rapat = Rapat::count();

        return view('dashboard', compact('total_rapat'));

        // dd($total_rapat);
    }
}
