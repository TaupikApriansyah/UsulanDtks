<?php

namespace App\Http\Controllers;

use App\Exports\ExportPeople;
use App\Http\Requests\SurveiRequest;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Survei;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class SurveiController extends Controller
{
    /**
     * Daftar data usulan.
     * RT hanya melihat data miliknya.
     * RW hanya melihat data dari RT pada RW dan desa yang sama.
     * Kelurahan hanya dibatasi desa jika akun punya village_id.
     */
    public function index()
    {
        $user = Auth::user();
        $query = Survei::with('province', 'regencie', 'district', 'village', 'creator')->latest();

        if ($user->isRt()) {
            $query->where('created_by', $user->id);
        } elseif ($user->isRw()) {
            $query->whereHas('creator', function ($q) use ($user) {
                $q->where('rw_number', $user->rw_number)
                  ->where('village_id', $user->village_id);
            });
        } elseif ($user->isKelurahan() && $user->village_id) {
            $query->where('village_id', $user->village_id);
        }

        $area = $query->paginate(20);
        return view('admin.survei.survei_data', compact('area'));
    }

    public function create()
    {
        $provinces = Province::orderBy('name')->get();
        return view('admin.survei.tambah', compact('provinces'));
    }


    public function getRegencie(Request $request)
    {
        $regencies = Regency::where('province_id', $request->id_province)
            ->orderBy('name')
            ->get();

        $option = '<option value="">Pilih Kab/Kota</option>';
        foreach ($regencies as $r) {
            $option .= "<option value=\"{$r->id}\">{$r->name}</option>";
        }

        return response($option);
    }

    public function getDistrict(Request $request)
    {
        $districts = District::where('regency_id', $request->id_regencie)
            ->orderBy('name')
            ->get();

        $option = '<option value="">Pilih Kecamatan</option>';
        foreach ($districts as $d) {
            $option .= "<option value=\"{$d->id}\">{$d->name}</option>";
        }

        return response($option);
    }

    public function getVillage(Request $request)
    {
        $villages = Village::where('district_id', $request->id_district)
            ->orderBy('name')
            ->get();

        $option = '<option value="">Pilih Kelurahan/Desa</option>';
        foreach ($villages as $v) {
            $option .= "<option value=\"{$v->id}\">{$v->name}</option>";
        }

        return response($option);
    }

    public function show(string $id)
    {
        $data = Survei::with('creator')->findOrFail($id);
        $this->authorizeView($data);

        return view('admin.survei.show', compact('data'));
    }

    /** Simpan usulan dari admin/RT. Status awal draft agar bisa diperiksa sebelum dikirim ke RW. */
    public function store(SurveiRequest $request)
    {
        $this->createSurveiFromRequest($request, Auth::id(), 'draft');

        Alert::toast('Berhasil Menambah Data Usulan', 'success');
        return redirect('/survei');
    }

    public function edit($id)
    {
        $area = Survei::findOrFail($id);
        $this->authorizeEdit($area);

        $provinces = Province::select('id', 'name')->orderBy('name')->get();
        $regencie = Regency::where('province_id', $area->province_id)->select('id', 'name')->orderBy('name')->get();
        $district = District::where('regency_id', $area->regencie_id)->select('id', 'name')->orderBy('name')->get();
        $village = Village::where('district_id', $area->district_id)->select('id', 'name')->orderBy('name')->get();

        return view('admin.survei.edit', compact('area', 'provinces', 'district', 'regencie', 'village'));
    }

    public function update(SurveiRequest $request, $id)
    {
        $survei = Survei::findOrFail($id);
        $this->authorizeEdit($survei);

        $data = $this->validatedSurveiData($request);

        if ($request->hasFile('foto_ktp')) {
            Storage::disk('private')->delete('foto/ktp/' . $survei->foto_ktp);
            $data['foto_ktp'] = $this->storeUploadedFile($request, 'foto_ktp', 'foto/ktp');
        }

        if ($request->hasFile('foto_rumah')) {
            Storage::disk('private')->delete('foto/rumah/' . $survei->foto_rumah);
            $data['foto_rumah'] = $this->storeUploadedFile($request, 'foto_rumah', 'foto/rumah');
        }

        if ($request->hasFile('foto_rumah_dalam')) {
            Storage::disk('private')->delete('foto/rumah_dalam/' . $survei->foto_rumah_dalam);
            $data['foto_rumah_dalam'] = $this->storeUploadedFile($request, 'foto_rumah_dalam', 'foto/rumah_dalam');
        }

        $survei->update($data);

        Alert::toast('Berhasil Mengubah Data Usulan', 'success');
        return redirect('/survei');
    }

    /** RT kirim ke RW untuk divalidasi. */
    public function kirimRw($id)
    {
        $survei = Survei::findOrFail($id);
        $user = Auth::user();

        abort_unless($user->isRt() && $survei->created_by === $user->id, 403);

        abort_unless($survei->isDraft(), 403, 'Hanya data draft yang bisa dikirim.');

        $survei->update([
            'status' => 'menunggu_rw',
            'catatan_rw' => null,
            'catatan_kelurahan' => null,
            'hasil_kelurahan' => null,
            'informasi_dikirim_at' => null,
        ]);

        Alert::toast('Data berhasil dikirim ke RW', 'success');
        return redirect('/survei');
    }

    public function destroy($id)
    {
        $survei = Survei::findOrFail($id);
        $this->authorizeEdit($survei);
        $survei->delete();

        Alert::toast('Berhasil Menghapus Data Usulan', 'success');
        return redirect('/survei');
    }

    public function export()
    {
        $area = $this->scopedSurveiQuery()->get();
        return view('admin.survei.export', compact('area'));
    }

    public function export_excel()
    {
        return Excel::download(new ExportPeople, 'survei.xlsx');
    }

    public function print($id)
    {
        $data = Survei::findOrFail($id);
        $this->authorizeView($data);

        return view('admin.survei.pdf', compact('data'));
    }

    public function kk($foto_ktp)
    {
        return $this->privateImageResponse('foto/ktp/' . $foto_ktp);
    }

    public function rumah($foto_rumah)
    {
        return $this->privateImageResponse('foto/rumah/' . $foto_rumah);
    }

    public function rumah_dalam($foto_rumah_dalam)
    {
        return $this->privateImageResponse('foto/rumah_dalam/' . $foto_rumah_dalam);
    }

    private function createSurveiFromRequest(SurveiRequest $request, ?int $createdBy, string $status): Survei
    {
        $data = $this->validatedSurveiData($request);
        $data['created_by'] = $createdBy;
        $data['status'] = $status;
        $data['catatan_rw'] = null;
        $data['catatan_kelurahan'] = null;
        $data['hasil_kelurahan'] = null;
        $data['informasi_dikirim_at'] = null;
        $data['foto_ktp'] = $this->storeUploadedFile($request, 'foto_ktp', 'foto/ktp');
        $data['foto_rumah'] = $this->storeUploadedFile($request, 'foto_rumah', 'foto/rumah');
        $data['foto_rumah_dalam'] = $this->storeUploadedFile($request, 'foto_rumah_dalam', 'foto/rumah_dalam');

        return Survei::create($data);
    }

    private function validatedSurveiData(SurveiRequest $request): array
    {
        return [
            'nik' => $request->nik,
            'kk' => $request->kk,
            'nama' => $request->nama,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'ibu' => $request->ibu,
            'jenis_kelamin' => $request->jenis_kelamin,
            'pekerjaan' => $request->pekerjaan,
            'status_nikah' => $request->status_nikah,
            'alamat' => $request->alamat,
            'province_id' => $request->province,
            'regencie_id' => $request->regencie,
            'district_id' => $request->district,
            'village_id' => $request->village,
            'status_disabilitas' => $request->status_disabilitas,
            'jenis_disabilitas' => $request->jenis_disabilitas,
            'status_kehamilan' => $request->status_kehamilan,
            'tanggal_kehamilan' => $request->tanggal_kehamilan,
            'quest1' => $request->quest1,
            'quest2' => $request->quest2,
            'quest3' => $request->quest3,
            'quest4' => $request->quest4,
            'quest5' => $request->quest5,
            'quest6' => $request->quest6,
            'quest7' => $request->quest7,
            'quest8' => $request->quest8,
            'quest9' => $request->quest9,
            'quest10' => $request->quest10,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'keterangan' => $request->keterangan,
            'nomor_kontak' => $request->nomor_kontak,
        ];
    }

    private function storeUploadedFile(SurveiRequest $request, string $field, string $directory): string
    {
        $file = $request->file($field);
        $fileName = time() . '_' . uniqid() . '.' . $file->extension();
        Storage::disk('private')->putFileAs($directory, $file, $fileName);

        return $fileName;
    }

    private function privateImageResponse(string $path)
    {
        abort_unless(Storage::disk('private')->exists($path), 404, 'File tidak ditemukan');
        return response()->file(Storage::disk('private')->path($path));
    }

    private function scopedSurveiQuery()
    {
        $user = Auth::user();
        $query = Survei::with('province', 'regencie', 'district', 'village', 'creator')->latest();

        if ($user->isRt()) {
            $query->where('created_by', $user->id);
        } elseif ($user->isRw()) {
            $query->whereHas('creator', function ($q) use ($user) {
                $q->where('rw_number', $user->rw_number)
                  ->where('village_id', $user->village_id);
            });
        } elseif ($user->isKelurahan() && $user->village_id) {
            $query->where('village_id', $user->village_id);
        }

        return $query;
    }

    private function authorizeView(Survei $survei): void
    {
        $user = Auth::user();

        if ($user->isKelurahan() && (!$user->village_id || $survei->village_id === $user->village_id)) {
            return;
        }

        if ($user->isRw()
            && $survei->creator?->rw_number === $user->rw_number
            && $survei->creator?->village_id === $user->village_id) {
            return;
        }

        if ($user->isRt() && $survei->created_by === $user->id) {
            return;
        }

        abort(403);
    }

    private function authorizeEdit(Survei $survei): void
    {
        $user = Auth::user();

        abort_unless($user->isRt() && $survei->created_by === $user->id, 403);
        abort_unless($survei->isDraft(), 403, 'Data sudah dikirim, tidak bisa diedit.');
    }
}
