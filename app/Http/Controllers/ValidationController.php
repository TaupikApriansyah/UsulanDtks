<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

/**
 * Alur validasi:
 * 1. RT input usulan sebagai draft.
 * 2. RT kirim ke RW.
 * 3. RW validasi dan kirim ke Kelurahan.
 * 4. Kelurahan validasi ulang.
 * 5. Kelurahan klik Kirim Informasi agar warga bisa melihat hasil final di halaman cek status.
 */
class ValidationController extends Controller
{
    public function rwIndex()
    {
        $user = Auth::user();

        $query = Survei::with('creator', 'village')
            ->where('status', 'menunggu_rw');

        $query->whereHas('creator', function ($q) use ($user) {
            $q->where('rw_number', $user->rw_number)
              ->where('village_id', $user->village_id);
        });

        $area = $query->latest()->paginate(20);

        return view('admin.validasi.rw', compact('area'));
    }

    public function rwSetujui($id)
    {
        $survei = $this->getSurveiForRw($id);
        $survei->update([
            'status' => 'menunggu_kelurahan',
            'catatan_rw' => null,
            'catatan_kelurahan' => null,
            'hasil_kelurahan' => null,
            'informasi_dikirim_at' => null,
        ]);

        Alert::toast('Data berhasil dikirim ke Kelurahan', 'success');
        return redirect('/validasi/rw');
    }

    public function rwTolak(Request $request, $id)
    {
        $request->validate(['catatan_rw' => 'required|string|max:500']);

        $survei = $this->getSurveiForRw($id);
        $survei->update([
            'status' => 'draft',
            'catatan_rw' => $request->catatan_rw,
            'catatan_kelurahan' => null,
            'hasil_kelurahan' => null,
            'informasi_dikirim_at' => null,
        ]);

        Alert::toast('Data dikembalikan ke RT', 'warning');
        return redirect('/validasi/rw');
    }

    public function kelurahanIndex()
    {
        $user = Auth::user();

        $query = Survei::with('creator', 'village')
            ->whereIn('status', ['menunggu_kelurahan', 'siap_diinformasikan']);

        if ($user->village_id) {
            $query->where('village_id', $user->village_id);
        }

        $area = $query->latest()->paginate(20);

        return view('admin.validasi.kelurahan', compact('area'));
    }

    public function kelurahanSetujui($id)
    {
        $survei = $this->getSurveiForKelurahan($id, 'menunggu_kelurahan');
        $survei->update([
            'status' => 'siap_diinformasikan',
            'hasil_kelurahan' => 'disetujui',
            'catatan_kelurahan' => null,
            'informasi_dikirim_at' => null,
        ]);

        Alert::toast('Data disetujui. Lanjut kirim informasi ke warga.', 'success');
        return redirect('/validasi/kelurahan');
    }

    public function kelurahanTolak(Request $request, $id)
    {
        $request->validate(['catatan_kelurahan' => 'required|string|max:500']);

        $survei = $this->getSurveiForKelurahan($id, 'menunggu_kelurahan');
        $survei->update([
            'status' => 'siap_diinformasikan',
            'hasil_kelurahan' => 'ditolak',
            'catatan_kelurahan' => $request->catatan_kelurahan,
            'informasi_dikirim_at' => null,
        ]);

        Alert::toast('Data ditolak. Lanjut kirim informasi ke warga.', 'warning');
        return redirect('/validasi/kelurahan');
    }

    public function kelurahanKirimInformasi($id)
    {
        $survei = $this->getSurveiForKelurahan($id, 'siap_diinformasikan');
        abort_unless(in_array($survei->hasil_kelurahan, ['disetujui', 'ditolak'], true), 403);

        $survei->update([
            'status' => 'diinformasikan',
            'informasi_dikirim_at' => now(),
        ]);

        Alert::toast('Informasi sudah dikirim. Warga sudah bisa cek status.', 'success');
        return redirect('/validasi/kelurahan');
    }

    private function getSurveiForRw($id): Survei
    {
        $user = Auth::user();
        $survei = Survei::with('creator')->findOrFail($id);

        abort_unless($survei->status === 'menunggu_rw', 403);

        abort_unless(
            $survei->creator?->rw_number === $user->rw_number
            && $survei->creator?->village_id === $user->village_id,
            403
        );

        return $survei;
    }

    private function getSurveiForKelurahan($id, string $requiredStatus): Survei
    {
        $user = Auth::user();
        $survei = Survei::findOrFail($id);

        abort_unless($survei->status === $requiredStatus, 403);

        if ($user->village_id) {
            abort_unless($survei->village_id === $user->village_id, 403);
        }

        return $survei;
    }
}
