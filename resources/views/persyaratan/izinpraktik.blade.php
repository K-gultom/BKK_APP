@extends('persyaratan.layoutpersyaratan')

@section('contentpersyaratan')

    {{-- Draft Persyaratan Pengisian Dokumen --}}
    <div class="row mt-4 mb-4">
        <div class="col-8 offset-2">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <strong>Persyaratan yang Perlu Disiapkan</strong>
                </div>

                <div class="card-body">
                    <p class="mb-3">
                        Sebelum mengisi form kelengkapan dokumen, pastikan Anda telah menyiapkan berkas-berkas berikut dalam format PDF atau JPG:
                    </p>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <strong>1. KTP (Kartu Tanda Penduduk)</strong><br>
                            - Foto/scan KTP yang masih berlaku
                        </li>

                        <li class="list-group-item">
                            <strong>2. STR (Surat Tanda Registrasi)</strong><br>
                            - STR aktif sesuai profesi <br>
                            - Format: PDF / JPG
                        </li>

                        <li class="list-group-item">
                            <strong>3. Ijazah Pendidikan Terakhir</strong><br>
                            - Scan ijazah asli <br>
                            - Format: PDF / JPG
                        </li>

                        <li class="list-group-item">
                            <strong>4. Data Pribadi</strong><br>
                            - Nama sesuai KTP  
                            - NIK  
                            - Nomor Telepon aktif  
                            - Email yang valid  
                        </li>

                        <li class="list-group-item">
                            <strong>5. Informasi Tempat Praktik</strong><br>
                            - Nama tempat praktik  
                            - Alamat lengkap tempat praktik  
                        </li>

                    </ul>

                    <div class="alert alert-info mt-3">
                        <i class="bi bi-info-circle"></i>  
                        <strong>Catatan:</strong> Pastikan semua dokumen terlihat jelas dan tidak blur untuk mempercepat proses verifikasi.
                    </div>
                    
                    {{-- Tombol hanya muncul jika user sudah login --}}
                    @auth
                        <div class="mt-4 text-center">
                            <a href="{{ url('/kelengkapan-dokumen') }}" class="btn btn-primary">
                                Buat Surat
                            </a>
                        </div>
                    @endauth
                    
                </div>
            </div>

        </div>
    </div>


@endsection