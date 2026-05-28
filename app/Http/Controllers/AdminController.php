<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::with('village')->orderBy('role')->paginate(20);
        return view('admin.admin.admin', compact('user'));
    }

    public function create()
    {
        $villages = Village::select('id', 'name')->orderBy('name')->get();
        return view('admin.admin.tambah', compact('villages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users,email',
            'password'   => 'required|string|min:8',
            'role'       => 'required|in:kelurahan,rw,rt',
            'rt_number'  => 'nullable|string|max:10',
            'rw_number'  => 'nullable|string|max:10',
            'village_id' => 'nullable|string|exists:villages,id',
        ]);

        User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => $request->role,
            'rt_number'  => in_array($request->role, ['rt']) ? $request->rt_number : null,
            'rw_number'  => in_array($request->role, ['rt', 'rw']) ? $request->rw_number : null,
            'village_id' => $request->village_id,
        ]);

        Alert::toast('Berhasil Menambah User', 'success');
        return redirect('/admincontrol');
    }

    public function edit($id)
    {
        $admin    = User::findOrFail($id);
        $villages = Village::select('id', 'name')->orderBy('name')->get();
        return view('admin.admin.edit', compact('admin', 'villages'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users,email,' . $id,
            'password'   => 'nullable|string|min:8',
            'role'       => 'required|in:kelurahan,rw,rt',
            'rt_number'  => 'nullable|string|max:10',
            'rw_number'  => 'nullable|string|max:10',
            'village_id' => 'nullable|string|exists:villages,id',
        ]);

        $data = [
            'name'       => $request->name,
            'email'      => $request->email,
            'role'       => $request->role,
            'rt_number'  => in_array($request->role, ['rt']) ? $request->rt_number : null,
            'rw_number'  => in_array($request->role, ['rt', 'rw']) ? $request->rw_number : null,
            'village_id' => $request->village_id,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        User::findOrFail($id)->update($data);
        Alert::toast('Berhasil Mengubah Data User', 'success');
        return redirect('/admincontrol');
    }

    public function destroy($id)
    {
        User::findOrFail($id)->delete();
        Alert::toast('Berhasil Menghapus User', 'success');
        return redirect('/admincontrol');
    }
}
