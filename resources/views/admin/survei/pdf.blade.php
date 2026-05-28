<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Usulan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body onload="window.print()">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last text-center">
                    <h3>Data Usulan</h3>
                    <p class="text-subtitle text-muted">Dungus Cariang</p>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section max-w-full">

            <div class="card" style="width: 100%">

                <div class="card-body">
                    <div class="form-group row">
                        <label for="nik" class="col-sm-4 col-form-label mb-2 text-right">NIK</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="nik" name="nik"
                                value="{{ $data->nik }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kk" class="col-sm-4 col-form-label mb-2 text-right">No KK</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="kk" name="kk"
                                value="{{ $data->kk }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label mb-2 text-right">Nama Lengkap</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $data->nama }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-sm-4 col-form-label mb-2 text-right">Tempat Lahir</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="{{ $data->tempat_lahir }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-4 col-form-label mb-2 text-right">Tanggal Lahir</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"
                                value="{{ $data->tgl_lahir }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="ibu" class="col-sm-4 col-form-label mb-2 text-right">Nama Ibu</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="ibu" name="ibu"
                                value="{{ $data->ibu }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-4 col-form-label mb-2 text-right">Jenis Kelamin</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin"
                                value="{{ $data->jenis_kelamin }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan" class="col-sm-4 col-form-label mb-2 text-right">Pekerjaan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                                value="{{ $data->pekerjaan }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status_nikah" class="col-sm-4 col-form-label mb-2 text-right">Status Nikah</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="status_nikah" name="status_nikah"
                                value="{{ $data->status_nikah }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label mb-2 text-right">Alamat Lengkap</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $data->alamat }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status_disabilitas" class="col-sm-4 col-form-label mb-2 text-right">Status
                            Disablilitas</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="status_disabilitas"
                                name="status_disabilitas" value="{{ $data->status_disabilitas }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis_disabilitas" class="col-sm-4 col-form-label mb-2 text-right">Jenis
                            Disabilitas</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="jenis_disabilitas"
                                name="jenis_disabilitas" value="{{ $data->jenis_disabilitas }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status_kehamilan" class="col-sm-4 col-form-label mb-2 text-right">Status
                            Kehammilan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="status_kehamilan" name="status_kehamilan"
                                value="{{ $data->status_kehamilan }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_kehamilan" class="col-sm-4 col-form-label mb-2 text-right">Tanggal
                            Kehamilan</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tanggal_kehamilan"
                                name="tanggal_kehamilan" value="{{ $data->tanggal_kehamilan }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quest1" class="col-sm-4 col-form-label text-right">Apakah anda memiliki
                            tempat
                            berteduh tetap sehari-hari?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control mt-3" id="quest1" name="quest1"
                                value="{{ $data->quest1 }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quest2" class="col-sm-4 col-form-label text-right">Apakah anda tinggal
                            bersama
                            anggota keluarga yang lain (yang berbeda
                            kartu keluarga)?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control mt-3" id="quest2" name="quest2"
                                value="{{ $data->quest2 }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quest3" class="col-sm-4 col-form-label text-right">Apakah kepala keluarga
                            atau
                            pengurus keluarga masih bekerja?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control mt-4" id="quest3" name="quest3"
                                value="{{ $data->quest3 }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quest4" class="col-sm-4 col-form-label mt-4 text-right">Apakah anda pernah
                            khawatir
                            atau pernah tidak makan dalam setahun
                            terakhir?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control mt-5" id="quest4" name="quest4"
                                value="{{ $data->quest4 }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quest5" class="col-sm-4 col-form-label text-right">Apakah pengeluaran pangan
                            lebih besar (>70%) dari total
                            pengeluaran?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control mt-3" id="quest5" name="quest5"
                                value="{{ $data->quest5 }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quest6" class="col-sm-4 col-form-label text-right">Apakah ada pengeluaran
                            untuk
                            pakaian selama 1 (satu) tahun
                            terakhir?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control mt-3" id="quest6" name="quest6"
                                value="{{ $data->quest6 }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quest7" class="col-sm-4 col-form-label text-right">Apakah tempat tinggal
                            sebagian besar berlantai tanah dan/atau
                            plesteran?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control mt-3" id="quest7" name="quest7"
                                value="{{ $data->quest7 }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quest8" class="col-sm-4 col-form-label text-right">Apakah tempat tinggal
                            sebagian besar berdinding bambu / kawat /
                            kayu?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control mt-3" id="quest8" name="quest8"
                                value="{{ $data->quest8 }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quest9" class="col-sm-4 col-form-label text-right">Apakah tempat tinggal
                            memiliki fasilitas buang air kecil / besar
                            sendiri?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control mt-3" id="quest9" name="quest9"
                                value="{{ $data->quest9 }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="quest10" class="col-sm-4 col-form-label text-right">Apakah sumber penerangan
                            berasal dari listrik PLN 450 watt atau bukan
                            listrik?</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control mt-2" id="quest10" name="quest10"
                                value="{{ $data->quest10 }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto_ktp" class="col-sm-4 col-form-label mb-2 text-right">Foto Ktp</label>
                        <div class="col-sm-6">
                            <img src="{{ route('kk', ['foto_ktp' => $data->foto_ktp]) }}" alt="syada"
                                class="form-control mb-2 w-25">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto_rumah" class="col-sm-4 col-form-label mb-2 text-right">Foto Rumah</label>
                        <div class="col-sm-6">
                            <img src="{{ route('rumah', ['foto_rumah' => $data->foto_rumah]) }}" alt="syada"
                                class="form-control mb-2 w-25">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomor_kontak" class="col-sm-4 col-form-label mb-2 text-right">Nomor Kontak</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="nomor_kontak" name="nomor_kontak"
                                value="{{ $data->nomor_kontak }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="latitude" class="col-sm-4 col-form-label mb-2 text-right">Latitude</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="latitude" name="latitude"
                                value="{{ $data->latitude }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="longitude" class="col-sm-4 col-form-label mb-2 text-right">Longitude</label>
                        <div class="col-sm-6">
                            <input type="number" class="form-control" id="longitude" name="longitude"
                                value="{{ $data->longitude }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto_rumah_dalam" class="col-sm-4 col-form-label mb-2 text-right">Foto Rumah
                            Bagian
                            Dalam</label>
                        <div class="col-sm-6">
                            <img src="{{ route('dalam', ['foto_rumah_dalam' => $data->foto_rumah_dalam]) }}" alt="syada"
                                class="form-control mb-2 w-25">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keterangan" class="col-sm-4 col-form-label mb-2 text-right">Keterangan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="keterangan" name="keterangan"
                                value="{{ $data->keterangan }}" readonly>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
