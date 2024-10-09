<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Kartu Pendaftaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 100%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #000;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header img {
            width: 100px;
        }
        .header h2 {
            margin: 10px 0;
        }
        .info {
            margin-bottom: 20px;
        }
        .info h4 {
            margin: 5px 0;
        }
        .details {
            border-collapse: collapse;
            width: 100%;
        }
        .details td, .details th {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .details th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ public_path('storage/'.$siswa->foto) }}" alt="Foto" width="100">
            <h2>Kartu Pendaftaran</h2>
            <p>Jalur: {{ $siswa->jalur->nama_jalur }} - {{ $siswa->jalur->deskripsi }}</p>
        </div>

        <div class="info">
            <h4>Nama: {{ $siswa->name }}</h4>
            <h4>NISN: {{ $siswa->nisn }}</h4>
            <h4>Email: {{ $siswa->email }}</h4>
            <h4>Alamat: {{ $siswa->alamat }}</h4>
            <h4>Agama: {{ ucfirst($siswa->agama) }}</h4>
        </div>

        <table class="details">
            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $siswa->tempat_lahir }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $siswa->tgl_lahir }}</td>
            </tr>
            <tr>
                <th>Nama Ayah</th>
                <td>{{ $siswa->nama_ayah }}</td>
            </tr>
            <tr>
                <th>Nama Ibu</th>
                <td>{{ $siswa->nama_ibu }}</td>
            </tr>
            <tr>
                <th>Pekerjaan Ayah</th>
                <td>{{ $siswa->pendidikan_ayah }}</td>
            </tr>
            <tr>
                <th>Pekerjaan Ibu</th>
                <td>{{ $siswa->pendidikan_ibu }}</td>
            </tr>
            <tr>
                <th>Pendapatan Ayah</th>
                <td>{{ $siswa->pendapatan_ayah }}</td>
            </tr>
            <tr>
                <th>Pendapatan Ibu</th>
                <td>{{ $siswa->pendapatan_ibu }}</td>
            </tr>
            <tr>
                <th>Jalur Pendaftaran</th>
                <td>{{ $siswa->jalur->nama_jalur }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ ucfirst($siswa->status) }}</td>
            </tr>
        </table>
    </div>
</body>
</html>
