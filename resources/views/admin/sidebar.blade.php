<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}" href="{{ url('dashboard') }}">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
        <i class="bi bi-person"></i>
        <span>User</span>
      </a>
    </li><!-- End User Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('lokers*') ? 'active' : '' }}" href="{{ route('lokers.index') }}">
        <i class="bi bi-briefcase"></i>
        <span>Loker</span>
      </a>
    </li><!-- End Loker Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('resumes*') ? 'active' : '' }}" href="{{ route('resumes.index') }}">
        <i class="bi bi-file-earmark-text"></i>
        <span>Resume</span>
      </a>
    </li><!-- End Resume Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('videos*') ? 'active' : '' }}" href="{{ route('videos.index') }}">
        <i class="bi bi-camera-video"></i>
        <span>Video</span>
      </a>
    </li><!-- End Video Nav -->

    <li class="nav-item">
      <a class="nav-link {{ request()->is('settings*') ? 'active' : '' }}" href="{{ route('settings.index') }}">
      <i class="bi bi-gear"></i>
        <span>Setting</span>
      </a>
    </li><!-- End Settings Nav -->


  </ul>

</aside>

<style>
  .sidebar .nav-link.active {
    background-color: #007bff;
    /* Ganti dengan warna yang diinginkan */
    color: #fff;
    /* Ganti dengan warna teks yang diinginkan */
  }

  .sidebar .nav-link.active i {
    color: #fff; /* Mengubah warna ikon menjadi putih saat aktif */
  }
</style>