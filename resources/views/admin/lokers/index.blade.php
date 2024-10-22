@extends('admin.master')

@section('main-content')
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Tabel Loker</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
        <li class="breadcrumb-item">Loker</li>
        <li class="breadcrumb-item active">Data Loker</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Data Loker</h5>

            <!-- Button to open add loker modal -->
            <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addLokerModal">Tambah Data Loker</button>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th>Bidang</th>
                  <th>Nama Perusahaan</th>
                  <th>Kualifikasi</th>
                  <th>Job</th>
                  <th>Deadline</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                @foreach($lokers as $loker)
                <tr>
                  <td>{{ $loker->bid }}</td>
                  <td>{{ $loker->nampe }}</td>
                  <td>{{ implode(', ', json_decode($loker->kual)) }}</td> <!-- Mengubah JSON ke string -->
                  <td>{{ implode(', ', json_decode($loker->job)) }}</td> <!-- Mengubah JSON ke string -->
                  <td>{{ $loker->dl }}</td>
                  <td>
                    <!-- Edit button -->
                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $loker->id }}">Edit</button>

                    <!-- Delete button -->
                    <form action="{{ route('lokers.destroy', $loker->id) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus loker ini?')">Hapus</button>
                    </form>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $loker->id }}" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Loker</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <form action="{{ route('lokers.update', $loker->id) }}" method="POST">
                              @csrf
                              @method('PUT')

                              <!-- Error Message -->
                              @if ($errors->any())
                              <div class="alert alert-danger">
                                <ul>
                                  @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                                  @endforeach
                                </ul>
                              </div>
                              @endif

                              <div class="mb-3">
                                <label for="bid" class="form-label">Bidang</label>
                                <input type="text" class="form-control" id="bid" name="bid" value="{{ $loker->bid }}" required>
                              </div>

                              <div class="mb-3">
                                <label for="nampe" class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" id="nampe" name="nampe" value="{{ $loker->nampe }}" required>
                              </div>

                              <div class="mb-3">
                                <label for="kual" class="form-label">Kualifikasi</label>
                                <input type="text" class="form-control" id="kual" name="kual"
                                  value="{{ $loker->kual ? implode(', ', json_decode($loker->kual)) : '' }}" required>
                              </div>

                              <div class="mb-3">
                                <label for="job" class="form-label">Job</label>
                                <input type="text" class="form-control" id="job" name="job"
                                  value="{{ $loker->job ? implode(', ', json_decode($loker->job)) : '' }}" required>
                              </div>

                              <div class="mb-3">
                                <label for="dl" class="form-label">Deadline</label>
                                <input type="date" class="form-control" id="dl" name="dl" value="{{ $loker->dl }}" required>
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
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

  <!-- Modal Tambah Loker -->
  <div class="modal fade" id="addLokerModal" tabindex="-1" aria-labelledby="addLokerModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addLokerModalLabel">Tambah Loker</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{ route('lokers.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label for="bid" class="form-label">Bidang</label>
              <input type="text" class="form-control" id="bid" name="bid" required>
            </div>
            <div class="mb-3">
              <label for="nampe" class="form-label">Nama Perusahaan</label>
              <input type="text" class="form-control" id="nampe" name="nampe" required>
            </div>
            <div class="mb-3">
              <label for="kual" class="form-label">Kualifikasi</label>
              <input type="text" class="form-control" id="kual" name="kual" required placeholder="Pisahkan dengan koma (,)">
            </div>
            <div class="mb-3">
              <label for="job" class="form-label">Job</label>
              <input type="text" class="form-control" id="job" name="job" required placeholder="Pisahkan dengan koma (,)">
            </div>
            <div class="mb-3">
              <label for="dl" class="form-label">Deadline</label>
              <input type="date" class="form-control" id="dl" name="dl" required>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</main><!-- End #main -->
@endsection