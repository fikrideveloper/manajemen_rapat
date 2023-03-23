@extends('layouts.main_new')

@section('title','Edit Data Rapat')

@section('dropdown_rapat', 'show')

@section('menu_data_rapat', 'active')

@section('menu')
    <li class="breadcrumb-item">Manajemen Rapat</li>
    <li class="breadcrumb-item active">Edit Data Rapat</li>
@endsection

@section('content')
<section class="section">
    <div class="row">
      <div class="col-lg-11">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Edit Data Rapat</h5>

            <!-- General Form Elements -->
            <form action="/update_rapat/{{ $edit_rapat->id }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Nama Rapat</label>
                <div class="col-sm-10">
                    
                  <input type="text" value="{{ $edit_rapat->nama_rapat }}" name="nama" class="form-control @error('nama') is-invalid @enderror" autofocus placeholder="Masukkan nama rapat"  >
                  @error('nama')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Rapat</label>
                <div class="col-sm-10">
                  <input type="date" value="{{ $edit_rapat->tanggal_rapat }}" name="tanggal" class="form-control @error('tanggal') is-invalid @enderror">
                  @error('tanggal')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="inputEmail" class="col-sm-2 col-form-label">Waktu Rapat</label>
                <div class="col-sm-10">
                  <input type="time" value="{{ $edit_rapat->waktu_rapat }}" name="waktu" class="form-control @error('waktu') is-invalid @enderror">
                  @error('waktu')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Kategori</label>
                <div class="col-sm-10">
                  <select class="form-select @error('kategori') is-invalid @enderror" name="kategori" aria-label="Default select example">
                    {{-- <option >- Pilih Jenis Kategori Rapat -</option> --}}
                    {{-- <option value="Rapat Mingguan" {{ $edit_rapat->kategori == 'Rapat Mingguan' ? 'selected' : '' }}>Rapat Mingguan</option>
                    <option value="Rapat Bulanan" {{ $edit_rapat->kategori == 'Rapat Bulanan' ? 'selected' : '' }}>Rapat Bulanan</option>
                    <option value="Rapat Tahunan " {{ $edit_rapat->kategori == 'Rapat Tahunan' ? 'selected' : '' }}>Rapat Tahunan</option> --}}
                    @foreach ($kategori_rapat as $kategori)
                    <option value="{{ $kategori }}" {{ $edit_rapat->kategori == 'Rapat Bulanan' ? 'selected' : '' }}>{{ $kategori }}</option>
                    @endforeach
                    
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </select>
                </div>
              </div>
              {{-- <div class="row mb-3">
                <label for="inputNumber" class="col-sm-2 col-form-label">Number</label>
                <div class="col-sm-10">
                  <input type="number" class="form-control">
                </div>
              </div> --}}
              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Dokumentasi</label>
                <div class="col-sm-10">
                  <input type="hidden" name="old_image" value="{{ $edit_rapat->gambar }}">

                    @if ($edit_rapat->gambar)
                       <img src="{{ asset('/data_gambar/'.$edit_rapat->gambar) }}" class="img-fluid mb-3 rounded shadow p-1 mb-3 bg-body-tertiary" style="max-height: 200px" alt=""> 
                    @else
                    <img src="{{ asset('rapat.jpg') }}" class="img-fluid mb-3 rounded shadow p-1 mb-3 bg-body-tertiary" style="max-height: 200px" alt="Rapat"> 
                    @endif

                  <input class="form-control @error('dokumentasi') is-invalid @enderror" name="dokumentasi" type="file" id="formFile">
                  <label for="" class="text-danger small">*Opsional</label>
                  @error('dokumentasi')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              
              <div class="row mb-3">
                <label for="inputPassword" class="col-sm-2 col-form-label">Hasil Rapat</label>
                <div class="col-sm-10">
                  <textarea name="hasil" class="form-control @error('hasil') is-invalid @enderror" style="" id="" cols="30" rows="10">{{ $edit_rapat->hasil_rapat }}</textarea>
                  @error('hasil')
                      <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              {{-- <fieldset class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                <div class="col-sm-10">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                    <label class="form-check-label" for="gridRadios1">
                      First radio
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                    <label class="form-check-label" for="gridRadios2">
                      Second radio
                    </label>
                  </div>
                  <div class="form-check disabled">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios" value="option" disabled>
                    <label class="form-check-label" for="gridRadios3">
                      Third disabled radio
                    </label>
                  </div>
                </div>
              </fieldset> --}}
              {{-- <div class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Checkboxes</legend>
                <div class="col-sm-10">

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck1">
                    <label class="form-check-label" for="gridCheck1">
                      Example checkbox
                    </label>
                  </div>

                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck2" checked>
                    <label class="form-check-label" for="gridCheck2">
                      Example checkbox 2
                    </label>
                  </div>

                </div>
              </div> --}}

              {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Disabled</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" value="Read only / Disabled" disabled>
                </div>
              </div> --}}

              {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Select</label>
                <div class="col-sm-10">
                  <select class="form-select" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div> --}}

              {{-- <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Multi Select</label>
                <div class="col-sm-10">
                  <select class="form-select" multiple aria-label="multiple select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
              </div> --}}

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div>

      {{-- <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Advanced Form Elements</h5>

            <!-- Advanced Form Elements -->
            <form>
              <div class="row mb-5">
                <label class="col-sm-2 col-form-label">Switches</label>
                <div class="col-sm-10">
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled>
                    <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
                  </div>
                  <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked disabled>
                    <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch checkbox input</label>
                  </div>
                </div>
              </div>

              <div class="row mb-5">
                <label class="col-sm-2 col-form-label">Ranges</label>
                <div class="col-sm-10">
                  <div>
                    <label for="customRange1" class="form-label">Example range</label>
                    <input type="range" class="form-range" id="customRange1">
                  </div>
                  <div>
                    <label for="disabledRange" class="form-label">Disabled range</label>
                    <input type="range" class="form-range" id="disabledRange" disabled>
                  </div>
                  <div>
                    <label for="customRange2" class="form-label">Min and max with steps</label>
                    <input type="range" class="form-range" min="0" max="5" step="0.5" id="customRange2">
                  </div>
                </div>
              </div>

              <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Floating labels</label>
                <div class="col-sm-10">
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                  </div>
                  <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Comments</label>
                  </div>
                  <div class="form-floating mb-3">
                    <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
                      <option selected>Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Works with selects</label>
                  </div>
                </div>
              </div>

              <div class="row mb-5">
                <label class="col-sm-2 col-form-label">Input groups</label>
                <div class="col-sm-10">
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>

                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text" id="basic-addon2">@example.com</span>
                  </div>

                  <label for="basic-url" class="form-label">Your vanity URL</label>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                  </div>

                  <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                    <span class="input-group-text">.00</span>
                  </div>

                  <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username">
                    <span class="input-group-text">@</span>
                    <input type="text" class="form-control" placeholder="Server" aria-label="Server">
                  </div>

                  <div class="input-group">
                    <span class="input-group-text">With textarea</span>
                    <textarea class="form-control" aria-label="With textarea"></textarea>
                  </div>
                </div>
              </div>

            </form><!-- End General Form Elements -->

          </div>
        </div>

      </div> --}}
    </div>
  </section>
@endsection

