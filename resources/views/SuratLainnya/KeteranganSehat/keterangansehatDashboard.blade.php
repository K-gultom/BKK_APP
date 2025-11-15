@extends('dashboard-admin')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Permohonan Surat Keterangan Sehat</h4>
        <div>
            <a href="{{ url('/keterangan-sehat-dashboard') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-clockwise"></i> Refresh
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Search --}}
    <div class="row mb-3">
        <div class="col-md-4">
            <form method="GET" action="{{ url('/keterangan-sehat-dashboard') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                           placeholder="Cari nama pasien..."
                           value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Pasien</th>
                    <th class="text-center">Tgl Pengajuan</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dokumen as $index => $item)
                    <tr>
                        <td class="text-center">
                            {{ ($dokumen->currentPage() - 1) * $dokumen->perPage() + $index + 1 }}
                        </td>

                        <td>{{ $item->nama_pasien }}</td>

                        <td class="text-center">{{ $item->created_at->format('d-m-Y') }}</td>

                        <td class="text-center">
                            @if ($item->status == 'Disetujui')
                                <span class="badge bg-success">{{ $item->status }}</span>
                            @elseif ($item->status == 'Ditolak')
                                <span class="badge bg-danger">{{ $item->status }}</span>
                            @else
                                <span class="badge bg-warning">Sedang Diproses</span>
                            @endif
                        </td>

                        <td class="text-center">
                            {{-- DETAIL --}}
                            <button class="btn btn-sm btn-info"
                                    data-bs-toggle="modal"
                                    data-bs-target="#detailModal{{ $item->id }}">
                                <i class="bi bi-eye"></i>
                            </button>

                            {{-- EDIT STATUS --}}
                            <button class="btn btn-sm btn-warning"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editStatusModal{{ $item->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </td>
                    </tr>

                    {{-- ========================= --}}
                    {{-- MODAL DETAIL KETERANGAN SEHAT --}}
                    {{-- ========================= --}}
                    <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Surat Keterangan Sehat</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <h5 class="fw-bold">Data Dokter Pemeriksa</h5>
                                    <ul>
                                        <li>Nama Dokter: {{ $item->nama_dokter }}</li>
                                        <li>Nomor SIP: {{ $item->nomor_sip }}</li>
                                        <li>Instansi: {{ $item->instansi }}</li>
                                    </ul>

                                    <h5 class="fw-bold">Data Pasien</h5>
                                    <ul>
                                        <li>Nama: {{ $item->nama_pasien }}</li>
                                        <li>Jenis Kelamin: {{ $item->jenis_kelamin }}</li>
                                        <li>Tanggal Lahir: {{ $item->tanggal_lahir }}</li>
                                        <li>Pekerjaan: {{ $item->pekerjaan }}</li>
                                        <li>Alamat: {{ $item->alamat }}</li>
                                    </ul>

                                    <h5 class="fw-bold">Hasil Pemeriksaan</h5>
                                    <ul>
                                        <li>Tekanan Darah: {{ $item->tekanan_darah }}</li>
                                        <li>Nadi: {{ $item->nadi }}</li>
                                        <li>Tinggi Badan: {{ $item->tinggi_badan }} cm</li>
                                        <li>Berat Badan: {{ $item->berat_badan }} kg</li>
                                        <li>Suhu: {{ $item->suhu }} °C</li>
                                        <li>Buta Warna: {{ $item->buta_warna }}</li>
                                        <li>Riwayat Penyakit: {{ $item->riwayat_penyakit ?? '-' }}</li>
                                    </ul>

                                    <h5 class="fw-bold">Informasi Surat</h5>
                                    <ul>
                                        <li>Tujuan: {{ $item->tujuan }}</li>
                                        <li>Tempat Surat: {{ $item->tempat_surat }}</li>
                                        <li>Tanggal Surat: {{ $item->tanggal_surat }}</li>
                                    </ul>

                                </div>

                                <div class="modal-footer">
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- ========================= --}}
                    {{-- MODAL EDIT STATUS --}}
                    {{-- ========================= --}}
                    <div class="modal fade" id="editStatusModal{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Status Permohonan</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">
                                    <form action="{{ route('keterangan-sehat-dashboard.update', $item->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PUT')

                                        <div class="mb-3">
                                            <label class="form-label">Pilih Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="Sedang Diproses" {{ $item->status == 'Sedang Diproses' ? 'selected' : '' }}>Sedang Diproses</option>
                                                <option value="Disetujui" {{ $item->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                <option value="Ditolak" {{ $item->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                            </select>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                            <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal">
                                                Tutup
                                            </button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum ada pengajuan Surat Keterangan Sehat</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $dokumen->withQueryString()->links() }}
    </div>

</div>
@endsection
