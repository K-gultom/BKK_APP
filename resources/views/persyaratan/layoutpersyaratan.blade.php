@extends('main')

@section('content')
<div class="container mt-4">

    <h3 class="mb-4">Halaman Persyaratan</h3>

    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Persyaratan</li>
        </ol>
    </nav>
    

    <ul class="nav nav-tabs custom-tabs mb-4 mt-4">

        <li class="nav-item">
            <a class="nav-link {{ request()->is('persyaratan/izin-praktik') ? 'active' : '' }}"
               href="{{ route('persyaratan.izinPraktik') }}">
                izin praktik
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('persyaratan/layak-terbang') ? 'active' : '' }}"
               href="{{ route('persyaratan.layakTerbang') }}">
                Layak Terbang
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('persyaratan/pengangkutan-jenazah') ? 'active' : '' }}"
               href="{{ route('persyaratan.pengangkutanJenazah') }}">
                Pengangkutan Jenazah
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('persyaratan/keterangan-sehat') ? 'active' : '' }}"
               href="{{ route('persyaratan.keteranganSehat') }}">
                Keterangan Sehat
            </a>
        </li>

    </ul>

    {{-- Konten Halaman --}}
    <div class="content">
        @yield('contentpersyaratan')
    </div>

</div>

{{-- CSS Custom --}}
<style>
    /* Bersihkan bootstrap default */
    .custom-tabs .nav-link {
        border: none !important;
        color: #6c757d;
        font-weight: 500;
        padding: 10px 18px;
        position: relative;
        transition: all 0.25s ease;
    }

    /* Hover animasi */
    .custom-tabs .nav-link:hover {
        color: #000;
    }

    /* Underline smooth */
    .custom-tabs .nav-link::after {
        content: "";
        position: absolute;
        height: 3px;
        width: 0;
        left: 0;
        bottom: -2px;
        background-color: #0d6efd;
        transition: width 0.3s ease;
        border-radius: 20px;
    }

    .custom-tabs .nav-link:hover::after {
        width: 100%;
    }

    /* Active */
    .custom-tabs .nav-link.active {
        color: #000;
        font-weight: 600;
    }

    .custom-tabs .nav-link.active::after {
        width: 100%;
    }
</style>

@endsection



{{-- tolong buatkan syntax html blade bootstrap untuk draft kebutuhan pengisian, apa saja yang persyaratan yang perlu disiapkan user --}}