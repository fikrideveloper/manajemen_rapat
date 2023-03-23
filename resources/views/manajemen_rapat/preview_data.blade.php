@extends('layouts.main_new')

@section('title', 'Data Rapat')

@section('dropdown_rapat', 'show')

@section('menu_data_rapat','active')

@section('fitur_search')
    <form class="search-form d-flex align-items-center" method="get" action="/preview_rapat/search">
      <input type="text" value="{{ request('search') }}" name="search" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
@endsection

@section('menu')
    <li class="breadcrumb-item">Manajemen Rapat</li>
    <li class="breadcrumb-item active">Preview Data Rapat</li>
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Data Manajemen Rapat</h5>
    
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      {{-- <th scope="col"></th> --}}
                      <th scope="col">No.</th>
                      <th scope="col">Nama Rapat</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Waktu</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Hasil Rapat</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no= 1; ?>

                    @foreach ($data_rapat as $data)
                    <tr>
                      <td>{{ $no }}</td>
                      <td>{{ $data->nama_rapat }}</td>

                      {{-- Date disini untuk mengatur format tanggal dari urut hari ke tahun --}}
                      <td>{{ date('d-m-Y', strtotime($data->tanggal_rapat)) }}</td>

                      {{-- Date H:i ini untuk mengatur format waktu urut jam ke menit dan tidak perlu detik --}}
                      <td>{{ date('H:i', strtotime($data->waktu_rapat)) }} WIB</td>
                      <td>{{ $data->kategori }}</td>
                      <td><a href="/view_rapat/{{ $data->id }}">{{ Str::limit($data->hasil_rapat,15, '...') }}</a></td>
                      <td><a class="btn btn-warning" href="/edit_rapat/{{ $data->id }}"><i class=" bi bi-pencil-square"></i></a> <a class="btn btn-danger" id="#delete" onclick="return confirm('Yakin ingin MENGHAPUS?');"  href="/hapus_data_rapat/{{ $data->id }}"><i class="bi bi-trash-fill"></i></a></td>
                    </tr>
                    <?php $no++; ?>
                    @endforeach
                    
                    

                  </tbody>
                </table>
                
                  {{ $data_rapat->links() }}
                  <span class="text-sm">Hasil data {{ $total_rapat }}</span>
                
                <!-- End Table with stripped rows -->
    
              </div>
            </div>
          </div>
      
    </div>
  </section>

  @include('sweetalert::alert')

@endsection