@extends('main')

@section('content')
<div class="container">
    <center class="mt-4">    
        <h3 class="mb-4">
            Surat Keterangan Layak Terbang (Fit To Fly)
        </h3>
    </center>

    <form action="{{ route('surat-layak-terbang.store') }}" method="POST">

        @csrf
        <div class="card text-left">
            
            <div class="card-header">
                <h5 class="fw-bold mt-4">Form Surat</h5>
            </div>
            <div class="card-body">
                <h5 class="fw-bold mt-4">Data Dokter</h5>
                <hr>

                <!-- Nama Dokter -->
                <div class="mb-3">
                    <label class="form-label">Nama Dokter</label>
                    <input type="text" name="nama_dokter" class="form-control" required>
                </div>

                <!-- Nomor SIP -->
                <div class="mb-3">
                    <label class="form-label">Nomor SIP</label>
                    <input type="text" name="nomor_sip" class="form-control" required>
                </div>

                <!-- Instansi -->
                <div class="mb-3">
                    <label class="form-label">Instansi (Klinik / Rumah Sakit)</label>
                    <input type="text" name="instansi" class="form-control" required>
                </div>

                <h5 class="fw-bold mt-4">Data Pasien</h5>
                <hr>

                <!-- Nama Pasien -->
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap Pasien</label>
                    <input type="text" name="nama_pasien" class="form-control" required>
                </div>

                <!-- Tanggal Lahir dan Usia -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tanggal Lahir Pasien</label>
                        <input type="date" name="tgl_lahir" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Usia</label>
                        <input type="number" name="usia" class="form-control" required>
                    </div>
                </div>

                <!-- Jenis Kelamin -->
                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Nomor Identitas -->
                <div class="mb-3">
                    <label class="form-label">Nomor KTP / Paspor</label>
                    <input type="text" name="nomor_identitas" class="form-control" required>
                </div>

                <!-- Tanggal Pemeriksaan -->
                <div class="mb-3">
                    <label class="form-label">Tanggal Pemeriksaan Medis</label>
                    <input type="date" name="tgl_pemeriksaan" class="form-control" required>
                </div>

                <h5 class="fw-bold mt-4">Rencana Perjalanan</h5>
                <hr>

                <!-- Tanggal Penerbangan -->
                <div class="mb-3">
                    <label class="form-label">Tanggal Penerbangan</label>
                    <input type="date" name="tgl_penerbangan" class="form-control" required>
                </div>

                <!-- Rute Penerbangan -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kota Asal</label>
                        <input type="text" name="kota_asal" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Kota Tujuan</label>
                        <input type="text" name="kota_tujuan" class="form-control" required>
                    </div>
                </div>

                

                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-save"></i> Ajukan Surat
                </button>
                <a href="{{ url('/surat') }}" class="btn btn-danger">Back</a>
            </div>
        </div>

    </form>




</div>

@endsection