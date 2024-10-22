<section id="loker" class="services section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Lowongan Kerja Terbaru</h2>

        <div class="row justify-content-end mt-2" style="margin-right: 85px;">
            <div class="col-md-6">
                <form class="d-flex" role="search" method="GET" action="{{ route('home') }}#loker">
                    <div class="input-group">
                        <input class="form-control" type="search" name="search" placeholder="Cari lowongan pekerjaan..." aria-label="Search" value="{{ request()->input('search') }}">
                        <button class="btn btn-success" style="width: 20%" type="submit">Cari <i class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="loker-content">
        <div class="container">
            <div class="row gy-8 justify-content-center">
                @if($lokers->isEmpty())
                <p>Tidak ada lowongan kerja tersedia.</p>
                @else
                @foreach($lokers as $loker)
                <div class="col-xl-5 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <h4>
                            <a href="#" class="stretched-link">{{ $loker->bid }}</a>
                        </h4>
                        <p>{{ $loker->nampe }}</p>
                        <hr style="margin: 15px 0;">
                        <p style="font-weight: bold;">Kualifikasi:</p>
                        <ul style="padding-left: 15px;">
                            @foreach (json_decode($loker->kual) as $kual)
                            <li>{{ $kual }}</li>
                            @endforeach
                        </ul>
                        <p style="font-weight: bold;">Tanggung Jawab:</p>
                        <ul style="padding-left: 15px;">
                            @foreach (json_decode($loker->job) as $job)
                            <li>{{ $job }}</li>
                            @endforeach
                        </ul>
                        <p style="font-weight: bold; color: #e74c3c;">Deadline: {{ $loker->dl }}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>

        <!-- Pagination -->
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12 justify-content-center d-flex">
                    <ul class="pagination justify-content-end">
                        <li class="page-item {{ $lokers->previousPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $lokers->previousPageUrl() }}&search={{ request()->input('search') }}#loker" rel="prev">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>

                        @if ($lokers)
                        @for ($i = 1; $i <= $lokers->lastPage(); $i++)
                            <li class="page-item {{ ($i == $lokers->currentPage()) ? 'active' : '' }}">
                                <a class="page-link" href="{{ $lokers->url($i) }}&search={{ request()->input('search') }}#loker">{{ $i }}</a>
                            </li>
                        @endfor
                        @endif

                        <li class="page-item {{ $lokers->nextPageUrl() ? '' : 'disabled' }}">
                            <a class="page-link" href="{{ $lokers->nextPageUrl() }}&search={{ request()->input('search') }}#loker" rel="next">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- End Loker Content -->
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Fungsi untuk cek ukuran layar dan mengubah pagination
        function updatePaginationBasedOnScreenSize() {
            var itemsPerPage = window.innerWidth <= 1200 ? 1 : 2; // Ubah pagination jika layar lebih kecil dari 1200px
            
            // Simpan nilai ke localStorage untuk digunakan pada permintaan berikutnya
            localStorage.setItem('items_per_page', itemsPerPage);
        }

        // Jalankan fungsi saat halaman di-load
        updatePaginationBasedOnScreenSize();

        // Cek dan terapkan pagination saat halaman dimuat
        var itemsPerPage = localStorage.getItem('items_per_page') || 2; // Default to 2 jika tidak ada di localStorage
        var url = new URL(window.location.href);
        url.searchParams.set('items_per_page', itemsPerPage);
        
        // Hanya ubah URL jika parameter telah berubah
        if (!url.searchParams.get('items_per_page')) {
            window.location.href = url.href; // Redirect hanya jika item_per_page belum ada
        }

        // Jalankan fungsi saat ukuran layar berubah
        window.addEventListener('resize', updatePaginationBasedOnScreenSize);
    });
</script>
