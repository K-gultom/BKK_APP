@extends('dashboard-admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Verifikasi Lapangan</h4>
        <div>
            <a href="{{ url('/admin/verifikasi-lapangan') }}" class="btn btn-outline-secondary me-2">
                <i class="bi bi-arrow-clockwise"></i> Refresh
            </a>
        </div>
    </div>
    

    {{-- Search Form --}}
    <div class="row mb-3">
        <div class="col-md-4">
            <form method="GET" action="{{ route('admin.verifikasi-lapangan.index') }}">
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
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Status Permohonan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                {{-- @forelse ($admins as $admin)
                    <tr>
                        <td>{{ (($admins->currentPage() - 1) * $admins->perPage()) + $loop->iteration }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>{{ $admin->no_hp }}</td>
                        <td>{{ ucfirst($admin->role) }}</td>
                        <td class="text-center">
                            
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Tidak ada data admin</td></tr>
                @endforelse --}}
            </tbody>
        </table>
    </div>

    <div class="mt-3">
        {{-- {{ $admins->withQueryString()->links() }} --}}
    </div>
</div>

@endsection