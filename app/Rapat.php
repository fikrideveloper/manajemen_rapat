<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    //
    protected $table = 'rapat';
    protected $fillable = [
        'nama_rapat', 'tanggal_rapat', 'waktu_rapat', 'kategori', 'gambar', 'hasil_rapat',
    ];
}
