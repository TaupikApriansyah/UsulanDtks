<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dungus Cariang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: #28a745;">
    <div class="container" style="margin-top: 5rem;">
        <div class="mx-auto col-md-6 p-4"
            style="background: linear-gradient(135deg, #f6f8fc, #ffffff); border-radius: 0.5rem; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);">
            <img src="img/dtks1.png" alt="Logo"
                style="display: block; margin: 0 auto; max-width: 180px; height: auto;">
            <h2 class="mb-4 text-center" style="color: #28a745; font-weight: bold; font-size:50px;">DTKS</h2>
            <form action="dtks/save" method="post">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label" style="color: #495057;">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required
                        style="box-shadow: none; border-color: #007bff;">
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label" style="color: #495057;">Alamat</label>
                    <textarea class="form-control" id="alamat" rows="3" name="alamat" required
                        style="box-shadow: none; border-color: #007bff;"></textarea>
                </div>
                <div class="mb-3">
                    <label for="nik" class="form-label" style="color: #495057;">NIK</label>
                    <input type="text" inputmode="numeric" class="form-control" inputmode="numeric" id="nik"
                        name="nik" maxlength="16" oninput="validateNumberInput(this)" required
                        onkeypress="return isNumberKey(event)" required
                        style="box-shadow: none; border-color: #007bff;">
                </div>
                <div class="mb-3">
                    <label for="noKK" class="form-label" style="color: #495057;">No KK</label>
                    <input type="number" inputmode="numeric" class="form-control" id="noKK" name="kk"
                        inputmode="numeric" maxlength="16" oninput="validateNumberInput(this)" required
                        onkeypress="return isNumberKey(event)" required
                        style="box-shadow: none; border-color: #007bff;">
                </div>
                <div class="mb-3">
                    <label for="noTlpn" class="form-label" style="color: #495057;">No Tlpn</label>
                    <input type="text" inputmode="numeric" class="form-control" inputmode="numeric" maxlength="17"
                        oninput="validateNumberInput(this)" required onkeypress="return isNumber(event)"
                        value="{{ $kode }}" id="noTlpn" name="nomor_kontak" placeholder="awali dengan +62"
                        required style="box-shadow: none; border-color: #007bff;">
                </div>
                <div class="mb-3">
                    <label for="keperluan" class="form-label" style="color: #495057;">Keperluan</label>
                    <textarea class="form-control" id="keperluan" rows="3" name="keperluan" required
                        style="box-shadow: none; border-color: #007bff;"></textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-secondary" onclick="history.back()"
                        style="background-color: #6c757d; border-color: #6c757d;">Back</button>
                    <button type="submit" class="btn btn-primary"
                        style="background-color: #007bff; border-color: #007bff;">Kirim</button>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

            if (input.value.length > 15) {
                input.value = input.value.slice(0, 15);
            }
        }
        // frame 15 digit real time
        function isNumber(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;

            if (charCode < 48 || charCode > 57) {
                return false;
            }

            var input = evt.target;

            if (input.value.length >= 15) {
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
</body>

</html>
