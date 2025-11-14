@extends('main')

@section('content')

    <center class="mt-4">
        <h1>Penerbitan Perizinan</h1>
        <p>Berikut daftar pemohon yang sudah siap diterbitkan surat izinnya:</p>
    </center>

    <br>

    {{-- Surat Izin Praktik --}}
    <center class="mt-4">
        <h1>Surat Izin Praktik</h1>
        <p>Berikut Hasil pengajuan Surat Izin Praktik Anda:</p>
    </center>
    <div class="row mb-4">
        <div class="col-6 offset-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">No. HP</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr>
                            <td>{{ ($users->currentPage() - 1) * $users->perPage() + $index + 1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td class="text-center">
                                <a href="{{ route('surat-izin.generate', $user->id) }}" class="btn btn-primary" target="_blank">
                                    Unduh <i class="bi bi-cloud-download"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Maaf Data Tidak Ada</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $users->withQueryString()->links() }}
            </div>

        </div>
    </div>


    {{-- Surat Layak Terbang --}}
    <center class="mt-5">
        <h2>Surat Layak Terbang</h2>
        <p>Berikut Hasil pengajuan Surat Layak Terbang Anda:</p>
    </center>
    <div class="row mb-4">
        <div class="col-6 offset-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Nama Pasien</th>
                        <th class="text-center">Tanggal Penerbangan</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($layakTerbang as $index => $surat)
                        <tr>
                            <td>{{ ($layakTerbang->currentPage() - 1) * $layakTerbang->perPage() + $index + 1 }}</td>
                            <td>{{ $surat->nama_pasien }}</td>
                            <td>{{ \Carbon\Carbon::parse($surat->tgl_penerbangan)->format('d-m-Y') }}</td>
                            <td class="text-center">
                                @if($surat->status == 'Sedang Diproses')
                                    <span class="badge bg-warning">{{ $surat->status }}</span>
                                @elseif($surat->status == 'Disetujui')
                                    <span class="badge bg-success">{{ $surat->status }}</span>
                                @elseif($surat->status == 'Ditolak')
                                    <span class="badge bg-danger">{{ $surat->status }}</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('surat-layak-terbang.show', $surat->id) }}" class="btn btn-primary" target="_blank">
                                    Unduh <i class="bi bi-cloud-download"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Maaf Anda belum pernah membuat pengajuan Surat Layak Terbang</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{ $layakTerbang->withQueryString()->links() }}
            </div>
        </div>
    </div>

    <center class="m-4">
        <a href="{{ url('/') }}" class="btn btn-danger">Back</a>
    </center>

@endsection
