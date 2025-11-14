@extends('main')

@section('content')

<center class="mt-4">
    <h1 class="mb-4">Verifikasi Lapangan</h1>
    <p>Halaman ini menampilkan informasi tentang Verifikasi Lapangan.</p>
</center>

<div class="row mb-4">
    <div class="col-8 offset-2">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($verifications->isEmpty())
            <center>
                <p>Tidak ada data verifikasi.</p>
            </center>
        @else
            @php
                $allValid = true;
            @endphp
            @foreach($verifications as $verification)
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th class="text-center">Status Pengajuan</th>
                            <th class="text-center">Tgl Pengajuan</th>
                            <th class="text-center">KTP</th>
                            <th class="text-center">STR</th>
                            <th class="text-center">Ijazah</th>
                            <th class="text-center">Pesan Kesalahan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $verification->name }}</td>
                            <td class="text-center">
                                @if($verification->status == 'Diproses')
                                    <span class="badge bg-warning">Diproses</span>
                                @elseif($verification->status == 'Disetujui')
                                    <span class="badge bg-success">Disetujui</span>
                                @elseif($verification->status == 'Ditolak')
                                    <span class="badge bg-danger">Ditolak</span>
                                @endif
                            </td>

                            <td class="text-center">
                                {{ $verification->created_at->format('d-m-Y') }}
                            </td>
                            <td class="text-center">
                                <p><a href="{{ asset('storage/' . $verification->document_ktp) }}" target="_blank">Lihat File</a></p>
                            </td>
                            <td class="text-center">
                                <p><a href="{{ asset('storage/' . $verification->document_str) }}" target="_blank">Lihat File</a></p>
                            </td>
                            <td class="text-center">
                                <p><a href="{{ asset('storage/' . $verification->document_ijazah) }}" target="_blank">Lihat File</a></p>
                            </td>
                            <td class="text-center">
                                {{-- Pesan Kesalahan --}}
                                <button title="Pesan Kesalahan" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#errorModal{{ $verification->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </td>
                            

                            <td class="text-center">
                                {{-- Menampilkan Data --}}
                                <button class="btn btn-info" title="Lihat Data" data-bs-toggle="modal" data-bs-target="#dataModal{{ $verification->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>

                                {{-- Jika status masih Diproses, tombol Verifikasi atau Tolak tersedia --}}
                                <a title="Hapus" href="{{ url('/verifikasi-lapangan') }}/{{ $verification->id }}" class="btn btn-danger" onclick="return confirm('Hapus Data ???');">
                                    <i class="bi bi-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Modal for showing error message (Pesan Kesalahan) -->
                <div class="modal fade" id="errorModal{{ $verification->id }}" tabindex="-1" aria-labelledby="errorModalLabel{{ $verification->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="errorModalLabel{{ $verification->id }}">Pesan Kesalahan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>{{ $verification->reason ?? 'Tidak ada alasan.' }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal for showing user data -->
                <div class="modal fade" id="dataModal{{ $verification->id }}" tabindex="-1" aria-labelledby="dataModalLabel{{ $verification->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="dataModalLabel{{ $verification->id }}">Data Lengkap Pengguna</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul>
                                    <li><strong>Nama:</strong> {{ $verification->name }}</li>
                                    <li><strong>NIK:</strong> {{ $verification->nik }}</li>
                                    <li><strong>Email:</strong> {{ $verification->email }}</li>
                                    <li><strong>No. Telepon:</strong> {{ $verification->phone }}</li>
                                    <li><strong>Nama Tempat Praktik:</strong> {{ $verification->practice_place }}</li>
                                    <li><strong>Alamat Tempat Praktik:</strong> {{ $verification->practice_address }}</li>
                                </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <hr class="my-5">

            <center class="mt-4">
                <h2 class="mb-3">Riwayat Pengajuan Surat Layak Terbang</h2>
            </center>

            @if($layakTerbang->isEmpty())
                <center class="mb-4">
                    <p><strong>Maaf Anda belum pernah membuat jenis surat ini</strong></p>
                </center>
            @else
                @foreach($layakTerbang as $surat)
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Nama Pasien</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Tanggal Pengajuan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>{{ $surat->nama_pasien }}</td>

                                <td class="text-center">
                                    @if($surat->status == 'Sedang Diproses')
                                        <span class="badge bg-warning">Sedang Diproses</span>
                                    @elseif($surat->status == 'Disetujui')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif($surat->status == 'Ditolak')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>

                                <td class="text-center">
                                    {{ $surat->created_at->format('d-m-Y') }}
                                </td>

                                <td class="text-center">

                                    {{-- Lihat Detail --}}
                                    <button class="btn btn-info"
                                            data-bs-toggle="modal"
                                            data-bs-target="#detailLayakTerbang{{ $surat->id }}">
                                        <i class="bi bi-eye"></i>
                                    </button>

                                    {{-- Hapus --}}
                                    <form action="{{ route('surat-layak-terbang.destroy', $surat->id) }}" method="POST" 
                                        onsubmit="return confirm('Hapus pengajuan ini?')" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>


                                </td>
                            </tr>
                        </tbody>
                    </table>

                    {{-- MODAL DETAIL --}}
                    <div class="modal fade" id="detailLayakTerbang{{ $surat->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Surat Layak Terbang</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <h5 class="fw-bold">Data Dokter</h5>
                                    <ul>
                                        <li>Nama Dokter: {{ $surat->nama_dokter }}</li>
                                        <li>Nomor SIP: {{ $surat->nomor_sip }}</li>
                                        <li>Instansi: {{ $surat->instansi }}</li>
                                    </ul>

                                    <h5 class="fw-bold">Data Pasien</h5>
                                    <ul>
                                        <li>Nama Pasien: {{ $surat->nama_pasien }}</li>
                                        <li>Tanggal Lahir: {{ $surat->tgl_lahir }}</li>
                                        <li>Usia: {{ $surat->usia }}</li>
                                        <li>Jenis Kelamin: {{ $surat->jenis_kelamin }}</li>
                                        <li>Nomor Identitas: {{ $surat->nomor_identitas }}</li>
                                        <li>Tanggal Pemeriksaan: {{ $surat->tgl_pemeriksaan }}</li>
                                    </ul>

                                    <h5 class="fw-bold">Rencana Penerbangan</h5>
                                    <ul>
                                        <li>Tanggal Penerbangan: {{ $surat->tgl_penerbangan }}</li>
                                        <li>Kota Asal: {{ $surat->kota_asal }}</li>
                                        <li>Kota Tujuan: {{ $surat->kota_tujuan }}</li>
                                    </ul>

                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>

                            </div>
                        </div>
                    </div>

                @endforeach
            @endif




        @endif
        <a href="{{ url('/') }}" class="btn btn-danger">Back</a>
    </div>
</div>

@endsection
