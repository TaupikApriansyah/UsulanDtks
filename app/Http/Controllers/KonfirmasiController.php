<?php

namespace App\Http\Controllers;

use App\Models\Konfirmasi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KonfirmasiController extends Controller
{
    public function index()
    {
        $konfirmasi = Konfirmasi::latest()->paginate(9);
        return view('admin.konfirmasi.index', compact('konfirmasi'));
    }

    public function create()
    {
        return view('admin.konfirmasi.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image     = $request->file('foto');
        // [FIX] Nama file unik, bukan nama asli
        $imageName = time() . '_' . uniqid() . '.' . $image->extension();
        $image->move(public_path('img/konfirmasi'), $imageName);

        Konfirmasi::create(['foto' => $imageName]);
        Alert::toast('Berhasil Menambah Data', 'success');
        return redirect('/konfirmasi');
    }

    public function edit($id)
    {
        $data = Konfirmasi::findOrFail($id);
        return view('admin.konfirmasi.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $konfirmasi = Konfirmasi::findOrFail($id);
        $updateData = [];

        if ($request->hasFile('foto')) {
            $request->validate(['foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048']);
            $image     = $request->file('foto');
            $imageName = time() . '_' . uniqid() . '.' . $image->extension();
            $image->move(public_path('img/konfirmasi'), $imageName);
            $updateData['foto'] = $imageName;
        }

        if (!empty($updateData)) {
            $konfirmasi->update($updateData);
        }

        Alert::toast('Berhasil Mengubah Data', 'success');
        return redirect('/konfirmasi');
    }

    public function destroy($id)
    {
        Konfirmasi::findOrFail($id)->delete();
        Alert::toast('Berhasil Menghapus Data', 'success');
        return redirect('/konfirmasi');
    }
}
