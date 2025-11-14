@extends('dashboard-admin')

@section('content')
<div class="container-fluid">    
    <h3 class="mb-3 mt-2">Data Pegawai</h3>
    <nav aria-label="breadcrumb" class="mb-1">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col">
            <div class="card mt-3">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="w-100 pt-1">
                            <strong>Data Pegawai</strong>
                        </div>
                        <div class="w-100 text-end">
                            <a href="{{url('/pegawai')}}" class="btn btn-outline-primary btn-sm">
                                Refresh Data <i class="bi bi-arrow-clockwise"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if (Session::has('message'))
                        <div class="alert alert-success" id="flash-message">
                            {{Session::get('message')}}
                        </div>
                        <script>
                            setTimeout(function (){
                                document.getElementById('flash-message').style.display='none';
                            }, {{ session('timeout', 5000) }});
                        </script>
                    @endif

                    <div class="row mx-3 my-4">
                        <div class="col-6 bg-">
                            <a href="{{ url('/pegawai/add') }}" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addAdmin">
                                Pegawai Baru <i class="fa-solid fa-plus"></i>
                            </a>
                        </div>
                        <div class="col-6">
                            <form action="">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search" placeholder="Cari Nama Pegawai ...">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="bi bi-search"></i> Search
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="70px"></th>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td></td>
                                    <td>
                                        {{ (($data->currentPage() - 1) * $data->perPage()) + $loop->iteration }} 
                                    </td>
                                    <td>{{ $item->name }} </td>
                                    <td>{{ $item->email }} </td>
                                    <td class="text-center">{{ $item->phone }} </td>
                                    <td class="text-center">
                                        <a href="{{ url('/pegawai') }}/{{ $item->id }}" class="btn btn-warning btn-sm">
                                            <i class="bi bi-pencil"></i> Edit
                                        </a>
                                        
                                        <a href="{{ url('/pegawai/delete', ['id' => $item->id]) }}" class="btn btn-danger btn-sm" 
                                        onclick="return confirm('Hapus Data ???');">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>   
                            @endforeach
                        </tbody>
                    </table>
                    {{ $data->links() }}

                </div>
            </div>
        </div>
    </div>
</div>    

<!-- Modal Add New Data-->
<div class="modal fade" id="addAdmin" tabindex="-1" aria-labelledby="addAdmin" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addAdmin">Data Pegawai Baru</h1>
                <a href="{{ url('/pegawai') }}" type="button" class="btn-close"></a>
            </div>
            <form action="" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="number" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat Tinggal</label>
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <a href="{{ url('/pegawai') }}" type="button" class="btn btn-secondary">Close</a>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



<!-- JavaScript Functions -->
<script>
    @if ($errors->any())
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('addAdmin'));
            myModal.show();
        });
    @endif
    
</script>

@endsection