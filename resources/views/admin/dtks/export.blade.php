<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-center mb-4 mt-4">Cek DTKS</h1>
    <table class="table align-middle text-center" id="table1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nik</th>
                <th>No KK</th>
                <th>No Telepon</th>
                <th>Keperluan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dtks as $data)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->kk }}</td>
                    <td>{{ $data->nomor_kontak }}</td>
                    <td>{{ $data->keperluan }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
