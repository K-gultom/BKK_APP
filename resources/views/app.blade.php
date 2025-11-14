<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Permohonan</title>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <a href="{{ route('permohonan') }}">Permohonan</a> | 
        <a href="{{ route('kelengkapan-dokumen') }}">Kelengkapan Dokumen</a> | 
        <a href="{{ route('verifikasi-lapangan') }}">Verifikasi Lapangan</a> | 
        <a href="{{ route('rapat-pleno') }}">Rapat Pleno</a> | 
        <a href="{{ route('rekomendasi') }}">Rekomendasi</a> | 
        <a href="{{ route('penerbitan-perizinan') }}">Penerbitan Perizinan</a> | 
        <a href="{{ route('pengusulan-ulang') }}">Pengusulan Ulang</a>
    </nav>
    @yield('content')
</body>
</html>
