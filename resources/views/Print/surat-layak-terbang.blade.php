<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Perizinan</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 20mm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.4;
        }

        .dataTable {
            width: 100%;
            border-collapse: collapse;
        }
        .dataTable, .head, .tdData {
            border-color: black;
        }
        .head {
            padding: 8px;
            text-align: center;
            font-size: 14px;
        }
        .tdData {
            padding: 8px;
            text-align: left;
            font-size: 12px;
        }
        .tabelKopSurat{
            /* border: 1px solid black; */
            width: 100%;
            border-collapse: collapse;
            align-items: center;
            text-align: center;
            border-bottom: 1px solid black;
        }
        .abc {
            width: 100px;
            margin-bottom: 10px;
            
        }
        .desa {
            font-size: 12px;
            text-align: center;
        }
        .kanan{
            /* background-color: red; */
            text-align: center;
            align-items: center;
        }
        .kiri{
            line-height: 20px;
        }
        .isiSurat{
            /* text-align: center; */
        }
        footer {
            margin-top: 45px;
            text-align: center;
        }
        /* Style untuk table */
        table {
            width: 100%;
            margin-top: 20px;
        }

        table td {
            padding: 5px 0;
        }
    </style>
</head>

<body>

    <table class="tabelKopSurat">
        <tr class="barisKop">
            <td class="kanan"><img class="abc" src="images/logoKemen.jpg" alt=""></td>
            <td class="kiri">
                {{-- <div class="pemprov"><h1></h1></div> --}}
                <div class="oki"><h3>BKK - Balai Karantina Kesehatan Kelas 1 Palembang</h3></div>
                <div  class="desa">Jl Letjen Harun Sohar - Tjg Api Api Palembang, <br>Sumatera Selatan, 30761, 
                    Telp: 0711420103</div>
                {{-- <div  class="laporan">Laporan Data Surat Masuk</div> --}}
            </td>
        </tr>
    </table>


    <!-- JUDUL SURAT -->
    <div class="letter-title">
        <center>
            <h4>Surat Izin Layak Terbang</h4>
            <p>Nomor: {{ $surat->id }}/SILT/{{ $surat->created_at->format('m') }}/{{ $surat->created_at->format('Y') }}</p>
        </center>
            <p>Tanggal Terbit: {{ $surat->created_at->format('d M Y') }}</p>
    </div>

    <!-- ISI SURAT -->
    <table class="isiSurat">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $surat->user->name }}</td>
        </tr>
        <tr>
            <td>NIK</td>
            <td>:</td>
            <td>{{ $surat->nomor_identitas }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $surat->user->address }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $surat->user->email }}</td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>:</td>
            <td>{{ $surat->user->phone }}</td>
        </tr>
        <tr>
            <td>Tanggal Pemeriksaan </td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($surat->tgl_pemeriksaan)->format('d M Y') }}</td>
        </tr>
        <tr>
            <td>Tanggal Rencana Penerbangan </td>
            <td>:</td>
            <td>{{ \Carbon\Carbon::parse($surat->tgl_penerbangan)->format('d M Y') }}</td>
        </tr>
        <tr>
            <td>Kota Asal </td>
            <td>:</td>
            <td>{{ $surat->kota_asal }}</td>
        </tr>
        <tr>
            <td>Kota Tujuan </td>
            <td>:</td>
            <td>{{ $surat->kota_tujuan }}</td>
        </tr>
    </table>
<hr>
    <table>
         <tr>
            <h2>Data Petugas Pemeriksa</h2>
        </tr>
        <tr>
            <td>Nama Dokter</td>
            <td>:</td>
            <td>{{ $surat->nama_dokter }}</td>
        </tr>
        <tr>
            <td>No. SIP Dokter</td>
            <td>:</td>
            <td>{{ $surat->nomor_sip }}</td>
        </tr>
        <tr>
            <td>Instansi</td>
            <td>:</td>
            <td>{{ $surat->instansi }}</td>
        </tr>
    </table>

    <p>Dengan ini pemohon di <strong>IZIN</strong>kan untuk melakukan penerbangan sesuai ketentuan yang berlaku </p>

    <footer>
        <p>Surat ini berlaku sampai dengan 15 Hari setelah surat dibuat</p>
    </footer>

</body>
</html>
