@extends('admin.master')

@section('main-content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- watch Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card watch-card">
              <div class="card-body">
                <h5 class="card-title">Pengunjung <span>| Jumlah Pengunjung Website</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-eye"></i> <!-- Ikon mata untuk pengunjung -->
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalPengunjung }}</h6>
                    <span class="text-muted small pt-2">Total Pengunjung</span> <!-- Span untuk kategori -->
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End watch Card -->

          <!-- like Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card like-card">
              <div class="card-body">
                <h5 class="card-title">Like <span>| Jumlah Like Website</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-hand-thumbs-up"></i> <!-- Ikon jempol untuk like -->
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalLike }}</h6>
                    <span class="text-muted small pt-2">Total Like</span> <!-- Span untuk kategori -->
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End like Card -->

          <!-- user Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card user-card">
              <div class="card-body">
                <h5 class="card-title">User <span>| Jumlah User</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i> <!-- Ikon orang untuk user -->
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalUsers }}</h6>
                    <span class="text-muted small pt-2">Total User</span> <!-- Span untuk kategori -->
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End user Card -->

          <!-- loker Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card loker-card">
              <div class="card-body">
                <h5 class="card-title">Loker <span>| Jumlah Loker</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-briefcase"></i> <!-- Ikon koper untuk loker -->
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalLokers }}</h6>
                    <span class="text-muted small pt-2">Total Loker</span> <!-- Span untuk kategori -->
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End loker Card -->

          <!-- resume Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card resume-card">
              <div class="card-body">
                <h5 class="card-title">Resume <span>| Jumlah Resume</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-file-earmark-text"></i> <!-- Ikon dokumen untuk resume -->
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalResumes }}</h6>
                    <span class="text-muted small pt-2">Total Resume</span> <!-- Span untuk kategori -->
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End resume Card -->

          <!-- video Card -->
          <div class="col-xxl-4 col-md-4">
            <div class="card info-card video-card">
              <div class="card-body">
                <h5 class="card-title">Video <span>| Jumlah Video</span></h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-camera-video"></i> <!-- Ikon kamera video untuk video -->
                  </div>
                  <div class="ps-3">
                    <h6>{{ $totalVideos }}</h6>
                    <span class="text-muted small pt-2">Total Video</span> <!-- Span untuk kategori -->
                  </div>
                </div>
              </div>
            </div>
          </div><!-- End video Card -->
          
        </div>
      </div><!-- End Left side columns -->

    </div>
  </section>

</main><!-- End #main -->
@endsection