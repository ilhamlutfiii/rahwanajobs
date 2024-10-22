@extends('layout')

@section('title', 'Rahwana Jobs')

@section('content')

<main class="main">

  <!-- Hero Section -->
  <section id="hero" class="hero section">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h2 class="animate__animated animate__fadeInLeft"><b>Welcome</b></h2>
          <h1 class="animate__animated animate__fadeInLeft">Rahwana Jobs</h1>
          <h6 class="animate__animated animate__fadeInLeft">Lowongan Kerja & Your Resume</h6>
          <div class="d-flex">
            <a href="#loker" class="btn-get-started animate__animated animate__zoomIn ">Jelajahi <i class="bi bi-chevron-right"></i></a>
          </div>
          
          <div class="d-flex mt-5 icon-container">
            <!-- Icon mata untuk visitor count -->
            <div class="icon-wrapper icon-eye me-3">
              <i class="bi bi-eye-fill"></i>
              <span id="view-count">0</span>
            </div>

            <!-- Icon jempol untuk like count -->
            <div class="icon-wrapper icon-thumbs-up">
              <i class="bi bi-hand-thumbs-up-fill" id="like-btn"></i>
              <span id="like-count">0</span>
            </div>
          </div>

        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img mb-auto">
          @php $setting = $settings->first(); @endphp
          <img src="{{ asset('storage/' . $setting->homepage) }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- /Hero Section -->

  <!-- Loker Section -->
  @include('awal.loker')
  <!-- /Loker Section -->

  <!-- Resume Section -->
  @include('awal.resume')
  <!-- /Resume Section -->

  <!-- Video Section -->
  @include('awal.video')
  <!-- /Video Section -->

</main>

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Ambil elemen view count dan like count
    const viewCountElement = document.getElementById('view-count');
    const likeCountElement = document.getElementById('like-count');
    const likeButton = document.getElementById('like-btn');

    // Fungsi untuk memperbarui jumlah pengunjung
    function updateViewCount() {
      fetch('/update-view-count') // Route Laravel untuk update view count
        .then(response => response.json())
        .then(data => {
          viewCountElement.textContent = data.views; // Update jumlah views
        });
    }

    // Fungsi untuk memperbarui jumlah like
    function updateLikeCount() {
      fetch('/update-like-count') // Route Laravel untuk update like count
        .then(response => response.json())
        .then(data => {
          likeCountElement.textContent = data.likes; // Update jumlah like
        });
    }

    // Saat halaman di-load, perbarui view count
    updateViewCount();

    // Event listener untuk tombol like
    likeButton.addEventListener('click', function() {
      fetch('/like-website', {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}', // Tambahkan token CSRF
            'Content-Type': 'application/json',
          }
        })
        .then(response => response.json())
        .then(data => {
          likeCountElement.textContent = data.likes; // Update jumlah like setelah klik
        });
    });
  });
</script>

@endsection