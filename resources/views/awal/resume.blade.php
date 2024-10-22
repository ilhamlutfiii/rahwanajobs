<section id="resume" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Resume</h2>
        <p>Kirim CV dan berkas lamaran untuk dicek dan dibantu untuk revisi jika ada yang kurang.</p>
    </div>

    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }} <!-- Ganti 'error' dengan 'success' -->
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div id="custom-alert" class="alert-box" style="display: none;">
        <span id="alert-message"></span>
        <button type="button" id="close-alert" class="btn-close">&times;</button>
    </div>

    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <!-- Left Column: Add/Edit Data Button -->
            <div class="col-lg-6 text-center">
                <div class="p-3 mb-3" style="border-radius: 8px;">
                    <div id="plus-icon-container">
                        <button class="btn border" data-bs-toggle="modal" data-bs-target="#tambahDataModal" id="plus-button">
                            <i class="bi bi-plus-circle" style="font-size: 8rem;"></i>
                        </button>
                        <img id="iconPreview" src="#" alt="Preview Gambar" style="display: none; margin: 10px auto 0; max-height: 200px; object-fit: cover;" />
                        <iframe id="pdfPreview" src="#" style="display: none; width: 100%; height: 300px; border: none;"></iframe>
                    </div>
                    <button id="ubahDataBtn" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#tambahDataModal" style="display: none;">Ubah Data</button>
                </div>
            </div>

            <!-- Right Column: Submit Resume Button -->
            <div class="col-lg-6 text-center">
                <div class="p-3 mb-3" style="border-radius: 8px;">
                    <form action="{{ route('resumes.submit') }}" method="POST" enctype="multipart/form-data" class="php-email-form" id="main-resume-form">
                        @csrf
                        <input type="text" class="form-control d-none" name="name" id="nameMain" required>
                        <input type="text" class="form-control d-none" name="nomer" id="nomerMain" required>
                        <input type="file" class="form-control mb-2 d-none" name="file_path" id="resumeFileInputMain" required>

                        <div class="loading" style="display: none;">Loading...</div>
                        <div class="error-message d-none">Ada kesalahan!</div>
                        <div class="sent-message" style="display: none;">Berhasil Dikirim</div>

                        <div id="custom-alert" class="alert-box" style="display: none;">
                            <span id="alert-message"></span>
                            <button type="button" id="close-alert" class="btn-close">&times;</button>
                        </div>

                        <button type="button" class="btn btn-danger" id="kirim-btn" data-bs-toggle="modal" data-bs-target="#konfirmasiModal">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="konfirmasiModal" tabindex="-1" aria-labelledby="konfirmasiModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="konfirmasiModalLabel">Konfirmasi Pengiriman</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin mengirim berkas ini? <br>
                Hasil Resume akan dikirimkan ke nomor WA Anda. <br>
                Setelah klik Kirim, maka tidak bisa ubah data lagi!.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" id="confirmSubmitBtn">Kirim</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Modal for Resume Form -->
<div class="modal fade" id="tambahDataModal" tabindex="-1" aria-labelledby="tambahDataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tambahDataModalLabel">Tambah Resume</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="resume-form-modal" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" name="name" class="form-control" id="nameField" placeholder="Masukkan Nama..." required>
                    </div>
                    <div class="mb-3">
                        <label for="nomer" class="form-label">Nomer</label>
                        <input type="text" class="form-control" name="nomer" id="nomerField" placeholder="Masukkan Nomer..." required>
                    </div>
                    <div class="mb-3">
                        <label for="resumeFile" class="form-label">Upload CV</label>
                        <!-- Drag & Drop Area -->
                        <div id="drop-area" class="border rounded p-3" style="background-color: #f5f5f5; text-align: center;">
                            <!-- Select File Button -->
                            <button type="button" class="btn btn-primary mb-2" id="selectFileBtn">Pilih File</button>
                            <p id="dragDropText">... atau Drag & drop file di sini</p>
                            <input type="file" class="form-control d-none" id="resumeFile" name="file_path" accept="image/*,application/pdf" required>
                            <!-- File Preview with Close Button -->
                            <div style="display: none; margin-top: 10px;" id="filePreviewContainer">
                                <span id="fileNamePreviewModal" style="font-weight: bold;"></span>
                                <button type="button" class="btn-close ms-2" aria-label="Close" id="removeFileBtn"></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" form="resume-form-modal" class="btn btn-primary" id="save-resume-btn">Simpan Resume</button>
            </div>
        </div>
    </div>
</div>

<style>
    #kirim-btn {
        color: black; /* Warna teks hitam */
        font-size: 1.25rem; /* Ukuran font lebih besar */
        padding: 10px 20px; /* Padding untuk memperbesar tombol */
        font-weight: bold;
    }    
    /* Styling for Custom Alert */
    .alert-box {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #4CAF50;
        /* Red for error */
        color: white;
        padding: 15px;
        border-radius: 5px;
        z-index: 1000;
        font-size: 16px;
        display: flex;
        align-items: center;
    }

    .alert-box.success {
        background-color: #4CAF50;
        /* Green for success */
    }

    .alert-box .btn-close {
        background: none;
        border: none;
        color: white;
        font-size: 20px;
        margin-left: 10px;
        cursor: pointer;
    }
</style>

<!-- Script for checking login and alert -->
<script>
    document.getElementById('confirmSubmitBtn').addEventListener('click', function() {
        document.getElementById('main-resume-form').submit(); // Kirim formulir
        $('#konfirmasiModal').modal('hide'); // Tutup modal konfirmasi
    });

    // Function to display custom alert
    function showCustomAlert(message, type = 'error') {
        const alertBox = document.getElementById('custom-alert');
        const alertMessage = document.getElementById('alert-message');
        alertMessage.textContent = message;

        if (type === 'success') {
            alertBox.classList.add('success');
        } else {
            alertBox.classList.remove('success');
        }

        alertBox.style.display = 'flex'; // Show the alert box

        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 3000);
    }

    document.getElementById('close-alert').addEventListener('click', function() {
        document.getElementById('custom-alert').style.display = 'none';
    });

    // Submit form using Fetch API
    document.getElementById('main-resume-form').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah pengiriman default form

        // Validasi sebelum mengirim data
        const name = document.getElementById('nameMain').value;
        const nomer = document.getElementById('nomerMain').value;
        const fileInput = document.getElementById('resumeFileInputMain').files[0];

        if (!name || !nomer || !fileInput) {
            showCustomAlert('Nama, Nomer, dan File CV harus diisi sebelum mengirim!');
            return;
        }

        // Tampilkan loading spinner
        document.querySelector('.loading').style.display = 'block';
        document.querySelector('.sent-message').style.display = 'none';

        const formData = new FormData(this); // Mengambil data dari form

        // Mengirim data menggunakan Fetch API
        fetch(this.action, {
                method: 'POST',
                body: formData,
            })
            .then(response => {
                // Sembunyikan loading spinner
                document.querySelector('.loading').style.display = 'none';

                // Cek apakah respons berhasil
                if (!response.ok) {
                    // Jika tidak berhasil, coba ambil teks dari respons untuk debugging
                    return response.text().then(text => {
                        throw new Error(`Error ${response.status}: ${text}`);
                    });
                }
            })
            .then(data => {
                if (data.success) {
                    showCustomAlert('Berhasil mengirim CV!', 'success');
                    this.reset(); // Reset form setelah berhasil
                } else {
                    showCustomAlert(data.message || 'Terjadi kesalahan saat mengirim CV.');
                }
            })
            .catch(error => {
                // Sembunyikan loading spinner jika terjadi error
                document.querySelector('.loading').style.display = 'none';
                showCustomAlert('Berkasmu Berhasil Dikirim!');
            });


    });
</script>

<script>
    const dropArea = document.getElementById('drop-area');
    const fileInput = document.getElementById('resumeFile');
    const fileNamePreviewModal = document.getElementById('fileNamePreviewModal');
    const filePreviewContainer = document.getElementById('filePreviewContainer');
    const dragDropText = document.getElementById('dragDropText');
    const plusButton = document.getElementById('plus-button');
    const iconPreview = document.getElementById('iconPreview');
    const ubahDataBtn = document.getElementById('ubahDataBtn');
    const removeFileBtn = document.getElementById('removeFileBtn');
    const mainFileInput = document.getElementById('resumeFileInputMain');
    const nameMain = document.getElementById('nameMain');
    const nomerMain = document.getElementById('nomerMain');
    const nameField = document.getElementById('nameField');
    const nomerField = document.getElementById('nomerField');
    const saveResumeBtn = document.getElementById('save-resume-btn');
    let selectedFile = null;

    // Select file button
    selectFileBtn.addEventListener('click', () => fileInput.click());

    // Prevent default behavior for drag & drop
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        dropArea.addEventListener(eventName, preventDefaults, {
            passive: true
        }); // Menambahkan passive: true di sini
    });

    // Handle dropped file
    dropArea.addEventListener('drop', handleDrop, {
        passive: true
    }); // Menambahkan passive: true di sini

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Handle dropped file
    function handleDrop(e) {
        const dt = e.dataTransfer;
        const file = dt.files[0];
        handleFiles(file);
    }

    fileInput.addEventListener('change', (event) => {
        const file = event.target.files[0];
        handleFiles(file);
    });

    function handleFiles(file) {
        if (file) {
            selectedFile = file;
            fileNamePreviewModal.textContent = file.name;
            filePreviewContainer.style.display = 'block';
            selectFileBtn.style.display = 'none';
            dragDropText.style.display = 'none';

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    iconPreview.src = e.target.result;
                    iconPreview.style.display = 'block';
                    document.getElementById('pdfPreview').style.display = 'none'; // Sembunyikan preview PDF
                };
                reader.readAsDataURL(file);
            } else if (file.type === 'application/pdf') {
                const fileURL = URL.createObjectURL(file);
                document.getElementById('pdfPreview').src = fileURL; // Tampilkan URL PDF
                document.getElementById('pdfPreview').style.display = 'block'; // Tampilkan preview PDF
                iconPreview.style.display = 'none'; // Sembunyikan ikon gambar
            } else {
                iconPreview.style.display = 'none'; // Sembunyikan jika bukan gambar
                document.getElementById('pdfPreview').style.display = 'none'; // Sembunyikan preview PDF
            }
        } else {
            resetFileInput();
        }
    }


    // Reset file input when canceled
    function resetFileInput() {
        filePreviewContainer.style.display = 'none';
        selectFileBtn.style.display = 'inline-block';
        dragDropText.style.display = 'block';
        fileInput.value = ''; // Reset input file
        selectedFile = null; // Clear selected file
        iconPreview.style.display = 'none'; // Sembunyikan ikon preview
    }


    // When "Simpan Resume" button is clicked
    saveResumeBtn.addEventListener('click', (e) => {
        e.preventDefault();
        handleSaveData();
    });

    // Function to handle data saving
    function handleSaveData() {
        if (selectedFile) {
            const reader = new FileReader();
            reader.onload = function(e) {
                if (selectedFile.type.startsWith('image/')) {
                    iconPreview.src = e.target.result;
                    iconPreview.style.display = 'block';
                }
                plusButton.style.display = 'none';
                ubahDataBtn.style.display = 'inline-block';
                mainFileInput.files = fileInput.files; // Copy file to main form
            };
            reader.readAsDataURL(selectedFile);
        }

        // Copy name and nomer from modal to main form
        nameMain.value = nameField.value;
        nomerMain.value = nomerField.value;

        // Close modal after saving
        $('#tambahDataModal').modal('hide');
    }


    // Event listener for close button on file preview
    removeFileBtn.addEventListener('click', resetFileInput);

    ubahDataBtn.addEventListener('click', () => {
        // Open modal form
        $('#tambahDataModal').modal('show');

        // Fill existing data into modal form
        nameField.value = nameMain.value;
        nomerField.value = nomerMain.value;

        // Check if a file has already been selected
        if (mainFileInput.files.length > 0) {
            fileNamePreviewModal.textContent = mainFileInput.files[0].name;
            filePreviewContainer.style.display = 'block';
            selectFileBtn.style.display = 'none';
            dragDropText.style.display = 'none';
            iconPreview.style.display = 'none'; // Reset ikon preview saat membuka modal
        }
    });
</script>