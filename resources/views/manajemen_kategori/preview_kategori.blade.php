@extends('layouts.main_new')

@section('title', 'Kategori Rapat')

@section('dropdown_kategori', 'show')

@section('menu_kategori','active')

@section('fitur_search')
    <form class="search-form d-flex align-items-center" method="get" action="/kategori_rapat/search">
      <input type="text" value="{{ request('search') }}" name="search" placeholder="Search" title="Enter search keyword">
      <button type="submit" title="Search"><i class="bi bi-search"></i></button>
    </form>
@endsection

@section('menu')
    <li class="breadcrumb-item">Manajemen Kategori</li>
    <li class="breadcrumb-item active">Kategori Rapat</li>
@endsection

@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Data Kategori Rapat</h5>
    
                <!-- Table with stripped rows -->
                <table class="table table-striped">
                  <thead>
                    <tr>
                      {{-- <th scope="col"></th> --}}
                      <th scope="col">Kode Kategori</th>
                      <th scope="col">Nama Kategori</th>
                      <th scope="col" class="col-2">Aksi</th>
                    </tr>
                  </thead>
                    
                        
                    <tbody>
                      @foreach ($rekapkategori as $kategori)
                    <tr>
                      <td>{{ $kategori->kode_kategori }}</td>
                      <td>{{ $kategori->kategori }}</td>
                      <td><a href="/edit_kategori/{{ $kategori->id }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a> <a href="/hapus_kategori/{{ $kategori->id }}" class="btn btn-danger" onclick="return confirm('Yakin ingin MENGHAPUS?');"><i class="bi bi-trash-fill"></i></a></td>
                    </tr>
                    @endforeach
                  </tbody>
                  
                   
                    
                    

                  
                </table>

                {{ $rekapkategori->links() }}
                
                
                
                <!-- End Table with stripped rows -->
    
              </div>
              
            </div>
            
    
            
    
           
            
          </div>
          
      
    </div>
  </section>

  @include('sweetalert::alert')

@endsection