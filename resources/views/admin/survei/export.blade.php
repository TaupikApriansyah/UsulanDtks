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
    <div>
        <a href="/export-survei" class="btn btn-primary">Download Excel</a>
    </div>
    <table class="table d-flex flex-wrap">
        <thead>
            <tr>
                <th>No</th>
                <th>NIK</th>
                <th>KK</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Nama Ibu</th>
                <th>Jenis Kelamin</th>
                <th>Pekerjaan</th>
                <th>Status Nikah</th>
                <th>Alamat</th>
                <th>Provinsi</th>
                <th>Kab/Kota</th>
                <th>Kecamatan</th>
                <th>Kelurahan</th>
                <th>Status Disabilitas</th>
                <th>Jenis Disabilitas</th>
                <th>Status Kehamilan</th>
                <th>Tanggal Kehamilan</th>
                <th>Apakah anda memiliki tempat berteduh tetap sehari-hari?</th>
                <th>Apakah anda tinggal bersama anggota keluarga yang lain (yang berbeda kartu keluarga)?</th>
                <th>Apakah kepala keluarga atau pengurus keluarga masih bekerja?</th>
                <th>Apakah anda pernah khawatir atau pernah tidak makan dalam setahun terakhir?</th>
                <th>Apakah pengeluaran pangan lebih besar (>70%) dari total pengeluaran?</th>
                <th>Apakah ada pengeluaran untuk pakaian selama 1 (satu) tahun terakhir?</th>
                <th>Apakah tempat tinggal sebagian besar berlantai tanah dan/atau plesteran?</th>
                <th>Apakah tempat tinggal sebagian besar berdinding bambu / kawat / kayu?</th>
                <th>Apakah tempat tinggal memiliki fasilitas buang air kecil / besar sendiri?</th>
                <th>Apakah sumber penerangan berasal dari listrik PLN 450 watt atau bukan listrik?</th>
                <th>Foto Kartu Keluarga</th>
                <th>Foto Rumah (Tampak Depan)</th>
                <th>Nomor Kontak</th>
                <th>Titik Koordinat Rumah (Latitude)</th>
                <th>Titik Koordinat Rumah (Longtitude)</th>
                <th>Foto Rumah (Tampak Dalam)</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($area as $data)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $data->nik }}</td>
                    <td>{{ $data->kk }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->tempat_lahir }}</td>
                    <td>{{ $data->tgl_lahir }}</td>
                    <td>{{ $data->ibu }}</td>
                    <td>{{ $data->jenis_kelamin }}</td>
                    <td>{{ $data->pekerjaan }}</td>
                    <td>{{ $data->status_nikah }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->province->name }}</td>
                    <td>{{ $data->regencie->name }}</td>
                    <td>{{ $data->district->name }}</td>
                    <td>{{ $data->village->name }}</td>
                    <td>{{ $data->status_disabilitas }}</td>
                    <td>{{ $data->jenis_disabilitas }}</td>
                    <td>{{ $data->status_kehamilan }}</td>
                    <td>{{ $data->tanggal_kehamilan }}</td>
                    <td>{{ $data->quest1 }}</td>
                    <td>{{ $data->quest2 }}</td>
                    <td>{{ $data->quest3 }}</td>
                    <td>{{ $data->quest4 }}</td>
                    <td>{{ $data->quest5 }}</td>
                    <td>{{ $data->quest6 }}</td>
                    <td>{{ $data->quest7 }}</td>
                    <td>{{ $data->quest8 }}</td>
                    <td>{{ $data->quest9 }}</td>
                    <td>{{ $data->quest10 }}</td>
                    <td>{{ $data->foto_ktp }}</td>
                    <td>{{ $data->foto_rumah }}</td>
                    <td>{{ $data->nomor_kontak }}</td>
                    <td>{{ $data->latitude }}</td>
                    <td>{{ $data->longitude }}</td>
                    <td>{{ $data->foto_rumah_dalam }}</td>
                    <td>{{ $data->keterangan }}</td>
                    <td class="d-flex gap-2 mt-3">
                        <a href="show/{{ $data->id }}" class="btn btn-outline-secondary  rounded-circle">
                            <i data-feather="eye"></i>
                        </a>
                        <a href="survei/{{ $data->id }}/edit" class="btn btn-outline-warning rounded-circle">
                            <i data-feather="settings"></i>
                        </a>
                        {{-- Hapus dari halaman export menggunakan form DELETE --}}
                        <form action="/survei/{{ $data->id }}/destroy" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin mau hapus Data Usulan ini?')"
                            class="btn btn-outline-danger rounded-circle">
                            <i data-feather="trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
