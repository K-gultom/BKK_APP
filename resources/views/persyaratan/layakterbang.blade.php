@extends('persyaratan.layoutpersyaratan')

@section('contentpersyaratan')

    {{-- Draft Persyaratan Surat Layak Terbang --}}
    <div class="row mt-4 mb-4">
        <div class="col-8 offset-2">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-info text-white">
                    <strong>Persyaratan Pengajuan Surat Keterangan Layak Terbang</strong>
                </div>

                <div class="card-body">
                    <p class="mb-3">
                        Sebelum mengajukan <strong>Surat Keterangan Layak Terbang (Fit To Fly Certificate)</strong>,
                        mohon pastikan Anda telah menyiapkan data dan informasi berikut:
                    </p>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <strong>1. Data Dokter Pemeriksa</strong><br>
                            - Nama lengkap dokter<br>
                            - Nomor SIP (Surat Izin Praktik) yang masih berlaku<br>
                            - Nama instansi (klinik / rumah sakit)
                        </li>

                        <li class="list-group-item">
                            <strong>2. Data Pasien</strong><br>
                            - Nama lengkap sesuai KTP/Identitas<br>
                            - Tanggal lahir pasien<br>
                            - Usia pasien<br>
                            - Jenis kelamin<br>
                            - Nomor identitas: KTP atau Paspor
                        </li>

                        <li class="list-group-item">
                            <strong>3. Informasi Pemeriksaan Medis</strong><br>
                            - Tanggal pemeriksaan kesehatan pasien<br>
                            - Hasil pemeriksaan harus menunjukkan kondisi fit untuk perjalanan udara
                        </li>

                        <li class="list-group-item">
                            <strong>4. Data Rencana Perjalanan</strong><br>
                            - Tanggal penerbangan<br>
                            - Kota asal keberangkatan<br>
                            - Kota tujuan penerbangan<br>
                        </li>

                    </ul>

                    <div class="alert alert-warning mt-3">
                        <i class="bi bi-exclamation-triangle"></i>
                        <strong>Perhatian:</strong> Pasien dengan kondisi medis tertentu seperti
                        penyakit jantung, gangguan pernapasan, atau kondisi pasca operasi
                        biasanya memerlukan persetujuan tambahan dari dokter spesialis atau maskapai.
                    </div>

                    {{-- Tombol hanya muncul jika user sudah login --}}
                    @auth
                        <div class="mt-4 text-center">
                            <a href="{{ route('surat-layak-terbang.index') }}" class="btn btn-primary">
                                Buat Surat
                            </a>
                        </div>
                    @endauth

                </div>
            </div>

        </div>
    </div>

@endsection