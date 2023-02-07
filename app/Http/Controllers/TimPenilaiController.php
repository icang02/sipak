<?php

namespace App\Http\Controllers;

use App\Models\Dupak;
use App\Models\TimPenilai;
use Illuminate\Http\Request;

class TimPenilaiController extends Controller
{
    public function index()
    {
        return view('dashboard.tim-penilai', [
            'title' => 'Tim Penilai',
            'timPenilai' => TimPenilai::orderBy('nama')->get(),
        ]);
    }

    public function show(TimPenilai $list)
    {
        $timPenilai = $list->id;
        $data = Dupak::where('pak_janjun', $timPenilai)->orWhere('pak_juldes', $timPenilai)->orderBy('nama')->get();

        return view('dashboard.list-nama', [
            'title' => 'List Nama',
            'dupak' => $data,
            'timPenilai' => $timPenilai,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required|unique:tim_penilai',
        ], [
            'unique' => 'NIP yang dimasukan sudah ada.',
        ]);

        TimPenilai::create([
            'nama' => ucfirst($request->nama),
            'nip' => $request->nip,
        ]);

        return redirect()->route('tim.penilai')->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, TimPenilai $data)
    {
        $rules = [
            'nama' => 'required',
            'nip' => 'required|unique:tim_penilai',
        ];

        if ($request->nip == $data->nip) {
            $rules['nip'] = 'required';
        }

        $request->validate($rules, ['unique' => 'NIP yang dimasukan sudah ada.']);

        $data->update([
            'nama' => ucfirst($request->nama),
            'nip' => $request->nip,
        ]);

        return redirect()->route('tim.penilai')->with('success', 'Data berhasil diupdate');
    }

    public function destroy(TimPenilai $data)
    {
        $data->delete();
        return redirect()->route('tim.penilai')->with('success', 'Data berhasil dihapus.');
    }
}
