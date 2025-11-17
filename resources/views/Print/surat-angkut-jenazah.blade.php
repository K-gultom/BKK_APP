<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Pengangkutan Jenazah</title>

    <style>
        @page {
            size: A4 portrait;
            margin: 20mm;
        }

        body {
            font-family: 'Times New Roman', Times, serif;
            font-size: 12pt;
            line-height: 1.5;
        }

        .tabelKopSurat {
            width: 100%;
            border-collapse: collapse;
            border-bottom: 1px solid black;
        }

        .abc {
            width: 100px;
        }

        .desa {
            font-size: 11px;
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 15px;
        }

        table td {
            padding: 4px 0;
        }
    </style>
</head>

<body>

    <!-- Kop Surat -->
    <table class="tabelKopSurat">
        <tr>
            <td style="width: 120px;">
                <img class="abc" src="images/logoKemen.jpg" alt="Logo">
            </td>
            <td>
                <h3 style="margin:0;">BKK - Balai Karantina Kesehatan Kelas 1 Palembang</h3>
                <div class="desa">
                    Jl Letjen Harun Sohar - Tjg Api Api, Palembang<br>
                    Sumatera Selatan, 30761<br>
                    Telp: 0711-420103
                </div>
            </td>
        </tr>
    </table>

    <!-- Judul -->
    <div style="text-align:center; margin-top:15px;">
        <h4 style="margin-bottom:3px;">Surat Keterangan Pengangkutan Jenazah</h4>
        <p style="margin:0;">
            Nomor: {{ $data->id }}/SKJ/{{ $data->created_at->format('m') }}/{{ $data->created_at->format('Y') }}
        </p>
    </div>

    <p>Tanggal Terbit: {{ $data->created_at->format('d M Y') }}</p>

    <p>Yang bertanda tangan di bawah ini menerangkan bahwa jenazah berikut:</p>

    <!-- DATA JENAZAH -->
    <table>
        <tr>
            <td style="width:180px;">Nama Jenazah</td>
            <td style="width:10px;">:</td>
            <td>{{ $data->deceased_name }}</td>
        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>:</td>
            <td>{{ $data->birth_place }}</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>:</td>
            <td>{{ $data->birth_date ? \Carbon\Carbon::parse($data->birth_date)->format('d M Y') : '-' }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>:</td>
            <td>{{ $data->gender }}</td>
        </tr>
        <tr>
            <td>Kewarganegaraan</td>
            <td>:</td>
            <td>{{ $data->nationality }}</td>
        </tr>
        <tr>
            <td>Nomor Identitas</td>
            <td>:</td>
            <td>{{ $data->identity_number }}</td>
        </tr>
        <tr>
            <td>Tanggal & Waktu Wafat</td>
            <td>:</td>
            <td>{{ $data->date_of_death ? \Carbon\Carbon::parse($data->date_of_death)->format('d M Y H:i') : '-' }}</td>
        </tr>
        <tr>
            <td>Tempat Wafat</td>
            <td>:</td>
            <td>{{ $data->place_of_death }}</td>
        </tr>
        <tr>
            <td>Penyebab Kematian</td>
            <td>:</td>
            <td>{{ $data->cause_of_death }}</td>
        </tr>
    </table>

    <hr>

    <!-- RINCIAN PENGIRIMAN -->
    <h4>Rincian Pengiriman Jenazah</h4>
    <table>
        <tr>
            <td style="width:180px;">Metode Transportasi</td>
            <td style="width:10px;">:</td>
            <td>{{ $data->transport_method }}</td>
        </tr>
        <tr>
            <td>Nama Maskapai / Pengangkut</td>
            <td>:</td>
            <td>{{ $data->carrier_name }}</td>
        </tr>
        <tr>
            <td>Nomor Penerbangan</td>
            <td>:</td>
            <td>{{ $data->flight_number }}</td>
        </tr>
        <tr>
            <td>Waktu Pengiriman</td>
            <td>:</td>
            <td>{{ $data->shipping_datetime ? \Carbon\Carbon::parse($data->shipping_datetime)->format('d M Y H:i') : '-' }}</td>
        </tr>
        <tr>
            <td>Kota Asal</td>
            <td>:</td>
            <td>{{ $data->origin_city }}</td>
        </tr>
        <tr>
            <td>Kota Tujuan</td>
            <td>:</td>
            <td>{{ $data->destination_city }}</td>
        </tr>
        <tr>
            <td>Alamat Tujuan</td>
            <td>:</td>
            <td>{{ $data->destination_address }}</td>
        </tr>
    </table>

    <hr>

    <!-- PENANGGUNG JAWAB -->
    <h4>Penanggung Jawab / Penerima Jenazah</h4>
    <table>
        <tr>
            <td style="width:180px;">Nama Penerima</td>
            <td style="width:10px;">:</td>
            <td>{{ $data->recipient_name }}</td>
        </tr>
        <tr>
            <td>No. HP Penerima</td>
            <td>:</td>
            <td>{{ $data->recipient_phone }}</td>
        </tr>
    </table>

    <hr>

    <!-- PENANGANAN JENAZAH -->
    <h4>Penanganan Jenazah</h4>
    <table>
        <tr>
            <td style="width:180px;">Telah Diawetkan (Embalming)</td>
            <td style="width:10px;">:</td>
            <td>{{ $data->embalmed ? 'Ya' : 'Tidak' }}</td>
        </tr>
        <tr>
            <td>Catatan Embalming</td>
            <td>:</td>
            <td>{{ $data->embalming_notes }}</td>
        </tr>
        <tr>
            <td>Peti Jenazah Tersegel</td>
            <td>:</td>
            <td>{{ $data->sealed_coffin ? 'Ya' : 'Tidak' }}</td>
        </tr>
        <tr>
            <td>Surat Keterangan Medis</td>
            <td>:</td>
            <td>{{ $data->medical_certificate ? 'Ada' : 'Tidak Ada' }}</td>
        </tr>
    </table>

    <br>

    <p>
        Berdasarkan data, dokumen, dan pemeriksaan yang dilakukan, 
        <strong>jenazah dinyatakan layak untuk dikirim atau diangkut</strong> 
        sesuai ketentuan yang berlaku dalam penanganan dan transportasi jenazah.
    </p>

    <p>
        Surat ini berlaku hingga jenazah tiba di tempat tujuan, 
        sebagaimana tercantum dalam jadwal pengiriman.
    </p>

    <br><br>

    {{-- <p>Palembang, {{ now()->format('d M Y') }}</p> --}}

</body>
</html>
