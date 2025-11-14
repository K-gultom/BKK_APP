@extends('main') 

@section('content') 


<main>

    <center class="mt-4">
        <h3 class="mt-3">Surat Perizinan</h3>
        <h5>Pilih jenis surat sesuai kebutuhan Anda</h5>
    </center>

    <!-- Featured Services Section -->
    <section id="featured-services" class="featured-services section">

        <div class="container">

            <div class="row gy-4">

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-house-chimney-medical"></i>
                        </div>
                        <h4>
                            <a href="kelengkapan-dokumen" class="stretched-link">Surat Izin Praktik</a>
                        </h4>
                        <p>Siapkan Segala Sesuatu sesuai dengan form pada halaman Surat Izin Praktik</p>
                    </div>
                </div>
                <!-- End Service Item -->


                
                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-globe"></i>
                        </div>
                        <h4>
                            <a href="{{ url('/surat-layak-terbang') }}" class="stretched-link">Surat izin layak terbang</a>
                        </h4>
                        <p>Siapkan Segala Sesuatu sesuai dengan form pada halaman Surat layak terbang</p>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-truck-medical"></i>
                        </div>
                        <h4>
                            <a href="pengangkutan-jenazah" class="stretched-link">Surat izin pengangkutan jenazah</a>
                        </h4>
                        <p>Siapkan Segala Sesuatu sesuai dengan form pada halaman Surat izin pengangkutan jenazah</p>
                    </div>
                </div>
                <!-- End Service Item -->

                <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon">
                            <i class="fa-solid fa-briefcase-medical"></i>
                        </div>
                        <h4>
                            <a href="keterangan-sehat" class="stretched-link">Surat Keterangan Sehat</a>
                        </h4>
                        <p>Siapkan Segala Sesuatu sesuai dengan form pada halaman Surat Keterangan Sehat</p>
                    </div>
                </div>
                <!-- End Service Item -->
            </div>

        </div>

    </section>
    <!-- /Featured Services Section -->

</main>

@endsection