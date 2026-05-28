@extends('layouts.app')
@section('content')
    <style>
        #map {
            height: 300px;
            /* The height is 400 pixels */
        }
    </style>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Survei Data</h3>
                    <p class="text-subtitle text-muted">Untuk Mengubah Data</p>
                </div>
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section max-w-full">

            <div class="card" style="width: 100%">

                <div class="card-body">
                    <form action="/survei/{{ $area->id }}/update" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="nik" class="col-sm-4 col-form-label text-right">NIK</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="nik" name="nik" maxlength="16"
                                    oninput="validateNumberInput(this)" required onkeypress="return isNumberKey(event)"
                                    value="{{ $area->nik }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kk" class="col-sm-4 col-form-label text-right">No KK</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="kk" name="kk" maxlength="16"
                                    oninput="validateNumberInput(this)" required onkeypress="return isNumberKey(event)"
                                    value="{{ $area->kk }}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-4 col-form-label text-right">Nama Lengkap</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama" name="nama" required
                                    value="{{ $area->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat_lahir" class="col-sm-4 col-form-label text-right">Tempat Lahir</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required
                                    value="{{ $area->tempat_lahir }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tgl_lahir" class="col-sm-4 col-form-label text-right">Tanggal Lahir</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required
                                    value="{{ $area->tgl_lahir }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ibu" class="col-sm-4 col-form-label text-right">Nama Ibu</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="ibu" name="ibu" required
                                    value="{{ $area->ibu }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_kelamin" class="col-sm-4 col-form-label text-right">Jenis Kelamin</label>
                            <div class="col-sm-6">
                                <select name="jenis_kelamin" id="" class="form-control" required>
                                    <option disabled selected>~~Jenis Kelamin~~</option>
                                    <option value="laki-laki"{{ $area->jenis_kelamin == 'laki-laki' ? 'selected' : '' }}>
                                        Laki laki
                                    </option>
                                    <option value="perempuan" {{ $area->jenis_kelamin == 'perempuan' ? 'selected' : '' }}>
                                        Perempuan
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pekerjaan" class="col-sm-4 col-form-label text-right">Pekerjaan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required
                                    value="{{ $area->pekerjaan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_nikah" class="col-sm-4 col-form-label text-right">Status Nikah</label>
                            <div class="col-sm-6">
                                <select name="status_nikah" id="" class="form-control" required>
                                    <option disabled selected>~~Status Nikah~~</option>
                                    <option value="menikah" {{ $area->status_nikah == 'menikah' ? 'selected' : '' }}>
                                        Menikah</option>
                                    <option value="belum_menikah"
                                        {{ $area->status_nikah == 'belum_menikah' ? 'selected' : '' }}>Belum
                                        Menikah</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label text-right">Alamat Lengkap</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="alamat" name="alamat" required
                                    value="{{ $area->alamat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label text-right">Pilih Provinsi</label>
                            <div class="col-sm-6">
                                <select name="province" id="province" class="form-control" required>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}"
                                            {{ $province->id == $area->province_id ? 'selected' : '' }}>
                                            {{ $province->name }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label text-right">Pilih Kabupaten/Kota</label>
                            <div class="col-sm-6">
                                <select name="regencie" id="regencie" class="form-control" required>
                                    @foreach ($regencie as $regency)
                                        <option value="{{ $regency->id }}">{{ $area->regencie->name }}</option>
                                        {{ $regency->id == $area->regencie_id ? 'selected' : '' }}>
                                        {{ $regency->name }}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label text-right">Pilih Kecamatan</label>
                            <div class="col-sm-6">
                                <select name="district" id="district" class="form-control" required>
                                    @foreach ($district as $distrik)
                                        <option value="{{ $distrik->id }}">{{ $area->district->name }}</option>
                                        {{ $distrik->id == $area->district_id ? 'selected' : '' }}>
                                        {{ $distrik->name }}
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label text-right">Pilih Kelurahan/Desa</label>
                            <div class="col-sm-6">
                                <select name="village" id="village" class="form-control" required>
                                    @foreach ($village as $villages)
                                        <option value="{{ $villages->id }}">{{ $area->village->name }}</option>
                                        {{ $villages->id == $area->village_id ? 'selected' : '' }}>
                                        {{ $villages->name }}
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status_disabilitas" class="col-sm-4 col-form-label text-right">Status
                                Disablilitas</label>
                            <div class="col-sm-6">
                                <select name="status_disabilitas" id="status_disabilitas" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->status_disabilitas == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->status_disabilitas == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jenis_disabilitas" class="col-sm-4 col-form-label text-right">Jenis
                                Disabilitas</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="disabilitas" name="jenis_disabilitas"
                                    value="{{ $area->jenis_disabilitas }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="status_kehamilan" class="col-sm-4 col-form-label text-right">Status
                                Kehammilan</label>
                            <div class="col-sm-6">
                                <select name="status_kehamilan" id="status_kehamilan" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->status_kehamilan == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->status_kehamilan == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_kehamilan" class="col-sm-4 col-form-label text-right">Tanggal
                                Kehamilan</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="kehamilan" name="tanggal_kehamilan"
                                    value="{{ $area->tanggal_kehamilan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quest1" class="col-sm-4 col-form-label text-right">Pertanyaan 1</label>
                            <div class="col-sm-6">
                                <select name="quest1" id="" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->quest1 == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->quest1 == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quest2" class="col-sm-4 col-form-label text-right">Pertanyaan 2</label>
                            <div class="col-sm-6">
                                <select name="quest2" id="" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->quest2 == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->quest2 == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quest3" class="col-sm-4 col-form-label text-right">Pertanyaan 3</label>
                            <div class="col-sm-6">
                                <select name="quest3" id="" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->quest3 == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->quest3 == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quest4" class="col-sm-4 col-form-label text-right">Pertanyaan 4</label>
                            <div class="col-sm-6">
                                <select name="quest4" id="" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->quest4 == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->quest4 == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quest5" class="col-sm-4 col-form-label text-right">Pertanyaan 5</label>
                            <div class="col-sm-6">
                                <select name="quest5" id="" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->quest5 == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->quest5 == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quest6" class="col-sm-4 col-form-label text-right">Pertanyaan 6</label>
                            <div class="col-sm-6">
                                <select name="quest6" id="" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->quest6 == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->quest6 == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quest7" class="col-sm-4 col-form-label text-right">Pertanyaan 7</label>
                            <div class="col-sm-6">
                                <select name="quest7" id="" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->quest7 == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->quest7 == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quest8" class="col-sm-4 col-form-label text-right">Pertanyaan 8</label>
                            <div class="col-sm-6">
                                <select name="quest8" id="" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->quest8 == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->quest8 == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quest9" class="col-sm-4 col-form-label text-right">Pertanyaan 9</label>
                            <div class="col-sm-6">
                                <select name="quest9" id="" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->quest9 == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->quest9 == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quest10" class="col-sm-4 col-form-label text-right">Pertanyaan 10</label>
                            <div class="col-sm-6">
                                <select name="quest10" id="" class="form-control" required>
                                    <option disabled selected>Pilih</option>
                                    <option value="Tidak"{{ $area->quest10 == 'Tidak' ? 'selected' : '' }}>
                                        Tidak
                                    </option>
                                    <option value="Iya" {{ $area->quest10 == 'Iya' ? 'selected' : '' }}>
                                        Iya
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_ktp" class="col-sm-4 col-form-label text-right">Foto Ktp</label>
                            <div class="col-sm-6">
                                <input type="hidden" name="foto_ktp">
                                <img class="mb-2 preview" style="width: 100px;"
                                    src="{{ route('kk', ['foto_ktp' => $area->foto_ktp]) }}">
                                {{-- <input type="file" class="form-control" id="foto_ktp" name="foto_ktp"
                                    value="{{ $area->foto_ktp }}"> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_rumah" class="col-sm-4 col-form-label text-right">Foto Rumah</label>
                            <div class="col-sm-6">
                                <input type="hidden" name="foto_rumah">
                                <img class="mb-2 preview" style="width: 100px;"
                                    src="{{ route('rumah', ['foto_rumah' => $area->foto_rumah]) }}">
                                {{-- <input type="file" class="form-control" id="foto_rumah" name="foto_rumah"
                                    value="{{ $area->foto_rumah }}"> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_kontak" class="col-sm-4 col-form-label text-right">Nomor Kontak</label>
                            <div class="col-sm-6">
                                <input type="number" class="form-control" id="nomor_kontak" name="nomor_kontak"
                                    maxlength="13" oninput="validateNumberInput(this)" required
                                    onkeypress="return isNumber(event)" value="{{ $area->nomor_kontak }}" required>
                            </div>
                        </div>
                        <div id="map" class="mb-3"></div>
                        <div class="form-group row">
                            <label for="latitude" class="col-sm-4 col-form-label text-right">Latitude</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="latitude" name="latitude" required
                                    value="{{ $area->latitude }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="longitude" class="col-sm-4 col-form-label text-right">Longitude</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="longitude" name="longitude" required
                                    value="{{ $area->longitude }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_rumah_dalam" class="col-sm-4 col-form-label text-right">Foto Rumah Bagian
                                Dalam</label>
                            <div class="col-sm-6">
                                <input type="hidden" name="foto_rumah_dalam" id="">
                                <img class="mb-2 preview" style="width: 100px;"
                                    src="{{ route('dalam', ['foto_rumah_dalam' => $area->foto_rumah_dalam]) }}">
                                {{-- <input type="file" class="form-control" id="foto_rumah_dalam"
                                    placeholder="chosee File" name="foto_rumah_dalam"
                                    value="{{ $area->foto_rumah_dalam }}"> --}}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-4 col-form-label text-right">Keterangan</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" required
                                    value="{{ $area->keterangan }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="margin-left: 295px">Save</button>
                        <a href="/survei" class="btn btn-danger">Back</a>
                    </form>
                </div>
            </div>

        </section>
        <!-- Basic Tables end -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#province').on('change', function() {
                let id_province = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('get.regencie') }}",
                    data: {
                        id_province: id_province
                    },
                    cahce: 'false',

                    success: function(response) {
                        $('#regencie').html(response);
                        $('#district').html('');
                        $('#village').html('');

                    }
                })
            })

            $('#regencie').on('change', function() {
                let id_regencie = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('get.district') }}",
                    data: {
                        id_regencie: id_regencie
                    },
                    cahce: 'false',

                    success: function(response) {
                        $('#district').html(response);
                        $('#village').html('');
                    }
                })
            })

            $('#district').on('change', function() {
                let id_district = $(this).val();

                $.ajax({
                    type: 'POST',
                    url: "{{ route('get.village') }}",
                    data: {
                        id_district: id_district
                    },
                    cahce: 'false',

                    success: function(response) {
                        $('#village').html(response);
                    }
                })
            })
        });

        // maps
        const providerOSM = new GeoSearch.OpenStreetMapProvider();

        //leaflet map
        var leafletMap = L.map('map', {
            fullscreenControl: true,
            // OR
            fullscreenControl: {
                pseudoFullscreen: false // if true, fullscreen to page width and height
            },
            minZoom: 2
        }).setView([0, 0], 2);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {

        }).addTo(leafletMap);

        let theMarker = {};

        leafletMap.on('click', function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            // document.getElementById("latitude").value = latitude;
            // document.getElementById("longitude").value = longitude;
            let popup = L.popup()
                .setLatLng([latitude, longitude])
                .setContent("Kordinat : " + latitude + " - " + longitude)
                .openOn(leafletMap);

            if (theMarker != undefined) {
                leafletMap.removeLayer(theMarker);
            };

            document.querySelector('#longitude').value = longitude;
            document.querySelector('#latitude').value = latitude;

            theMarker = L.marker([latitude, longitude]).addTo(leafletMap);
        });

        const search = new GeoSearch.GeoSearchControl({
            provider: providerOSM,
            style: 'bar',
            searchLabel: 'Bandung',
        });

        leafletMap.addControl(search);

        $(document).ready(function() {
            $('#status_kehamilan').change(function() {
                if ($(this).val() == 'Tidak') {
                    $('#kehamilan').val('').prop('disabled', true);
                } else {
                    $('#kehamilan').prop('disabled', false);
                }
            });
        });

        // status disabilitas
        $(document).ready(function() {
            $('#status_disabilitas').change(function() {
                if ($(this).val() == 'Tidak') {
                    $('#disabilitas').val('').prop('disabled', true);
                } else {
                    $('#disabilitas').prop('disabled', false);
                }
            });
        });

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

            if (input.value.length > 13) {
                input.value = input.value.slice(0, 13);
            }
        }
        // frame 13 digit real time
        function isNumber(evt) {
            var charCode = (evt.which) ? evt.which : evt.keyCode;

            if (charCode < 48 || charCode > 57) {
                return false;
            }

            var input = evt.target;

            if (input.value.length >= 13) {
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
@endsection
