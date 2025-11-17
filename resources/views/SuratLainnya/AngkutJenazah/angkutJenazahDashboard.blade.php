@extends('dashboard-admin')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Permohonan Pengangkutan Jenazah</h4>
        <div>
            <a href="{{ url('/pengangkutan-jenazah-dashboard') }}" class="btn btn-outline-secondary me-2">
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
            <form method="GET" action="{{ url('/pengangkutan-jenazah-dashboard') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control"
                           placeholder="Cari nama jenazah..."
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
                    <th class="text-center">Nama Jenazah</th>
                    <th class="text-center">Kota Tujuan</th>
                    <th class="text-center">Tanggal Pengajuan</th>
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

                        <td>{{ $item->deceased_name }}</td>

                        <td class="text-center">{{ $item->destination_city }}</td>

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

                    {{-- ============================= --}}
                    {{-- MODAL DETAIL PENGANGKUTAN JENAZAH --}}
                    {{-- ============================= --}}
                    <div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <div class="modal-header">
                                    <h5 class="modal-title">Detail Pengangkutan Jenazah</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <div class="modal-body">

                                    <h5 class="fw-bold">Data Jenazah</h5>
                                    <ul>
                                        <li>Nama: {{ $item->deceased_name }}</li>
                                        <li>Jenis Kelamin: {{ $item->gender }}</li>
                                        <li>Tempat Lahir: {{ $item->birth_place }}</li>
                                        <li>Tanggal Lahir: {{ $item->birth_date }}</li>
                                        <li>Kewarganegaraan: {{ $item->nationality }}</li>
                                        <li>NIK / Identitas: {{ $item->identity_number }}</li>
                                        <li>Tanggal Meninggal: {{ $item->date_of_death }}</li>
                                        <li>Tempat Meninggal: {{ $item->place_of_death }}</li>
                                        <li>Penyebab Kematian: {{ $item->cause_of_death }}</li>
                                    </ul>

                                    <h5 class="fw-bold">Rincian Pengiriman</h5>
                                    <ul>
                                        <li>Transportasi: {{ $item->transport_method }}</li>
                                        <li>Maskapai / Jasa Pengangkut: {{ $item->carrier_name }}</li>
                                        <li>No. Penerbangan: {{ $item->flight_number ?? '-' }}</li>
                                        <li>Jadwal Pengiriman: {{ $item->shipping_datetime }}</li>
                                        <li>Kota Asal: {{ $item->origin_city }}</li>
                                        <li>Kota Tujuan: {{ $item->destination_city }}</li>
                                        <li>Alamat Tujuan: {{ $item->destination_address }}</li>
                                    </ul>

                                    <h5 class="fw-bold">Penanggung Jawab</h5>
                                    <ul>
                                        <li>Nama: {{ $item->recipient_name }}</li>
                                        <li>Telepon: {{ $item->recipient_phone }}</li>
                                    </ul>

                                    <h5 class="fw-bold">Penanganan Jenazah</h5>
                                    <ul>
                                        <li>Pembalseman: {{ $item->embalmed ? 'Ya' : 'Tidak' }}</li>
                                        <li>Catatan Pembalseman: {{ $item->embalming_notes ?? '-' }}</li>
                                        <li>Peti Disegel: {{ $item->sealed_coffin ? 'Ya' : 'Tidak' }}</li>
                                    </ul>

                                    <h5 class="fw-bold">Dokumen Medis</h5>
                                    @if ($item->medical_certificate)
                                        <a href="{{ asset('storage/' . $item->medical_certificate) }}"
                                           target="_blank" class="btn btn-primary">
                                            <i class="bi bi-file-earmark"></i> Lihat Dokumen
                                        </a>
                                    @else
                                        <p class="text-muted">Tidak ada dokumen diunggah.</p>
                                    @endif

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
                                    <form action="{{ route('pengangkutan-jenazah-dashboard.update', $item->id) }}"
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
                        <td colspan="6" class="text-center">Belum ada pengajuan Pengangkutan Jenazah</td>
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
