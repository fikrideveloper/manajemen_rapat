@extends('layouts.main_new')

@section('title', 'Data Rapat')

@section('dropdown_rapat', 'show')

@section('menu_data_rapat','active')

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
                      <th scope="col">Nama Rapat</th>
                      <th scope="col">Tanggal</th>
                      <th scope="col">Waktu</th>
                      <th scope="col">Kategori</th>
                      <th scope="col">Hasil Rapat</th>
                      <th scope="col">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data_rapat as $data)
                    <tr>
                      <td>{{ $data->nama_rapat }}</td>

                      {{-- Date disini untuk mengatur format tanggal dari urut hari ke tahun --}}
                      <td>{{ date('d-m-Y', strtotime($data->tanggal_rapat)) }}</td>

                      {{-- Date H:i ini untuk mengatur format waktu urut jam ke menit dan tidak perlu detik --}}
                      <td>{{ date('H:i', strtotime($data->waktu_rapat)) }} WIB</td>
                      <td>{{ $data->kategori }}</td>
                      <td><a href="/view_rapat/{{ $data->id }}">{{ Str::limit($data->hasil_rapat,15, '...') }}</a></td>
                      <td><a class="btn btn-warning" href="#"><i class=" bi bi-pencil-square"></i></a> <a class="btn btn-danger" id="#delete" onclick="return confirm('Yakin ingin MENGHAPUS?');"  href="/hapus_data_rapat/{{ $data->id }}"><i class="bi bi-trash-fill"></i></a></td>
                    </tr>
                    @endforeach
                    
                    

                  </tbody>
                </table>
                
                  {{ $data_rapat->links() }}
                
                
                <!-- End Table with stripped rows -->
    
              </div>
            </div>
    
            {{-- <div class="card">
              <div class="card-body">
                <h5 class="card-title">Table with hoverable rows</h5>
    
                <!-- Table with hoverable rows -->
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Position</th>
                      <th scope="col">Age</th>
                      <th scope="col">Start Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>2016-05-25</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Bridie Kessler</td>
                      <td>Developer</td>
                      <td>35</td>
                      <td>2014-12-05</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Ashleigh Langosh</td>
                      <td>Finance</td>
                      <td>45</td>
                      <td>2011-08-12</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Angus Grady</td>
                      <td>HR</td>
                      <td>34</td>
                      <td>2012-06-11</td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>Raheem Lehner</td>
                      <td>Dynamic Division Officer</td>
                      <td>47</td>
                      <td>2011-04-19</td>
                    </tr>
                  </tbody>
                </table>
                <!-- End Table with hoverable rows -->
    
              </div>
            </div> --}}
    
            {{-- <div class="card">
              <div class="card-body">
                <h5 class="card-title">Bordered Table</h5>
                <p>Add <code>.table-bordered</code> for borders on all sides of the table and cells.</p>
                <!-- Bordered Table -->
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Position</th>
                      <th scope="col">Age</th>
                      <th scope="col">Start Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>2016-05-25</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Bridie Kessler</td>
                      <td>Developer</td>
                      <td>35</td>
                      <td>2014-12-05</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Ashleigh Langosh</td>
                      <td>Finance</td>
                      <td>45</td>
                      <td>2011-08-12</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Angus Grady</td>
                      <td>HR</td>
                      <td>34</td>
                      <td>2012-06-11</td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>Raheem Lehner</td>
                      <td>Dynamic Division Officer</td>
                      <td>47</td>
                      <td>2011-04-19</td>
                    </tr>
                  </tbody>
                </table>
                <!-- End Bordered Table -->
    
                <p><a href="https://getbootstrap.com/docs/5.0/utilities/borders/#border-color" target="_blank">Border color utilities</a> can be added to change colors:</p>
    
                <!-- Primary Color Bordered Table -->
                <table class="table table-bordered border-primary">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Position</th>
                      <th scope="col">Age</th>
                      <th scope="col">Start Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>2016-05-25</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Bridie Kessler</td>
                      <td>Developer</td>
                      <td>35</td>
                      <td>2014-12-05</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Ashleigh Langosh</td>
                      <td>Finance</td>
                      <td>45</td>
                      <td>2011-08-12</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Angus Grady</td>
                      <td>HR</td>
                      <td>34</td>
                      <td>2012-06-11</td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>Raheem Lehner</td>
                      <td>Dynamic Division Officer</td>
                      <td>47</td>
                      <td>2011-04-19</td>
                    </tr>
                  </tbody>
                </table>
                <!-- End Primary Color Bordered Table -->
    
              </div>
            </div> --}}
    
            {{-- <div class="card">
              <div class="card-body">
                <h5 class="card-title">Small tables</h5>
                <p>Add <code>.table-sm</code> to make any <code>.table</code> more compact by cutting all cell padding in half.</p>
                <!-- Small tables -->
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Name</th>
                      <th scope="col">Position</th>
                      <th scope="col">Age</th>
                      <th scope="col">Start Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Brandon Jacob</td>
                      <td>Designer</td>
                      <td>28</td>
                      <td>2016-05-25</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Bridie Kessler</td>
                      <td>Developer</td>
                      <td>35</td>
                      <td>2014-12-05</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Ashleigh Langosh</td>
                      <td>Finance</td>
                      <td>45</td>
                      <td>2011-08-12</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Angus Grady</td>
                      <td>HR</td>
                      <td>34</td>
                      <td>2012-06-11</td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>Raheem Lehner</td>
                      <td>Dynamic Division Officer</td>
                      <td>47</td>
                      <td>2011-04-19</td>
                    </tr>
                  </tbody>
                </table>
                <!-- End small tables -->
    
              </div>
            </div> --}}
    
          </div>
      
    </div>
  </section>

  @include('sweetalert::alert')

@endsection