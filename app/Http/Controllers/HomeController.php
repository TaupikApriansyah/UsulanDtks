<?php

namespace App\Http\Controllers;

use App\Models\Dtks;
use App\Models\User;
use App\Models\Survei;
use App\Models\Konfirmasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user      = Auth::user();
        $admin     = User::count();
        $survei    = $user->isRt()
            ? Survei::where('created_by', $user->id)->count()
            : Survei::count();
        $dtks      = Dtks::count();
        $informasi = Konfirmasi::count();

        return view('dashboard', compact('admin', 'survei', 'dtks', 'informasi'));
    }

    public function pengguna()
    {
        $konfirmasi = Konfirmasi::latest()->take(6)->get();
        return view('pengguna.index', compact('konfirmasi'));
    }

    /**
     * Halaman cek status usulan. Warga melihat hasil final setelah Kelurahan mengirim informasi.
     * GET  → tampilkan form
     * POST → cari dan tampilkan status
     */
    public function cekStatus(Request $request)
    {
        $result = null;
        $canShowFinal = false;

        if ($request->isMethod('post')) {
            $request->validate([
                'nik' => 'required|digits:16',
                'kk'  => 'required|digits:16',
            ]);

            $result = Survei::where('nik', $request->nik)
                            ->where('kk',  $request->kk)
                            ->latest()
                            ->first();

            $canShowFinal = $result?->status === 'diinformasikan';
        }

        return view('pengguna.cek_status', compact('result', 'canShowFinal'));
    }
}
