<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dtks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body onload="window.print()">
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last text-center">
                    <h3>Data DTKS</h3>
                    <p class="text-subtitle text-muted">Dungus Cariang</p>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section max-w-full">

            <div class="card" style="width: 100%">

                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label mb-2 text-right">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $dtks->nama }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label mb-2 text-right">Alamat</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ $dtks->alamat }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nik" class="col-sm-4 col-form-label mb-2 text-right">NIK</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ $dtks->nik }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="kk" class="col-sm-4 col-form-label mb-2 text-right">No KK</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="kk" name="kk"
                                value="{{ $dtks->kk }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomor_kontak" class="col-sm-4 col-form-label mb-2 text-right">No Telepon</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="nomor_kontak" name="nomor_kontak"
                                value="{{ $dtks->nomor_kontak }}" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="keperluan" class="col-sm-4 col-form-label mb-2 text-right">Keperluan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="keperluan" name="keperluan"
                                value="{{ $dtks->keperluan }}" readonly>
                        </div>
                    </div>

        </section>
        <!-- Basic Tables end -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
