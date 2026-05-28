@extends('layouts.app')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>DTKS</h3>
                    <p class="text-subtitle text-muted">Untuk Menambah Data</p>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section max-w-full">

            <div class="card" style="width: 100%">

                <div class="card-body">
                    <form action="/dtks/saveadmin" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label text-right">Nama Lengkap</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label text-right">Alamat Lengkap</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="alamat" name="alamat" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nik" class="col-sm-4 col-form-label text-right">NIK</label>
                            <div class="col-sm-6">
                                <input type="number" inputmode="numeric" class="form-control" id="nik" maxlength="16"
                                    oninput="validateNumberInput(this)" required onkeypress="return isNumberKey(event)"
                                    name="nik" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kk" class="col-sm-4 col-form-label text-right">No KK</label>
                            <div class="col-sm-6">
                                <input type="number" inputmode="numeric" class="form-control" id="kk" maxlength="16"
                                    oninput="validateNumberInput(this)" required onkeypress="return isNumberKey(event)"
                                    name="kk" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_kontak" class="col-sm-4 col-form-label text-right">No Telepon</label>
                            <div class="col-sm-6">
                                <input type="text" inputmode="numeric" class="form-control" id="nomor_kontak"
                                    maxlength="17" oninput="validateNumberInput(this)" required
                                    onkeypress="return isNumber(event)" name="nomor_kontak" value="{{ $kode }}"
                                    placeholder="harus diawwali dengan +62" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keperluan" class="col-sm-4 col-form-label text-right">Keperluan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="keperluan" name="keperluan" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left: 295px">Save</button>
                        <a href="/dtks" class="btn btn-danger">Back</a>
                    </form>
                </div>
            </div>

        </section>
        <script>
            function validateNumberInput(input) {
                input.value = input.value.replace(/\D/g, '');

                if (input.value.length > 16) {
                    input.value = input.value.slice(0, 16);
                }
            }
            // frame 16 digit real time
            function isNumberKey(evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode;

                if (charCode < 48 || charCode > 57) {
                    return false;
                }

                var input = evt.target;

                if (input.value.length >= 16) {
                    return false;
                }

                return true;
            }


            function validateNumberInput(input) {
                input.value = input.value.replace(/\D/g, '');

                if (input.value.length > 17) {
                    input.value = input.value.slice(0, 17);
                }
            }
            // frame 17 digit real time
            function isNumber(evt) {
                var charCode = (evt.which) ? evt.which : evt.keyCode;

                if (charCode < 48 || charCode > 57) {
                    return false;
                }

                var input = evt.target;

                if (input.value.length >= 17) {
                    return false;
                }

                return true;
            }
        

    // Override validasi angka agar NIK/KK tetap 16 digit dan nomor kontak mengikuti maxlength field.
    function validateNumberInput(input) {
        input.value = input.value.replace(/\D/g, '');

        const limitAttr = input.getAttribute('maxlength') || input.getAttribute('data-maxlength') || '16';
        const limit = parseInt(limitAttr, 10);

        if (Number.isInteger(limit) && limit > 0 && input.value.length > limit) {
            input.value = input.value.slice(0, limit);
        }
    }
</script>
    </div>
@endsection
