@extends('persyaratan.layoutpersyaratan')

@section('contentpersyaratan')

    {{-- Draft Persyaratan Surat Keterangan Sehat --}}
    <div class="row mt-4 mb-4">
        <div class="col-8 offset-2">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white">
                    <strong>Persyaratan Pengajuan Surat Keterangan Sehat</strong>
                </div>

                <div class="card-body">
                    <p class="mb-3">
                        Sebelum mengajukan <strong>Surat Keterangan Sehat</strong>, pastikan Anda telah menyiapkan data dan informasi berikut:
                    </p>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <strong>1. Data Dokter Pemeriksa</strong><br>
                            - Nama lengkap dokter<br>
                            - Nomor SIP (Surat Izin Praktik) yang masih berlaku<br>
                            - Nama instansi/klinik/rumah sakit
                        </li>

                        <li class="list-group-item">
                            <strong>2. Data Pasien</strong><br>
                            - Nama lengkap sesuai identitas<br>
                            - Tanggal lahir<br>
                            - Jenis kelamin<br>
                            - Pekerjaan<br>
                            - Alamat tempat tinggal
                        </li>

                        <li class="list-group-item">
                            <strong>3. Hasil Pemeriksaan Fisik</strong><br>
                            - Tekanan darah (mmHg)<br>
                            - Nadi (kali/menit)<br>
                            - Tinggi badan (cm)<br>
                            - Berat badan (kg)<br>
                            - Suhu tubuh (°C)<br>
                            - Pemeriksaan buta warna<br>
                            - Riwayat penyakit atau keluhan medis
                        </li>

                        <li class="list-group-item">
                            <strong>4. Tujuan dan Data Surat</strong><br>
                            - Tujuan pembuatan surat (misal: Melamar kerja, Daftar kuliah, Mengurus SIM)<br>
                            - Tempat dikeluarkan surat<br>
                            - Tanggal surat dibuat
                        </li>

                    </ul>

                    <div class="alert alert-warning mt-3">
                        <i class="bi bi-exclamation-triangle"></i>
                        <strong>Perhatian:</strong> Pastikan semua informasi fisik dan riwayat medis telah diperiksa dengan benar oleh dokter. Surat Keterangan Sehat hanya dapat diterbitkan berdasarkan pemeriksaan yang valid dan akurat.
                    </div>

                    {{-- Tombol hanya muncul jika user sudah login --}}
                    @auth
                        <div class="mt-4 text-center">
                            <a href="{{ route('keterangan-sehat.index') }}" class="btn btn-primary">
                                Buat Surat
                            </a>
                        </div>
                    @endauth
                    


                </div>
            </div>

        </div>
    </div>

@endsection
