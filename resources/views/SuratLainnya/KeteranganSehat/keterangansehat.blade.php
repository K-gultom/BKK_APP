@extends('main')

@section('content')
<div class="container">
    <center class="mt-4">    
        <h3 class="mb-4">
            Surat Keterangan Sehat
        </h3>
    </center>

    <form action="{{ route('keterangan-sehat.store') }}" method="POST" class="card p-4 shadow-sm">

        @csrf
        <!-- Data Dokter -->
        <h5 class="fw-bold mt-3">Data Dokter Pemeriksa</h5>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Nama Dokter</label>
                <input type="text" name="nama_dokter" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Nomor SIP</label>
                <input type="text" name="nomor_sip" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Instansi Dokter</label>
                <input type="text" name="instansi" class="form-control">
            </div>
        </div>

        <hr>
        <!-- Data Pasien -->
        <h5 class="fw-bold mt-3">Data Pasien</h5>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Nama Lengkap Pasien</label>
                <input type="text" name="nama_pasien" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-select">
                    <option value="">Pilih...</option>
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label class="form-label">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Pekerjaan</label>
                <input type="text" name="pekerjaan" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>
        </div>

        <hr>
        <!-- Pemeriksaan Fisik -->
        <h5 class="fw-bold mt-3">Hasil Pemeriksaan Fisik</h5>
        <div class="row">
            <div class="col-md-3 mb-3">
                <label class="form-label">Tekanan Darah (mmHg)</label>
                <input type="text" name="tekanan_darah" class="form-control" placeholder="120/80">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Nadi (kali/menit)</label>
                <input type="number" name="nadi" class="form-control">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Tinggi Badan (cm)</label>
                <input type="number" name="tinggi_badan" class="form-control">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Berat Badan (kg)</label>
                <input type="number" name="berat_badan" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 mb-3">
                <label class="form-label">Suhu Tubuh (°C)</label>
                <input type="text" name="suhu" class="form-control" placeholder="36.5">
            </div>
            <div class="col-md-3 mb-3">
                <label class="form-label">Buta Warna</label>
                <select name="buta_warna" class="form-select">
                    <option value="">Pilih...</option>
                    <option>Tidak</option>
                    <option>Ya (Parsial)</option>
                    <option>Ya (Total)</option>
                </select>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Riwayat Penyakit</label>
                <input type="text" name="riwayat_penyakit" class="form-control" placeholder="Tidak ada keluhan">
            </div>
        </div>

        <hr>
        <!-- Tujuan Surat -->
        <div class="mb-3">
            <label class="form-label">Tujuan Pembuatan Surat</label>
            <input type="text" name="tujuan" class="form-control" placeholder="Misal: Melamar Kerja, Daftar Kuliah, Mengurus SIM">
        </div>
        <!-- Tempat & Tanggal Surat -->
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Tempat Dikeluarkan Surat</label>
                <input type="text" name="tempat_surat" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Tanggal Surat</label>
                <input type="date" name="tanggal_surat" class="form-control">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Ajukan Surat</button>
                <a href="{{ url('/surat') }}" class="btn btn-danger">Back</a>
            </div>
        </div>
        
    </form>



</div>


@endsection