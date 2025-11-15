<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name') }} </title>
    <!-- Bootstrap Assets CSS -->

    {{-- NOTICE THIS --}}
    <link rel="stylesheet" href="{{ url('assets/bootstrap5/css/bootstrap.min.css') }}">


    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    {{-- Bootstrap ICON --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <script src="https://kit.fontawesome.com/f181524b5b.js" crossorigin="anonymous"></script>

    <style>
        body {
            position: relative;
        }
        .side:hover {
            background-color: rgb(39, 113, 116);
            padding-block: false;
        }
        .navbar {
            background-color: rgb(22, 156, 161);
        }
        .navbar-brand {
            margin-left: 20px;
            font-size: 25px;
            font-weight: 600;
        }
        .clr {
            background-color: #329497;
            box-shadow: 10px 10px 20px 5px rgb(194, 194, 194);
            
        }
        .head {
            color: #ffffff;
        }
        .head:hover {
            color: #ffffff;
        }
        .content-wrap {
            min-height: 100%;
            padding-bottom: 50px;
        }
        footer {
            background-color: #000000FF;
            color: #fff;
            height: 50px;
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            text-align: center;
        }
        .foot{
            margin-bottom: 150px;
        }
        .dropHover:hover{
            color: #fff;
            background-color: rgb(39, 113, 116);
        }
        .nav-link.active {
            background-color: rgb(39, 113, 116); /* Adjust to your desired active background color */
            color: white !important; /* Ensure the text color is visible */
        }

    </style>
</head>

<body>


    @include('sweetalert::alert')



<div class="d-flex">
    <div class="clr max-height-vh-100 min-vh-100" >
        <nav class="nav flex-column">
            <div class="container mt-3" style="padding-right: 50px">
                <a class="head navbar-brand mt-3" href="#">
                    <img class="rounded" src="{{ asset('/images/logoo.png') }}" height="60">
                    BKK Kelas 1 Palembang
                </a>
                <h3 class="head m-3"></h3>
            </div>
            
            <!-- Menu Side Bar -->
                    {{-- Menu Dahboard --}}
                    <a href="{{ url('/dashboard') }}" class="px-1 side nav-item nav-link {{ Request::is('dashboard') ? 'active' : '' }} text-light">
                        <i class="bi bi-house-fill mx-2"></i> Dashboard
                    </a>

                    {{-- Menu Data Admin --}}
                    <a href="{{ url('/pegawai') }}" class="px-1 side nav-item nav-link {{ Request::is('pegawai') ? 'active' : '' }} text-light">
                        <i class="bi bi-file-earmark-person-fill mx-2"></i> Data Pegawai
                    </a>

                    <hr>

                    <a href="{{ route('admin.kelengkapan-dokumen.index') }}" class="px-1 side nav-item nav-link {{ Request::is('admin/kelengkapan-dokumen') ? 'active' : '' }} text-light">
                        <i class="bi bi-clipboard-data-fill mx-2"></i> Surat Izin Praktik
                    </a>

                    <a href="{{ route('surat-layak-terbang-dashboard.index') }}" class="px-1 side nav-item nav-link {{ Request::is('surat-layak-terbang-dashboard') ? 'active' : '' }} text-light">
                        <i class="fa-solid fa-globe mx-2"></i> Surat Layak Terbang
                    </a>

                    <a href="" class="px-1 side nav-item nav-link {{ Request::is('transaksi') ? 'active' : '' }} text-light">
                        <i class="fa-solid fa-truck-medical mx-2"></i> Surat Izin Angkut Jenazah
                    </a>

                    <a href="{{ route('keterangan-sehat-dashboard.index') }}" class="px-1 side nav-item nav-link {{ Request::is('keterangan-sehat-dashboard') ? 'active' : '' }} text-light">
                        <i class="fa-solid fa-briefcase-medical mx-2"></i> Surat Keterangan Sehat
                    </a>

                    <hr>
                {{-- Menu Logout --}}
                <a href="{{ url('/logout') }}" class="px-1 side nav-item nav-link text-light mt-2">
                    <i class="fa-solid fa-power-off mx-2"></i> Logout
                </a>
        </nav>            
    </div>

    <div class="col">
        <nav class="navbar navbar-dark navbar-expand-lg border-left-1">
            <div class="container-fluid">
                <div class="d-flex align-items-center">
                    <button id="toggleMenuBtn" class="btn btn-light me-2"><i class="fas fa-bars"></i></button>

                    <a class="navbar-brand" href="">
                        {{-- Hai --}}
                        Hai {{Auth()->User()->name}}
                    </a>  
                </div>
            </div>
        </nav>

        <div class="mx-2 p-1 foot">
            @yield('content')
        </div> 

        <footer class="text-center p-3">
            &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </footer>
    </div>
</div>

<!-- Bootstrap Bundle with Popper -->
<script src="{{ url('assets/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toggleMenuBtn = document.getElementById('toggleMenuBtn');
        const sidebar = document.querySelector('.clr');

        // Atur visibilitas saat pertama kali halaman dimuat
        function initializeSidebar() {
            if (window.innerWidth < 1000) {
                sidebar.classList.add('d-none');
            } else {
                sidebar.classList.remove('d-none');
            }
        }

        // Toggle sidebar saat tombol diklik
        toggleMenuBtn.addEventListener('click', function () {
            sidebar.classList.toggle('d-none');
        });

        // Ubah visibilitas sidebar saat window di-resize
        window.addEventListener('resize', function () {
            if (window.innerWidth >= 1000) {
                sidebar.classList.remove('d-none');
            } else {
                sidebar.classList.add('d-none');
            }
        });

        initializeSidebar();
    });
</script>


</body>
</html>