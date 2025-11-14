@extends('main')

@section('content')
<center class="mt-4">
    <h1 class="mb-4">Permohonan</h1>
    <p>Halaman ini menampilkan informasi tentang proses permohonan.</p>
</center>

<div class="row mb-4">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-header">
                <strong>Form Permohonan</strong> 
            </div>
            <div class="card-header">
                <form action="{{ route('permohonan.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" 
                            value="{{ old('first_name', $data->first_name ?? '') }}" 
                            {{ $data ? 'readonly' : '' }}>
                    </div>

                    <div class="mb-3">
                        <label for="middle_name" class="form-label">Nama Tengah</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" 
                            value="{{ old('middle_name', $data->middle_name ?? '') }}" 
                            {{ $data ? 'readonly' : '' }}>
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" 
                            value="{{ old('last_name', $data->last_name ?? '') }}" 
                            {{ $data ? 'readonly' : '' }}>
                    </div>

                    @if (!$data)
                        <button type="submit" class="btn btn-primary">Kirim Permohonan</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    @endif
                    <a href="{{ url('/') }}" class="btn btn-danger">Back</a>
                </form>                    
            </div>
        </div>
    </div>
</div>
@endsection
