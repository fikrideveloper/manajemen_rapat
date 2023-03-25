<?php

use App\Http\Controllers\ProfileController;
use App\Rapat;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/login',function(){
    return view('login');

    // name ini diambil dari middleware auth
})->name('loginn');

// name postloginn tersebut diambil dari form login blade
Route::post('/postlogin','LoginController@postlogin')->name('postloginn');

Route::get('/logout','LoginController@logout')->name('logout');

Route::get('/register_akun', 'LoginController@register');

Route::post('/create_register', 'LoginController@create');

// middleware disini berfungsi untuk mencegah user masuk ke web sebelum login
Route::group(['middleware' => ['auth']], function(){

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', 'DashboardController@index');
    
    Route::get('/charts', 'ChartsController@charts');

    Route::get('/akun_profil',function(){
        return view('account.edit');
    });
    Route::post('/update_profile', 'ProfileController@update')->name('update_profile');

    Route::post('/hapus_profile','ProfileController@hapusgambar')->name('hapus_profile');

    // Menampilkan seluruh data rapat
    Route::get('/preview_rapat','RapatController@index');

    // Fitur Search data rapat
    Route::get('/preview_rapat/search','RapatController@search');

    // Menampilkan data rapat sesuai request id
    Route::get('/view_rapat/{id}','RapatController@view');

    // Menampilkan halaman tambah data rapat
    Route::get('/tambah_rapat', 'RapatController@tambah');

    // Proses tambah data rapat ke database
    Route::post('/create_rapat', 'RapatController@create_data');

    Route::get('/edit_rapat/{id}','RapatController@edit');

    Route::post('/update_rapat/{id}', 'RapatController@update');

    Route::get('/hapus_data_rapat/{id}','RapatController@delete');

    Route::get('/kategori_rapat', 'KategoriController@index');

    Route::get('/edit_kategori/{id}', 'KategoriController@edit');

    Route::post('/update_kategori/{id}', 'KategoriController@update');

    Route::get('/hapus_kategori/{id}', 'KategoriController@delete');
    
    // Manajemen Kategori
    Route::get('/tambah_kategori', function(){
        return view('manajemen_kategori.tambah_kategori');
    });

    Route::post('/create_kategori', 'KategoriController@create_kategori');

});









