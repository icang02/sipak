<?php

namespace App\Http\Controllers;

use App\Models\Dupak;
use App\Models\Jabatan;
use App\Models\TimPenilai;
use App\Exports\ViewExporter;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class DupakController extends Controller
{
    public function index()
    {
        return view('dashboard.data-dupak', [
            'dupak' => Dupak::orderBy('tahun', 'desc')->orderBy('nama')->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.add-data', [
            'jabatan' => Jabatan::all(),
            'kab_kota' => \Indonesia::search('sulawesi tenggara')->allCities(),
            'timPenilai' => TimPenilai::all(),
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required',
            'kota' => 'required',
            'tahun' => 'required',
        ]);

        Dupak::create([
            'tim_penilai_id' => $request->tim_penilai_id,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'judul' => $request->judul,
            'jabatan_id' => $request->jabatan_id,
            'kota' => $request->kota,
            'periode' => $request->periode,
            'pak_janjun' => $request->pak_janjun,
            'pak_juldes' => $request->pak_juldes,
            'tahun' => $request->tahun,
            'skp' => $request->skp ?? 0,
            'verifikasi' => $request->verifikasi ?? 0,
            'pangkat' => $request->pangkat,
            'golongan' => $request->golongan,
        ]);
        return redirect()->route('data.dupak')->with('success', 'Data DUPAK berhasil ditambahkan.');
    }

    public function edit(Dupak $data)
    {
        return view('dashboard.edit-dupak', [
            'jabatan' => Jabatan::all(),
            'kab_kota' => \Indonesia::search('sulawesi tenggara')->allCities(),
            'data' => $data,
            'timPenilai' => TimPenilai::all(),
        ]);
    }

    public function update(Request $request, Dupak $data)
    {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'jabatan_id' => 'required',
            'kota' => 'required',
            'tahun' => 'required',
        ]);

        $data->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan_id' => $request->jabatan_id,
            'pangkat' => $request->pangkat,
            'golongan' => $request->golongan,
            'pak_janjun' => $request->pak_janjun,
            'pak_juldes' => $request->pak_juldes,
            'kota' => $request->kota,
            'tahun' => $request->tahun,
            'skp' => $request->skp,
            'verifikasi' => $request->verifikasi,
        ]);

        return redirect()->route('data.dupak')->with('success', 'Data DUPAK berhasil diupdate.');
    }

    public function export()
    {
        return Excel::download(
            new ViewExporter(),
            'data-dupak-export.xlsx'
        );
    }
}
