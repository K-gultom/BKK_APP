<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Surat Keterangan Sehat</title>

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

            footer {
                margin-top: 45px;
                text-align: center;
                font-size: 11px;
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
            <h4 style="margin-bottom:3px;">Surat Keterangan Sehat</h4>
            <p style="margin:0;">
                Nomor:
                {{ $surat->id }}/SKS/{{ $surat->created_at->format('m') }}/{{ $surat->created_at->format('Y') }}
            </p>
        </div>

        <p>Tanggal Terbit:
            {{ $surat->created_at->format('d M Y') }}</p>

        <!-- Identitas Pasien -->
        <p>Yang bertanda tangan di bawah ini menerangkan bahwa:</p>

        <table>
            <tr>
                <td style="width:180px;">Nama Pasien</td>
                <td style="width:10px;">:</td>
                <td>{{ $surat->nama_pasien }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td>{{ \Carbon\Carbon::parse($surat->tgl_lahir)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td>Usia</td>
                <td>:</td>
                <td>{{ $surat->usia }}
                    Tahun</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $surat->jenis_kelamin }}</td>
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
                <td>No. Telepon</td>
                <td>:</td>
                <td>{{ $surat->user->phone }}</td>
            </tr>
        </table>

        <hr>

        <!-- Data Pemeriksaan -->
        <h4>Data Pemeriksaan Kesehatan</h4>
        <table>
            <tr>
                <td style="width:180px;">Tanggal Pemeriksaan</td>
                <td style="width:10px;">:</td>
                <td>{{ \Carbon\Carbon::parse($surat->tgl_pemeriksaan)->format('d M Y') }}</td>
            </tr>
            <tr>
                <td>Tekanan Darah</td>
                <td>:</td>
                <td>{{ $surat->tekanan_darah }}
                    mmHg</td>
            </tr>
            <tr>
                <td>Suhu Tubuh</td>
                <td>:</td>
                <td>{{ $surat->suhu_tubuh }}
                    °C</td>
            </tr>
            <tr>
                <td>Nadi</td>
                <td>:</td>
                <td>{{ $surat->nadi }}
                    bpm</td>
            </tr>
            <tr>
                <td>Pernapasan</td>
                <td>:</td>
                <td>{{ $surat->pernapasan }}
                    kali/menit</td>
            </tr>
            <tr>
                <td>Tinggi Badan</td>
                <td>:</td>
                <td>{{ $surat->tinggi_badan }}
                    cm</td>
            </tr>
            <tr>
                <td>Berat Badan</td>
                <td>:</td>
                <td>{{ $surat->berat_badan }}
                    kg</td>
            </tr>
            <tr>
                <td>Hasil Pemeriksaan</td>
                <td>:</td>
                <td>{{ $surat->hasil_pemeriksaan }}</td>
            </tr>
        </table>

        <br>

        <!-- Pernyataan -->
        <p>
            Berdasarkan pemeriksaan tersebut,
            <strong>pemohon dinyatakan dalam kondisi sehat</strong>, tidak ditemukan
            tanda-tanda gangguan kesehatan, dan layak untuk melakukan aktivitas ataupun
            memenuhi kebutuhan administrasi sesuai peruntukan.
        </p>

        <hr>

        <!-- Data Dokter -->
        <h4>Data Petugas Pemeriksa</h4>
        <table>
            <tr>
                <td style="width:180px;">Nama Dokter</td>
                <td style="width:10px;">:</td>
                <td>{{ $surat->nama_dokter }}</td>
            </tr>
            <tr>
                <td>Nomor SIP</td>
                <td>:</td>
                <td>{{ $surat->nomor_sip }}</td>
            </tr>
            <tr>
                <td>Instansi</td>
                <td>:</td>
                <td>{{ $surat->instansi }}</td>
            </tr>
        </table>

        <p>Demikian surat ini dibuat dengan sebenarnya untuk dapat dipergunakan
            sebagaimana mestinya sesuai dengan ketentuan yang berlaku.</p>

        <center>
            <p>    
                Surat ini berlaku sampai dengan 15 Hari setelah surat dibuat.
            </p>
        </center>
        {{-- <footer>
            <p>Surat ini diterbitkan oleh Balai Karantina Kesehatan Kelas 1 Palembang.</p>
        </footer> --}}

    </body>
</html>