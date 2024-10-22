@extends('admin.master')

@section('main-content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Tabel Resume</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
        <li class="breadcrumb-item">Resume</li>
        <li class="breadcrumb-item active">Data Resume</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Resume</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Nomor</th>
                  <th>File</th>
                  <th>Lihat Berkas</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($resumes as $resume)
                <tr>
                  <td>{{ $resume->name }}</td>
                  <td>{{ $resume->nomer }}</td>
                  <td>{{ basename($resume->file_path) }}</td> <!-- Hanya menampilkan nama file -->
                  <td>
                    <a href="{{ asset('storage/' . $resume->file_path) }}" class="btn btn-info btn-sm" target="_blank">Lihat</a>
                  </td>
                  <td>
                    <!-- Kirim Update button -->
                    @php
                    $formattedNumber = ltrim($resume->nomer, '0');
                    @endphp
                    <a href="https://wa.me/62{{ $formattedNumber }}?text=*Halo {{$resume->name}}*, saya ingin memberikan update mengenai resume Anda." class="btn btn-success btn-sm" target="_blank">Kirim Update</a>

                    <!-- Delete button -->
                    <form action="{{ route('resumes.destroy', $resume->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus resume ini?')">Hapus</button>
                    </form>

                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->
@endsection