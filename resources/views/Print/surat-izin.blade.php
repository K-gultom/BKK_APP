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
            <h4>Surat Izin Beroperasi</h4>
            <p>Nomor: {{ $getData->id }}/IZIN/{{ $getData->created_at->format('m') }}/{{ $getData->created_at->format('Y') }}</p>
        </center>
            <p>Tanggal Terbit: {{ $getData->created_at->format('d M Y') }}</p>
    </div>

    <!-- ISI SURAT -->
    <table class="isiSurat">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $getData->name }}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{ $getData->getUser->address }}</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>{{ $getData->email }}</td>
        </tr>
        <tr>
            <td>Nomor KTP</td>
            <td>:</td>
            <td>{{ $getData->nik }}</td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td>:</td>
            <td>{{ $getData->phone }}</td>
        </tr>
        <tr>
            <td>Tempat Praktik</td>
            <td>:</td>
            <td>{{ $getData->practice_place }}</td>
        </tr>
        <tr>
            <td>Alamat Praktik</td>
            <td>:</td>
            <td>{{ $getData->practice_address }}</td>
        </tr>
    </table>

    <footer>
        <p>Surat ini berlaku sampai dengan {{ \Carbon\Carbon::parse($getData->created_at)->addYear()->format('d M Y') }}</p>
    </footer>

</body>
</html>
