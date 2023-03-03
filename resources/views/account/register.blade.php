<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Register Akun</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('niceadmin/assets/img/favicon.png ')}}" rel="icon">
  <link href="{{ asset('niceadmin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('niceadmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/quill/quill.snow.css')}} " rel ="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('niceadmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('niceadmin/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= --
  <!-- ======= Sidebar ======= -->
  {{-- <aside id="sidebar" class="sidebar">

    

  </aside><!-- End Sidebar--> --}}

  <main class="container mt-5" style="margin-">

    <div class="pagetitle">
      <h2 class="text-center">Register Akun</h2>
      <nav>
        <ol class="breadcrumb">
          {{-- <li class="breadcrumb-item "><a href="/dashboard">Home</a></li> --}}
          {{-- @yield('menu') --}}
          {{-- <li class="breadcrumb-item">Manajemen Rapat</li>
          <li class="breadcrumb-item active">@yield('menu')</li> --}}
        </ol>
      </nav>
    </div><!-- End Page Title -->

    
    <section class="section">
        <div class="row justify-content-center">
          <div class="col-lg-4 ">
    
            <div class="card">
              <div class="card-body">
                {{-- <h5 class="card-title">Form Tambah Data Rapat</h5> --}}
    
                <!-- General Form Elements -->
                <form action="/create_register" method="POST">
                  @csrf
                  <div class="row mb-3 mt-4">
                    <label for="inputText" class="col-sm-5 col-form-label">Nama</label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-person-lines-fill"></i></span>
                      <input type="text" required name="nama" class="form-control @error('nama') is-invalid @enderror" autofocus placeholder="Masukkan Nama"  >
                      @error('nama')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-5 col-form-label">Email</label>
                    <div class="col-sm-10 input-group">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                      <input type="text" required name="email" class="form-control @error('nama') is-invalid @enderror" autofocus placeholder="Masukkan Email"  >
                      @error('nama')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputDate" class="col-sm-5 col-form-label">Password</label>
                    <div class="col-sm-10 input-group ">
                        <span class="input-group-text" id="inputGroupPrepend"><i class="bi bi-key-fill"></i></span>
                        <input type="password" placeholder="Masukkan Password" required name="password" class="form-control @error('tanggal') is-invalid @enderror">
                      @error('tanggal')
                        <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                    </div>
                  </div>
    
                  <div class="row mb-3 justify-content-center">
                    {{-- <label class="col-sm-2 col-form-label"></label> --}}
                    <div class="  text-center">
                      <button type="submit" class=" btn btn-primary w-50">Simpan</button>
                    </div>
                  </div>
    
                </form><!-- End General Form Elements -->
    
              </div>
            </div>
    
          </div>
        </div>
      </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer style="margin-top: 250px;" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Manajemen Rapat</span></strong>. All Rights Reserved
    </div>
    {{-- <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div> --}}
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('niceadmin/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/simple-datatables/simple-datatables.js')}} "></script>
  <script src="{{ asset('niceadmin/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('niceadmin/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('niceadmin/assets/js/main.js') }}"></script>

  <script type="text/javascript">
    $(function(){
      $(document).on('click', '#delete', function(e){
        e.preventDefault();
        var link = $(this).attr("href");

        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

      });
    });
  </script>

</body>

</html>


