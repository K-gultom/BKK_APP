@extends('main')

@section('content')

    <center class="mt-4">
        <h1>Pengusulan Ulang</h1>
        <p>Halaman ini berisi informasi tentang pengusulan ulang.</p>
    </center>

    <div class="row mb-4">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header">
                    Form Pengusulan Ulang
                </div>
                <div class="card-body">
                    <center>
                        <a href="{{ url('/kelengkapan-dokumen') }}" class="btn btn-primary">
                            Usulkan Ulang Surat Izin?
                        </a>
                    </center>
                </div>
            </div>
            
            <a href="{{ url('/') }}" class="btn btn-danger">Back</a>
        </div>
    </div>
@endsection
