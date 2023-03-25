@extends('layouts.main_new')

@section('title','View Data Rapat')

@section('dropdown_rapat', 'show')

@section('menu_data_rapat', 'active')

@section('menu')
    <a href="/preview_rapat" class="breadcrumb-item">Manajemen Rapat</a>
    <li class="breadcrumb-item active">View Data Rapat</li>
@endsection

@section('content')

 <section class="section">
      <div class="row align-items-top">
        <div class="col-lg-10">

            
          <!-- Default Card -->
          <div class="card">
            <div class="card-body">
              
                  
              
              
              <h2 class="pagetitle mt-4 text-primary text-center">{{ $data_rapat->nama_rapat }}</h2>
                <p class="text-center mb-0 fw-bold">Waktu Rapat: {{date('H:i', strtotime($data_rapat->waktu_rapat))}}, {{date('d-m-Y', strtotime($data_rapat->tanggal_rapat))}}</p>
              <hr class="hr mb-4">
              
              <center>

                {{-- Jika user menginputkan gambar, maka tampilkan datanya --}}
                @if ($data_rapat->gambar)
                <img class="img-fluid mb-3 rounded shadow p-3 mb-3 " style="max-height: 300px" src="{{ asset('/data_gambar/'.$data_rapat->gambar) }}" alt="{{ $data_rapat->gambar }}">    

                {{-- Jika user tidak menginputkan gambar, maka tampilkan gambar vector rapat --}}
                @else
                <h5>*Tidak ada Dokumentasi</h5>
                <img class="img-fluid mb-3 rounded shadow p-3 mb-3 bg-body-tertiary" style="max-height: 300px" src="{{ asset('rapat.jpg') }}">
                @endif
                
              </center>
              
              
              <p style="text-align: justify">
                  {{ $data_rapat->hasil_rapat }}
              
              </p>

              
            </div>
          </div><!-- End Default Card -->

          

          

          

        </div>

        

        
      </div>
    </section>
@endsection