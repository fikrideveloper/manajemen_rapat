@extends('layouts.main_new')

@section('title', 'Akun Profil')

@section('menu')
{{-- <li class="breadcrumb-item">Manajemen Rapat</li> --}}
<li class="breadcrumb-item active">Akun Profil</li>
@endsection

@section('content')

    <section class="section profile">
      <div class="row">
        <div class="col-xl-4">

          <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

              {{-- Jika User memasukkan gambar profile maka tampilkan gambarnya --}}
              @if (Auth::user()->image)
                <img src="{{ asset('data_gambar/profile_image/'.Auth::user()->image) }}" alt="{{ Auth::user()->image }}" class="rounded-circle mb-1">    

              {{-- Jika User tidak memasukkan gambar profile maka tampilkan gambar user vector --}}
              @else
              <img src="{{ asset('data_gambar/profile_image/photo.png') }}" alt="Profile" class="rounded-circle mb-1">    
              @endif

              
              <h2 class="mb-2">{{ Auth::user()->name }}</h2>
              <h3>{{ Auth::user()->level }}</h3>

              <form action="{{ route('hapus_profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <input type="hidden" name="old_profile" value="{{ Auth::user()->gambar }}">
                <button type="submit"style="font-size: 15px" class="btn btn-danger">Hapus Gambar</button> --}}
              </form>
            </div>
          </div>
          

        </div>

        <div class="col-xl-8">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>

                {{-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>
                </li> --}}

                {{-- <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li> --}}

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                  {{-- <h5 class="card-title">About</h5>
                  <p class="small fst-italic">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</p> --}}

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Nama</div>
                    <div class="col-lg-9 col-md-8" class="">{{ Auth::user()->name }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Hak Akses</div>
                    <div class="col-lg-9 col-md-8">{{ Auth::user()->level }}</div>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form action="{{ route('update_profile' ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        {{-- <img src="assets/img/profile-img.jpg" alt="Profile"> --}}
                        <div class="pt-2">
                          {{-- <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a> --}}
                          <input type="hidden" name="old_image" value="{{ Auth::user()->image }}">
                          <input type="file" name="gambar_profile" class="form-control" id="">
                          {{-- <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a> --}}
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                        <input type="hidden" name="idUpdate" value="{{ Auth::user()->id }}">
                      <div class="col-md-8 col-lg-9">
                        <input name="name" autofocus  type="text" class="form-control" id="fullName"  value="{{ Auth::user()->name }}">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="text"  class="form-control" id="company" value="{{ Auth::user()->email }}">
                        {{-- <textarea name="about" class="form-control" id="about" style="height: 100px">Sunt est soluta temporibus accusantium neque nam maiores cumque temporibus. Tempora libero non est unde veniam est qui dolor. Ut sunt iure rerum quae quisquam autem eveniet perspiciatis odit. Fuga sequi sed ea saepe at unde.</textarea> --}}
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="company" class="col-md-4 col-lg-3 col-form-label">Hak Akses</label>
                      <div class="col-md-8 col-lg-9">
                        <input style="cursor: not-allowed;" name="level" disabled type="text" class="form-control" id="company" value="{{ Auth::user()->level }}" >
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>

                <div class="tab-pane fade pt-3" id="profile-settings">

                  <!-- Settings Form -->
                  {{-- <form>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>
                      <div class="col-md-8 col-lg-9">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="changesMade" checked>
                          <label class="form-check-label" for="changesMade">
                            Changes made to your account
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="newProducts" checked>
                          <label class="form-check-label" for="newProducts">
                            Information on new products and services
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="proOffers">
                          <label class="form-check-label" for="proOffers">
                            Marketing and promo offers
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                          <label class="form-check-label" for="securityNotify">
                            Security alerts
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End settings Form --> --}}

                </div>

                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form>

                    <div class="row mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>



<!-- Project Card Example -->
{{-- <div class="container">
    <div class="card shadow">
    <div class="card-header text-primary">
        <h5 class="m-0 font-weight-bold">Form Setting Profil</h5>
        
    </div>
    
    <div class="card-body">
        <div class="form-group">
            <form action="{{ route('update_profile' ) }}" method="post">
                
                @csrf

                @if ($message = Session::get('edit'))
                    <div class="col-5 alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif

                
                <input type="hidden" name="idUpdate" value="{{ Auth::user()->id }}">

                <label for="" class="text-dark font-weight-bold ">Nama</label>
                <input name="name" type="text" value="{{ Auth::user()->name }}" class="@error('name') is-invalid @enderror text-dark mb-3 col-md-5 form-control">

                @error('name')
                    <span class="text-danger mb-3 ">{{ $message }}</span> <br>
                @enderror

                <label for="" class="text-dark font-weight-bold ">Email</label>
                <input name="email" type="text" value="{{ Auth::user()->email }}"  class="@error('email') is-invalid @enderror text-dark mb-3 col-md-5 form-control">

                @error('email')
                    <span class="text-danger mb-3 ">{{ $message }}</span> <br>
                @enderror

                <label for="" class="text-dark font-weight-bold ">Hak Akses</label>
                <input name="level" style="cursor: not-allowed" type="text"  value="{{ Auth::user()->level }}"  class="@error('level') is-invalid @enderror text-dark mb-3 col-md-5 form-control">

                @error('level')
                    <span class="text-danger mb-3 ">{{ $message }}</span> <br>
                @enderror

                <button type="submit" class="btn btn-success mt-2">Simpan</button>
            </form>
        </div>
    </div>
    
    </div>
    <div class="mb-3"></div>    
</div> --}}






    @include('sweetalert::alert')

@endsection