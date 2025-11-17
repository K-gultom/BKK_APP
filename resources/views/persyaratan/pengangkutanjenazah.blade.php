@extends('persyaratan.layoutpersyaratan')

@section('contentpersyaratan')

    {{-- Draft Persyaratan Pengangkutan Jenazah --}}
    <div class="row mt-4 mb-4">
        <div class="col-8 offset-2">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-danger text-white">
                    <strong>Persyaratan Pengajuan Surat Keterangan Pengiriman Jenazah</strong>
                </div>

                <div class="card-body">
                    <p class="mb-3">
                        Sebelum mengajukan <strong>Surat Keterangan Pengiriman Jenazah</strong>,
                        pastikan Anda telah menyiapkan data dan dokumen berikut:
                    </p>

                    <ul class="list-group list-group-flush">

                        <li class="list-group-item">
                            <strong>1. Data Jenazah</strong><br>
                            - Nama lengkap jenazah<br>
                            - Tempat dan tanggal lahir<br>
                            - Jenis kelamin<br>
                            - Kewarganegaraan<br>
                            - Nomor identitas: KTP / Paspor<br>
                            - Tanggal & waktu meninggal<br>
                            - Tempat meninggal<br>
                            - Penyebab kematian (sesuai surat keterangan medis)
                        </li>

                        <li class="list-group-item">
                            <strong>2. Rincian Pengiriman</strong><br>
                            - Metode transportasi (misal: Kargo Udara / Ambulans Darat)<br>
                            - Nama maskapai / jasa pengangkut<br>
                            - Nomor penerbangan (jika ada)<br>
                            - Tanggal & waktu pengiriman / keberangkatan<br>
                            - Asal dan tujuan kota pengiriman<br>
                            - Alamat tujuan (rumah duka / pemakaman)
                        </li>

                        <li class="list-group-item">
                            <strong>3. Penanggung Jawab / Penerima</strong><br>
                            - Nama penanggung jawab di tujuan<br>
                            - Nomor telepon yang bisa dihubungi
                        </li>

                        <li class="list-group-item">
                            <strong>4. Penanganan Jenazah</strong><br>
                            - Jenazah telah dibalsem / formalin (jika ada)<br>
                            - Peti jenazah tertutup rapat dan disegel<br>
                            - Catatan pembalseman (jika ada)<br>
                            - Dokumen medis pendukung (pdf/jpg/png)
                        </li>

                    </ul>

                    <div class="alert alert-warning mt-3">
                        <i class="bi bi-exclamation-triangle"></i>
                        <strong>Perhatian:</strong> Pastikan semua dokumen medis dan persetujuan pengangkutan sesuai dengan regulasi maskapai, rumah sakit, dan rumah duka. Pengiriman jenazah yang tidak sesuai prosedur dapat ditunda atau ditolak.
                    </div>

                    {{-- Tombol hanya muncul jika user sudah login --}}
                    @auth
                        <div class="mt-4 text-center">
                            <a href="{{ route('pengangkutan-jenazah.index') }}" class="btn btn-primary">
                                Buat Surat
                            </a>
                        </div>
                    @endauth
                </div>
            </div>

        </div>
    </div>

@endsection
