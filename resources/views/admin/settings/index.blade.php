@extends('admin.master')

@section('main-content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Update Setting</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
        <li class="breadcrumb-item">Setting</li>
        <li class="breadcrumb-item active">Update Setting</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-8">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Form Update Setting</h5>

            @if($settings && $settings->count() > 0) <!-- Memeriksa apakah ada setting -->
            @php $setting = $settings->first(); @endphp

            <!-- Form untuk Update Setting -->
            <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <!-- Logo Upload -->
              <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo" onchange="previewImage(event, 'logoPreview')">
                @if($setting->logo)
                <img id="logoPreview" src="{{ asset('storage/' . $setting->logo) }}" alt="Current Logo" class="mt-2" style="max-height: 100px;">
                @else
                <img id="logoPreview" alt="Logo Preview" class="mt-2" style="max-height: 100px; display:none;">
                @endif
              </div>

              <!-- Homepage Upload -->
              <div class="mb-3">
                <label for="homepage" class="form-label">Homepage</label>
                <input type="file" class="form-control" id="homepage" name="homepage" onchange="previewImage(event, 'homepagePreview')">
                @if($setting->homepage)
                <img id="homepagePreview" src="{{ asset('storage/' . $setting->homepage) }}" alt="Current Homepage" class="mt-2" style="max-height: 100px;">
                @else
                <img id="homepagePreview" alt="Homepage Preview" class="mt-2" style="max-height: 100px; display:none;">
                @endif
              </div>

              <!-- Whatsapp -->
              <div class="mb-3">
                <label for="whatsapp" class="form-label">Whatsapp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ $setting->whatsapp }}">
              </div>

              <!-- Twitter -->
              <div class="mb-3">
                <label for="twitter" class="form-label">Twitter</label>
                <input type="url" class="form-control" id="twitter" name="twitter" value="{{ $setting->twitter }}">
              </div>

              <!-- Facebook -->
              <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="url" class="form-control" id="facebook" name="facebook" value="{{ $setting->facebook }}">
              </div>

              <!-- Instagram -->
              <div class="mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="url" class="form-control" id="instagram" name="instagram" value="{{ $setting->instagram }}">
              </div>

              <!-- Submit Button -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
              </div>
            </form>
            <!-- End Form Update Setting -->
            @else
            <!-- Form untuk Menambah Setting jika belum ada -->
            <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
              @csrf

              <!-- Logo Upload -->
              <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo" required onchange="previewImage(event, 'logoPreview')">
                <img id="logoPreview" alt="Logo Preview" class="mt-2" style="max-height: 100px; display:none;">
              </div>

              <!-- Homepage Upload -->
              <div class="mb-3">
                <label for="homepage" class="form-label">Homepage</label>
                <input type="file" class="form-control" id="homepage" name="homepage" required onchange="previewImage(event, 'homepagePreview')">
                <img id="homepagePreview" alt="Homepage Preview" class="mt-2" style="max-height: 100px; display:none;">
              </div>

              <!-- Whatsapp -->
              <div class="mb-3">
                <label for="whatsapp" class="form-label">Whatsapp</label>
                <input type="text" class="form-control" id="whatsapp" name="whatsapp" required>
              </div>

              <!-- Twitter -->
              <div class="mb-3">
                <label for="twitter" class="form-label">Twitter</label>
                <input type="url" class="form-control" id="twitter" name="twitter" required>
              </div>

              <!-- Facebook -->
              <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="url" class="form-control" id="facebook" name="facebook" required>
              </div>

              <!-- Instagram -->
              <div class="mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="url" class="form-control" id="instagram" name="instagram" required>
              </div>

              <!-- Submit Button -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Tambah Setting</button>
              </div>
            </form>
            <!-- End Form Tambah Setting -->
            @endif

          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

@section('scripts')
<script>
  function previewImage(event, previewId) {
    const input = event.target;
    const preview = document.getElementById(previewId);

    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.src = e.target.result;
        preview.style.display = 'block'; // Menampilkan gambar
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endsection

@endsection