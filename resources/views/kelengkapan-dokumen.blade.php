@extends('main') 
@section('content')

<center class="mt-4">
    <h1>Surat Izin Praktik - Kelengkapan Dokumen</h1>
    @if ($data)
        <p>Silakan menunggu, dokumen anda sedang diproses.</p>
    @else
        <p>Silakan lengkapi dokumen berikut untuk proses izin praktik.</p>
    @endif
</center>

<div class="row">
    <div class="col-6 offset-3">
        <div class="card">
            <div class="card-header"><strong>Form Kelengkapan Dokumen</strong></div>
            <div class="card-body">
                <form
                    action="{{ route('kelengkapan-dokumen.store') }}"
                    method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label>Nama Lengkap Sesuai KTP</label>
                        <input type="text" name="name" class="form-control" required
                            value="{{ old('name', $data->name ?? '') }}"
                            {{ $data ? 'readonly' : '' }}>
                    </div>

                    <div class="mb-3">
                        <label>NIK</label>
                        <input type="text"
                            name="nik"
                            class="form-control"
                            required
                            maxlength="16"
                            inputmode="numeric"
                            pattern="\d*"
                            oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);"
                            value="{{ old('nik', $data->nik ?? '') }}"
                            {{ $data ? 'readonly' : '' }}>
                    </div>
                    

                    <div class="mb-3">
                        <label>Email</label>
                        <input readonly type="email" name="email" class="form-control" required
                            value="{{ old('email', $user_Info->email) }}">
                    </div>

                    <div class="mb-3">
                        <label>No. Telepon</label>
                        <input readonly type="text" name="phone" class="form-control" required
                            value="{{ old('phone', $user_Info->phone) }}">
                    </div>

                    <div class="mb-3">
                        <label>Nama Tempat Praktik</label>
                        <input type="text" name="practice_place" class="form-control" required
                            value="{{ old('practice_place', $data->practice_place ?? '') }}"
                            {{ $data ? 'readonly' : '' }}>
                    </div>

                    <div class="mb-3">
                        <label>Alamat Tempat Praktik</label>
                        <textarea name="practice_address" class="form-control" required
                            {{ $data ? 'readonly' : '' }}>{{ old('practice_address', $data->practice_address ?? '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label>Upload KTP</label>
                        @if ($data)
                            <p><a href="{{ asset('storage/' . $data->document_ktp) }}" target="_blank">Lihat File</a></p>
                        @else
                            <input type="file" name="document_ktp" class="form-control" required>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label>Upload STR</label>
                        @if ($data)
                            <p><a href="{{ asset('storage/' . $data->document_str) }}" target="_blank">Lihat File</a></p>
                        @else
                            <input type="file" name="document_str" class="form-control" required>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label>Upload Ijazah</label>
                        @if ($data)
                            <p><a href="{{ asset('storage/' . $data->document_ijazah) }}" target="_blank">Lihat File</a></p>
                        @else
                            <input type="file" name="document_ijazah" class="form-control" required>
                        @endif
                    </div>

                    @if (!$data)
                        <button type="submit" class="btn btn-primary">Kirim</button>
                        <button type="reset" class="btn btn-warning">Reset</button>
                    @endif

                    <a href="{{ url('/') }}" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
