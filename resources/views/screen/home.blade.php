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

                {{-- <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-regular fa-folder-open"></i>
                        </div>
                        <h4>
                            <a href="kelengkapan-dokumen" class="stretched-link">Permohonan & Kelengkapan Dokumen</a>
                        </h4>
                        <p>Siapkan Segala Sesuatu sesuai dengan form pada halaman Permohonan & Kelengkapan Dokumen</p>
                    </div>
                </div> --}}
                <!-- End Service Item -->

                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            {{-- <i class="fas fa-thermometer icon"></i> --}}
                            <i class="fa-regular fa-envelope"></i>
                        </div>
                        <h4>
                            <a href="verifikasi-lapangan" class="stretched-link">Verifikasi Lapangan</a>
                        </h4>
                        <p>Lihat disini Apakah Status Permohonan Anda dalam proses, disetujui atau ditolak</p>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            {{-- <i class="fa-solid fa-book"></i> --}}
                            <i class="fa-solid fa-print"></i>
                        </div>
                        <h4>
                            <a href="penerbitan-perizinan" class="stretched-link">Penerbitan Perizinan</a>
                        </h4>
                        <p>Unduh Surat Perizinan Anda Pada halaman Berikut</p>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-repeat"></i>
                        </div>
                        <h4>
                            <a href="pengusulan-ulang" class="stretched-link">Pengusulan Ulang</a>
                        </h4>
                        <p>Usulkan Ulang Surat Perizinan Anda, Sesuai dengan masa berlaku Surat Perizinan Anda</p>
                    </div>
                </div>
                <!-- End Service Item -->

            </div>

        </div>

    </section>
    <!-- /Featured Services Section -->

</main>

@endsection