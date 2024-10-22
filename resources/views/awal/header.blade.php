<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="{{ route('home') }}" class="logo d-flex align-items-center me-auto">
            @php $setting = $settings->first(); @endphp
            <img src="{{ asset('storage/' . $setting->logo) }}" alt="Rahwana Jobs Logo">
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="#hero" class="active">Home</a></li>
                <li><a href="#loker">Loker</a></li>
                <li><a href="#resume">Resume</a></li>

                @auth
                <li class="dropdown" style="margin-left: 90px;">
                    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <ul>
                        <li>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="logout-link">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Form logout -->
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @else
                <li><a href="{{ route('login') }}#login" style="margin-left: 90px;">Login</a></li>
                @endauth
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>

    <style>
        .dropdown ul {
            display: none;
            position: absolute;
            background: white;
            padding: 10px;
            list-style: none;
            border-radius: 5px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .dropdown:hover ul {
            display: block;
        }

        .dropdown ul li {
            padding: 5px 10px;
        }

        .dropdown ul li a {
            color: #333;
            text-decoration: none;
        }

        .dropdown ul li a:hover {
            color: #007bff;
        }

        /* Media query untuk menampilkan tombol logout pada ukuran layar kecil */
        @media (max-width: 1199px) {
            .dropdown ul {
                display: block !important; /* Pastikan dropdown terbuka */
                position: static; /* Ubah posisi menjadi statis */
                background: transparent; /* Ubah background agar tidak ada border */
                padding: 0; /* Hapus padding */
                box-shadow: none; /* Hapus shadow */
            }

            .dropdown ul li {
                display: block; /* Tampilkan setiap item di dropdown sebagai block */
            }
        }
    </style>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pastikan dropdown toggle berfungsi
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');

        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(event) {
                event.preventDefault(); // Mencegah link melakukan navigasi
                const dropdownMenu = this.nextElementSibling; // Mengambil ul yang ada setelah a
                if (dropdownMenu) {
                    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block'; // Toggle tampilan dropdown
                }
            });
        });

        // Tutup dropdown jika klik di luar
        document.addEventListener('click', function(event) {
            const isDropdown = event.target.closest('.dropdown');
            if (!isDropdown) {
                dropdownToggles.forEach(toggle => {
                    const dropdownMenu = toggle.nextElementSibling;
                    if (dropdownMenu) {
                        dropdownMenu.style.display = 'none'; // Sembunyikan semua dropdown
                    }
                });
            }
        });
    });
</script>
