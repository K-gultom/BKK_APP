@extends('dashboard-admin')

@section('content')
<div class="container-fluid">   
    <h3 class="mb-3 mt-2">Data Admin</h3>
    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/pegawai')}}">Data Admin</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Data Admin</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit Data</div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                            <div class="row">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" value="{{ $getData->name }}" class="form-control" id="name" name="name">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" value="{{ $getData->email }}" class="form-control" id="email" name="email">
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="number" value="{{ $getData->phone }}" class="form-control" id="phone" name="phone">
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Alamat Tinggal</label>
                                    <textarea class="form-control" id="address" name="address" rows="3">{{ $getData->address }}</textarea>
                                </div>
                                <div class="col-12">
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="password">Password Baru??</label>
                                        <input type="text" value="{{ old('password') }}" name="password" id="pegawai-password" class="form-control @error('password') is-invalid @enderror" placeholder="Password Anda..."/>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <input type="hidden" name="level" value="admin"> --}}
                            </div>

                        <button type="submit" class="btn btn-primary">Save Update</button>
                        <a href="{{ url('/pegawai') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection