<?php

namespace App\Http\Controllers;

use App\Models\Dtks;
use App\Exports\ExportDtks;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class DtksController extends Controller
{
    public function index()
    {
        $dtks = Dtks::paginate(20);
        return view('admin.dtks.index', compact('dtks'));
    }

    public function create()
    {
        return view('admin.dtks.create', ['kode' => '+62']);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'alamat'       => 'required|string',
            'nik'          => 'required|digits:16',
            'kk'           => 'required|digits:16',
            'nomor_kontak' => 'required|string|min:10|max:15',
            'keperluan'    => 'required|string',
        ]);

        Dtks::create([
            'nama'         => $request->nama,
            'alamat'       => $request->alamat,
            'nik'          => $request->nik,
            'kk'           => $request->kk,
            'nomor_kontak' => $request->nomor_kontak,
            'keperluan'    => $request->keperluan,
        ]);

        Alert::toast('Berhasil Menambah Data DTKS', 'success');
        return redirect('/dtks');
    }

    public function edit($id)
    {
        $dtks = Dtks::findOrFail($id);
        return view('admin.dtks.edit', compact('dtks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'alamat'       => 'required|string',
            'nik'          => 'required|digits:16',
            'kk'           => 'required|digits:16',
            'nomor_kontak' => 'required|string|min:10|max:15',
            'keperluan'    => 'required|string',
        ]);

        Dtks::findOrFail($id)->update([
            'nama'         => $request->nama,
            'alamat'       => $request->alamat,
            'nik'          => $request->nik,
            'kk'           => $request->kk,
            'nomor_kontak' => $request->nomor_kontak,
            'keperluan'    => $request->keperluan,
        ]);

        Alert::toast('Berhasil Mengubah Data DTKS', 'success');
        return redirect('/dtks');
    }

    public function destroy($id)
    {
        // [FIX] SoftDelete
        Dtks::findOrFail($id)->delete();
        Alert::toast('Berhasil Menghapus Data DTKS', 'success');
        return redirect('/dtks');
    }

    public function export()
    {
        $dtks = Dtks::all();
        return view('admin.dtks.export', compact('dtks'));
    }

    public function export_excel()
    {
        return Excel::download(new ExportDtks, 'dtks.xlsx');
    }

    public function pdf($id)
    {
        $dtks = Dtks::findOrFail($id);
        return view('admin.dtks.pdf', compact('dtks'));
    }
}
