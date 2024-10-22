<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Daftar - Rahwana Jobs</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  @php $setting = $settings->first(); @endphp
  <link href="{{ asset('storage/' . $setting->logo) }}" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('admin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('admin/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="{{ route('home') }}" class="logo d-flex align-items-center w-auto">
                  @php $setting = $settings->first(); @endphp
                  <img src="{{ asset('storage/' . $setting->logo) }}" alt="Rahwana Jobs Logo">
                  <span class="d-none d-lg-block">Rahwana Jobs</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
                <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
                    <p class="text-center small">Masukkan data pribadi untuk membuat akun</p>
                  </div>

                  <!-- Form Register -->
                  <form action="{{ route('register') }}" method="POST" class="row g-3 needs-validation" novalidate>
                    @csrf <!-- Token CSRF untuk keamanan -->

                    <div class="col-12">
                      <label for="yourEmail" class="form-label">Email</label>
                      <input type="email" name="email" class="form-control" id="yourEmail" required>
                      <div class="invalid-feedback">Silakan masukkan alamat email yang valid!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourName" class="form-label">Nama</label>
                      <input type="text" name="name" class="form-control" id="yourName" required>
                      <div class="invalid-feedback">Silakan masukkan nama Anda!</div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Silakan masukkan password!</div>
                    </div>

                    <div class="col-12">
                      <label for="showPassword" class="form-check-label" style="margin-top: 10px;">
                        <input type="checkbox" id="showPassword" class="form-check-input" onclick="togglePasswordVisibility()"> Tampilkan Password
                      </label>
                    </div>

                    <div class="col-12">
                      <label for="yourPasswordConfirmation" class="form-label">Konfirmasi Password</label>
                      <input type="password" name="password_confirmation" class="form-control" id="yourPasswordConfirmation" required>
                      <div class="invalid-feedback">Silakan konfirmasi password Anda!</div>
                    </div>

                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Buat Akun</button>
                    </div>

                    <div class="col-12">
                      <p class="small mb-0">Sudah punya akun? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                  </form><!-- End Form Register -->

                  @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                  @endif


                </div>
              </div>

            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('admin/assets/js/main.js') }}"></script>

  <script>
    function togglePasswordVisibility() {
      var passwordInput = document.getElementById("yourPassword");
      var passwordConfirmationInput = document.getElementById("yourPasswordConfirmation");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        passwordConfirmationInput.type = "text"; // Menampilkan konfirmasi password juga
      } else {
        passwordInput.type = "password";
        passwordConfirmationInput.type = "password"; // Menyembunyikan konfirmasi password
      }
    }
  </script>


</body>

</html>