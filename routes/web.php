<?php

use App\Http\Controllers\ProfileController;
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

    Route::get('/akun_profil','ProfileController@edit');
    Route::post('/update_profile', 'ProfileController@update')->name('update_profile');

    Route::get('/preview_rapat','RapatController@index');
    Route::get('/tambah_rapat', 'RapatController@tambah');
    Route::post('/create_rapat', 'RapatController@create_data');

    Route::get('/hapus_data_rapat/{id}','RapatController@delete');
});









