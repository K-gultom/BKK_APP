<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Izin Beroperasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            text-align: center;
            font-size: 12px;
        }
        .content {
            margin-top: 40px;
        }
        .content p {
            margin: 10px 0;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Surat Izin Beroperasi</h2>
        <p>Nomor: {{ $nomor_surat }}</p>
        <p>Tanggal Terbit: {{ $tanggal_terbit }}</p>
    </div>

    <div class="content">
        <p><strong>Nama: </strong>{{ $user->first_name }} {{ $user->last_name }}</p>
        <p><strong>Alamat: </strong>{{ $user->address }}</p>
        <p><strong>Email: </strong>{{ $user->email }}</p>
        <p><strong>Nomor KTP: </strong>{{ $user->ktp }}</p>
        <p><strong>Nomor Telepon: </strong>{{ $user->phone }}</p>
        <p><strong>Tempat Praktik: </strong>{{ $user->practice_place }}</p>
        <p><strong>Alamat Praktik: </strong>{{ $user->practice_address }}</p>
    </div>

    <div class="footer">
        <p>Surat ini berlaku sampai dengan {{ $tanggal_berlaku }}</p>
    </div>

</body>
</html>
