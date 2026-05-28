<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $isUpdate = $this->isMethod('PUT') || $this->isMethod('PATCH')
                    || $this->route('id') !== null;   // POST update via route param

        return [
            'nik'                => 'required|digits:16',
            'kk'                 => 'required|digits:16',
            'nama'               => 'required|string|min:3|max:255',
            'ibu'                => 'required|string|max:255',
            'tempat_lahir'       => 'required|string',
            'tgl_lahir'          => 'required|date',

            // [FIX] Sesuaikan value dengan form: 'laki-laki'/'perempuan' (bukan 'L'/'P')
            'jenis_kelamin'      => 'required|in:laki-laki,perempuan',

            'pekerjaan'          => 'required|string',
            'status_nikah'       => 'required|string',
            'alamat'             => 'required|string',

            // [FIX] Sesuaikan nama field dengan form HTML: province/regencie/district/village
            //       (bukan province_id/regencie_id/district_id/village_id)
            'province'           => 'required|string|exists:provinces,id',
            'regencie'           => 'required|string|exists:regencies,id',
            'district'           => 'required|string|exists:districts,id',
            'village'            => 'required|string|exists:villages,id',

            'status_disabilitas' => 'required',
            'jenis_disabilitas'  => 'nullable|string',
            'status_kehamilan'   => 'required',
            'tanggal_kehamilan'  => 'nullable|date',
            'quest1'             => 'required',
            'quest2'             => 'required',
            'quest3'             => 'required',
            'quest4'             => 'required',
            'quest5'             => 'required',
            'quest6'             => 'required',
            'quest7'             => 'required',
            'quest8'             => 'required',
            'quest9'             => 'required',
            'quest10'            => 'required',
            // nomor_kontak string agar awalan 0 tidak hilang
            'nomor_kontak'       => 'required|string|min:10|max:15',
            'latitude'           => 'required|numeric|between:-90,90',
            'longitude'          => 'required|numeric|between:-180,180',
            'keterangan'         => 'required|string',
            // Foto wajib saat create, opsional saat update
            'foto_ktp'           => ($isUpdate ? 'nullable' : 'required') . '|image|mimes:png,jpg,jpeg,gif|max:5120',
            'foto_rumah'         => ($isUpdate ? 'nullable' : 'required') . '|image|mimes:png,jpg,jpeg,gif|max:5120',
            'foto_rumah_dalam'   => ($isUpdate ? 'nullable' : 'required') . '|image|mimes:png,jpg,jpeg,gif|max:5120',
        ];
    }

    public function messages(): array
    {
        return [
            'nik.digits'                  => 'NIK harus terdiri dari tepat 16 digit angka.',
            'kk.digits'                   => 'Nomor KK harus terdiri dari tepat 16 digit angka.',
            'nomor_kontak.min'            => 'Nomor kontak minimal 10 karakter.',
            'nomor_kontak.max'            => 'Nomor kontak maksimal 15 karakter.',
            'jenis_kelamin.in'            => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'foto_ktp.required'           => 'Foto KTP wajib diupload.',
            'foto_rumah.required'         => 'Foto rumah wajib diupload.',
            'foto_rumah_dalam.required'   => 'Foto rumah dalam wajib diupload.',
            'longitude.numeric'           => 'Koordinat longitude harus berupa angka.',
            'longitude.between'           => 'Koordinat longitude harus antara -180 dan 180.',
            'latitude.numeric'            => 'Koordinat latitude harus berupa angka.',
            'latitude.between'            => 'Koordinat latitude harus antara -90 dan 90.',
            'province.required'           => 'Provinsi wajib dipilih.',
            'province.exists'             => 'Provinsi yang dipilih tidak valid.',
            'regencie.required'           => 'Kabupaten/Kota wajib dipilih.',
            'regencie.exists'             => 'Kabupaten/Kota yang dipilih tidak valid.',
            'district.required'           => 'Kecamatan wajib dipilih.',
            'district.exists'             => 'Kecamatan yang dipilih tidak valid.',
            'village.required'            => 'Kelurahan/Desa wajib dipilih.',
            'village.exists'              => 'Kelurahan/Desa yang dipilih tidak valid.',
        ];
    }
}
