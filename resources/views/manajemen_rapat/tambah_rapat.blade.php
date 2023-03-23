@extends('layouts.main_new')

@section('title','Tambah Data Rapat')

@section('dropdown_rapat', 'show')

@section('menu_tambah_rapat', 'active')

@section('menu')
    <li class="breadcrumb-item">Manajemen Rapat</li>
    <li class="breadcrumb-item active">Tambah Data Rapat</li>
@endsection

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-11">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Tambah Data Rapat</h5>

            <!-- General Form Elements -->
            <form action="/create_rapat" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Rapat</label>
                <div class="col-sm-10">
                  <input type="text" value="{{ old('nama') }}" name="nama" class="form-control @error('nama') is-invalid @enderror" autofocus placeholder="Masukkan nama rapat"  >
                  @error('nama')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Rapat</label>
                <div class="col-sm-10">
                  <input type="date" value="{{ old('tanggal') }}" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                  @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Waktu Rapat</label>
                <div class="col-sm-10">
                  <input type="time" value="{{ old('waktu') }}" name="waktu" class="form-control @error('waktu') is-invalid @enderror">
                  @error('waktu')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                  <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" aria-label="Default select example">
                    @foreach ($kategori_rapat as $kategori)
                    <option value="{{ $kategori->kategori }}" {{ old('kategori') == $kategori->kategori ? 'selected' : '' }}>{{ $kategori->kategori }}</option>    
                    @endforeach
                    
                    
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </select>
                </div>
              </div>
             

              <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Dokumentasi</label>
                <div class="col-sm-10">
                  <input class="form-control @error('dokumentasi') is-invalid @enderror" name="dokumentasi" value="{{ old('dokumentasi') }}" type="file" id="formFile">
                  <label for="" class="text-danger small">*Opsional</label>
                  @error('dokumentasi')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Hasil Rapat</label>
                <div class="col-sm-10">
                  <textarea name="hasil" class="form-control @error('hasil') is-invalid @enderror" style="" id="" cols="30" rows="10">{{ old('hasil') }}</textarea>
                  @error('hasil')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

     
    </div>
  </section>
@endsection

