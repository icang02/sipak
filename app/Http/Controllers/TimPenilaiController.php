<?php

namespace App\Http\Controllers;

use App\Models\DataDupak;
use App\Models\Dupak;
use App\Models\PKB;
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
        $data = DataDupak::where('pak_janjun', $timPenilai)->orWhere('pak_juldes', $timPenilai)->get();

        $array = [];
        foreach ($data as $item) {
            array_push($array, $item->pkb_id);
        }
        $dataPKB = PKB::whereIn('id', $array)->orderBy('nama')->get();

        return view('dashboard.list-nama', [
            'title' => 'List Nama',
            'data' => $dataPKB,
            'timPenilai' => $list,
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
        $cek = DataDupak::where('pak_janjun', $data->id)->orWhere('pak_juldes', $data->id)->count();
        if ($cek > 0) {
            return back()->with('danger', 'Hanya dapat menghapus tim penilai yang tidak memiliki list nama.');
        }

        $data->delete();
        return redirect()->route('tim.penilai')->with('success', 'Data berhasil dihapus.');
    }
}
