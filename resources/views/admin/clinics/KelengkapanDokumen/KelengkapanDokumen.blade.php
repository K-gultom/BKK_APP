@extends('dashboard-admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Permohonan Izin Praktik</h4>
        <div>
            <a href="{{ url('/admin/kelengkapan-dokumen') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-clockwise"></i> Refresh
            </a>
        </div>
    </div>
    

    {{-- Search Form --}}
    <div class="row mb-3">
        <div class="col-md-4">
            <form method="GET" action="{{ route('admin.permohonan.index') }}">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari data..." value="{{ request('search') }}">
                    <button class="btn btn-outline-secondary" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Data Table --}}
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="">
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Tgl Pengajuan</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">No HP</th>
                    <th class="text-center">Status Permohonan</th>
                    <th class="text-center">Dokumen</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tbody>
                    @forelse ($dokumen as $index => $item)
                        <tr>
                            <td class="text-center">{{ ($dokumen->currentPage() - 1) * $dokumen->perPage() + $index + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="text-center">{{ $item->created_at->format('d-m-Y') }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            
                            <td class="text-center">
                                @if ($item->status == 'Ditolak')
                                    <span class="badge bg-danger">{{ $item->status }}</span>
                                @elseif ($item->status == 'Disetujui')
                                    <span class="badge bg-success">{{ $item->status }}</span>
                                @else
                                    <span class="badge bg-warning">{{ $item->status }}</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <div class="d-flex justify-content-between">
                                    <!-- KTP Button (kiri) -->
                                    <a href="{{ asset('storage/' . $item->document_ktp) }}" target="_blank" class="btn btn-sm btn-primary">KTP</a>
                            
                                    <!-- STR Button (kanan) -->
                                    <a href="{{ asset('storage/' . $item->document_str) }}" target="_blank" class="btn btn-sm btn-primary">STR</a>
                            
                                    <!-- Ijazah Button (kanan) -->
                                    <a href="{{ asset('storage/' . $item->document_ijazah) }}" target="_blank" class="btn btn-sm btn-primary">Ijazah</a>
                                </div>
                            </td>
                            

                            <td class="text-center">
                               
                                {{-- Edit Status Button --}}
                                <button type="button" class="btn btn-sm btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#editStatusModal{{ $item->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>
                            </td>
                            
                        </tr>

                        
                        {{-- Modal for editing status --}}
                        <div class="modal fade" id="editStatusModal{{ $item->id }}" tabindex="-1" aria-labelledby="editStatusModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editStatusModalLabel">Edit Status Permohonan</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('admin.updateStatus', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Pilih Status</label>
                                                <select name="status" id="status" class="form-control" required>
                                                    <option value="Diproses" {{ $item->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                                    <option value="Disetujui" {{ $item->status == 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                                                    <option value="Ditolak" {{ $item->status == 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="reason" class="form-label">Alasan Tidak Sesuai (Jika Ditolak)</label>
                                                <textarea name="reason" id="reason" class="form-control" placeholder="Masukkan alasan jika status ditolak">{{ $item->reason ?? '' }}</textarea>
                                            </div>

                                            <div class="d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                                <button type="button" class="btn btn-secondary ms-2" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @empty
                        <tr><td colspan="6" class="text-center">Tidak ada data dokumen</td></tr>
                    @endforelse
                </tbody>
                
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{ $dokumen->withQueryString()->links() }}
    </div>
</div>



@endsection