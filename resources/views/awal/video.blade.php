<section id="alt-services" class="alt-services section">
    <!-- Section Title -->
    <div class="section-video" data-aos="fade-up">
      <h2>Cek Review Lengkapnya</h2>
    </div><!-- End Section Title -->

    <!-- Carousel Video Section -->
    <div id="videoCarousel" class="carousel slide mt-5" data-aos="fade-up" data-aos-delay="100"> <!-- data-bs-ride dihapus -->

      <div class="carousel-inner">
        @foreach ($videos as $index => $video)
        @php
        preg_match("/(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/", $video->link, $matches);
        $youtubeId = $matches[1] ?? ''; // Ambil ID video
        @endphp

        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}"> <!-- Menjadikan item pertama aktif -->
          <div class="video-container" style="max-width: 700px; margin: 0 auto;">
            <iframe class="embed-responsive-item video-iframe" width="100%" height="394"
              src="https://www.youtube.com/embed/{{ $youtubeId }}?rel=0&enablejsapi=1"
              frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        @endforeach
      </div>


      <!-- Carousel Controls with Black Icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#videoCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#videoCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <!-- End Carousel Video Section -->

  </section>

  <!-- JavaScript for Auto-Play -->
  <script>
    // Inisialisasi carousel Bootstrap
    const videoCarousel = document.getElementById('videoCarousel');
    const videoIframes = document.querySelectorAll('.video-iframe');

    // Event listener untuk slide carousel
    videoCarousel.addEventListener('slid.bs.carousel', function(event) {
      const activeSlide = videoCarousel.querySelector('.carousel-item.active .video-iframe');

      // Hentikan semua video sebelum memulai video di slide aktif
      videoIframes.forEach(iframe => {
        iframe.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
      });

      // Auto-play video di slide aktif
      if (activeSlide) {
        activeSlide.contentWindow.postMessage('{"event":"command","func":"playVideo","args":""}', '*');
      }
    });

    // Hentikan video saat carousel tidak berada di slide yang benar
    videoCarousel.addEventListener('slide.bs.carousel', function(event) {
      const leavingSlide = event.relatedTarget.querySelector('.video-iframe');

      if (leavingSlide) {
        leavingSlide.contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*');
      }
    });
  </script>

  <style>
    #imgPreview {
      max-width: 100%;
      height: auto;
      margin-top: 10px;
    }

    /* Ubah warna tombol Previous dan Next menjadi hitam */
    .carousel-control-prev-icon,
    .carousel-control-next-icon {
      background-color: black;
      /* Warna hitam untuk ikon */
      border-radius: 50%;
      /* Opsional: Menambahkan efek bulat */
      width: 50px;
      height: 50px;
    }

    /* Tambahkan hover effect untuk lebih interaktif */
    .carousel-control-prev-icon:hover,
    .carousel-control-next-icon:hover {
      background-color: #333;
      /* Warna yang sedikit lebih terang saat di-hover */
    }

    /* Atur ukuran ikonnya */
    .carousel-control-prev,
    .carousel-control-next {
      width: 60px;
      /* Lebar tombol kontrol */
    }
  </style>