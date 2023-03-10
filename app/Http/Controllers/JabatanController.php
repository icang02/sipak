<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\PKB;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index()
    {
        $data = Jabatan::all();
        return view('dashboard.list-jabatan', [
            'title' => 'Jabatan',
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate(
            ['nama' => 'required|unique:jabatan'],
            ['unique' => 'Jabatan sudah ada.']
        );

        Jabatan::create(['nama' => ucfirst($request->nama)]);

        return back()->with('success', 'Jabatan berhasil ditambahkan');
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $rules = ['nama' => 'required|unique:jabatan'];
        if ($request->nama == $jabatan->nama) $rules['nama'] = 'required';

        $request->validate(
            $rules,
            ['unique' => 'Jabatan sudah ada.']
        );

        $jabatan->update(['nama' => ucfirst($request->nama)]);
        return back()->with('success', 'Jabatan berhasil diupdate');
    }

    public function destroy(Jabatan $jabatan)
    {
        $cekPKB = PKB::where('jabatan_id', $jabatan->id)->first()->count();
        if ($cekPKB > 0) {
            return back()->with('danger', 'Data jabatan masih digunakan pada data lain.');
        }
        $jabatan->delete();
        return back()->with('success', 'Jabatan berhasil dihapus');
    }
}
