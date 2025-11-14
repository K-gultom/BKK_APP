
<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="d-none d-md-flex align-items-center">
                <i class="bi bi-clock me-1"></i>
                <span id="operational-hours"></span>
            </div>
            <div class="d-flex align-items-center">
                <i class="bi bi-phone me-1"></i>
                Call us now 0711420103
            </div>
        </div>
    </div>
    <!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

        <div
            class="container position-relative d-flex align-items-center justify-content-end">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto">
                <img class="rounded" src="{{ asset('images/logoo.png') }}" alt="">
                <!-- Uncomment the line below if you also wish to use a text logo -->
                 <h1 class="sitename">BKK Palembang</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li>
                        <a href="{{ url('/') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
                    </li>

                    <li>
                        <a href="{{ route('surat') }}" class="{{ Request::is('surat') ? 'active' : '' }}">Surat</a>
                    </li>

                    {{-- <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li> --}}

                    @if (Auth::user())
                        
                        <li>
                            <a href="{{ url('/logout') }}">Logout</a>
                        </li>
                    @else
                        <li>
                            <a href="{{ url('/login') }}">Login</a>
                        </li>
                    @endif
                    {{-- <li class="dropdown">
                        <a href="#">
                            <span>Login/Logout?</span>
                            <i class="bi bi-chevron-down toggle-dropdown"></i>
                        </a>
                        <ul>
                            <li>
                                <a href="{{ url('/login') }}">Login</a>
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}">Logout</a>
                            </li>
                            
                        </ul>
                    </li> --}}
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            {{-- <a class="cta-btn" href="index.html#appointment">Make an Appointment</a> --}}

        </div>

    </div>

    <script>
        // Mendapatkan elemen dengan id 'operational-hours'
        const operationalHoursElement = document.getElementById('operational-hours');
    
        // Mendapatkan tanggal dan waktu saat ini
        const currentDate = new Date();
    
        // Format hari
        const daysOfWeek = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        const dayName = daysOfWeek[currentDate.getDay()];
    
        // Format waktu (Jam:Menit:Detik)
        const hours = currentDate.getHours();
        const minutes = currentDate.getMinutes();
        // const seconds = currentDate.getSeconds();
        const formattedTime = `${hours}:${minutes < 10 ? '0' + minutes : minutes}`;
    
        // Format tanggal
        const day = currentDate.getDate();
        const month = currentDate.getMonth() + 1;  // Bulan dimulai dari 0 (Januari = 0)
        const year = currentDate.getFullYear();
        const formattedDate = `${dayName}, ${day}/${month}/${year}`;
    
        // Menampilkan hasil ke dalam elemen
        operationalHoursElement.innerHTML = `${formattedDate}, ${formattedTime}`;
    </script>
</header>