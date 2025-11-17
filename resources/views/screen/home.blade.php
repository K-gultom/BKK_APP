@extends('main') 

@section('content') 


<main>

    <section style="position: relative; height: 80vh; background-image: url('{{ asset('images/bkk.jpg') }}'); background-size: cover; background-position: center;">
        <!-- Hero Section with Background Image -->
        <div class="hero-overlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5);">
            <div class="container d-flex align-items-center justify-content-center text-center text-white" style="height: 100%; z-index: 10;">
                <div>
                    <h1 class="mb-4 text-light bold">Selamat Datang</h1>
                    <p>Ini Adalah Website Pengajuan Permohonan Perizinan Tempat Praktik. <br>
                        Website ini Diawasi langsung oleh Kantor Kesehatan Pelabuhan Palembang.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

        <div class="container">

            <div class="row gy-4">
                <!-- Kolom kiri: Persyaratan Izin -->
                <div class="@auth col-4 @endauth @guest col-6 @endguest  d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative w-100">
                        <div class="icon">
                            <i class="fa-solid fa-triangle-exclamation"></i>
                        </div>
                        <h4>
                            <a href="{{ route('persyaratan.izinPraktik') }}" class="stretched-link">Persyaratan Mengajukan Izin</a>
                        </h4>
                        <p>Usulkan Surat Perizinan Anda, Sesuai dengan Surat Perizinan yang Anda butuhkan!!!</p>
                    </div>
                </div>
                
                @guest
                <!-- Kolom kanan: Ajakan register/login -->
                <div class="col-6 d-flex align-items-center justify-content-center" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative text-center w-100 p-3 border rounded">
                        <div class="icon">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                        <h4>Mau buat surat?</h4>
                        <p>Yuk register/login sekarang untuk mengajukan surat perizinan!</p>
                        <a href="{{ route('register') }}" class="btn btn-primary mt-2">Register</a>
                        <a href="{{ route('login') }}" class="btn btn-outline-primary mt-2">Login</a>
                    </div>
                </div>
                @endguest

                @auth
                <!-- Kolom untuk user login -->
                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative w-100">
                        <div class="icon">
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <h4>
                            <a href="verifikasi-lapangan" class="stretched-link">Verifikasi Lapangan</a>
                        </h4>
                        <p>Lihat disini Apakah Status Permohonan Anda dalam proses, disetujui atau ditolak</p>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative w-100">
                        <div class="icon">
                            <i class="fa-solid fa-print"></i>
                        </div>
                        <h4>
                            <a href="penerbitan-perizinan" class="stretched-link">Penerbitan Perizinan</a>
                        </h4>
                        <p>Unduh Surat Perizinan Anda Pada halaman Berikut</p>
                    </div>
                </div>
                @endauth

            </div>

        </div>

    </section>
    <!-- /Featured Services Section -->

</main>

@endsection