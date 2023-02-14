<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PegawaiExport;
use App\Exports\PKBPenilaiExport;
use App\Models\DataDupak;
use App\Models\Jabatan;
use App\Models\PKB;
use App\Models\TimPenilai;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PKBController extends Controller
{
    public function index()
    {
        $data = PKB::orderBy('nama')->get();
        return view('dashboard.data-pkb', [
            'data' => $data,
        ]);
    }

    // UPDATE DATA PEGAWAI
    public function updatePKB(Request $request, PKB $pkb)
    {
        // dd($request->all());
        $pkb->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'jabatan_id' => $request->jabatan_id,
            'pangkat' => $request->pangkat,
            'golongan' => $request->golongan,
            'kota' => $request->kota,
        ]);
        return back()->with('success', 'Data Pegawai telah diubah.');
    }

    public function export()
    {
        return Excel::download(
            new PegawaiExport(),
            'data-pkb-bkkbn.xlsx'
        );
    }
    public function exportList($id)
    {
        return Excel::download(
            new PKBPenilaiExport($id),
            'data-pkb-penilai.xlsx'
        );
    }

    public function show(PKB $data)
    {
        // $file = DataDupak::where('tahun', request()->tahun)->get()->count();
        // if ($file == 0) {
        //     return abort(404);
        // }

        $timPenilai = TimPenilai::all();
        return view('dashboard.data-pkb-show', [
            'data' => $data,
            'timPenilai' => $timPenilai,
            'jabatan' => Jabatan::all(),
            'kab_kota' => \Indonesia::search('sulawesi tenggara')->allCities(),
            'cekURL' => str_replace(url('/'), '', url()->previous()),
        ]);
    }

    public function lihat($tahun, $id)
    {
        $data = DataDupak::where('tahun', $tahun)->where('pkb_id', $id)->get()->first();
        // dd($data->file);
        // redirect jika data yang cari tidak ada
        if (!$data) return abort(404);

        $pathToFile = 'storage/' . $data->file;
        return response()->file($pathToFile);
    }
    public function previewPdf($tahun, $id)
    {
        $data = DataDupak::where('tahun', $tahun)->where('pkb_id', $id)->get()->first();
        dd($data->file);
        // redirect jika data yang cari tidak ada
        if (!$data) return abort(404);

        $pathToFile = 'storage/' . $data->file;
        return response()->file($pathToFile);
    }

    // Tambah Data DUPAK untuk PKB
    public function store(Request $request)
    {
        // dd($request->all());
        $cekDupak = DataDupak::where('pkb_id', $request->pkb_id)->where('tahun', $request->tahun)->get()->count();
        if ($cekDupak > 0) {
            return back()->with('danger', 'Data DUPAK tahun <b>' . $request->tahun . '</b> sudah ada.');
        }

        // dd($request->all());
        DataDupak::create([
            'pkb_id' => $request->pkb_id,
            'pak_janjun' => $request->pak_janjun,
            'pak_juldes' => $request->pak_juldes,
            'tahun' => $request->tahun,
            'verifikasi_pak_janjun' => $request->verifikasi_pak_janjun,
            'verifikasi_pak_juldes' => $request->verifikasi_pak_juldes,
        ]);
        return back()->with('success', 'Data telah ditambahkan.');
    }

    public function update(Request $request)
    {
        $dupak = DataDupak::findOrFail($request->dupak_id);
        $pkb_id = $dupak->pkb_id;

        $dupak->update([
            'pak_janjun' => $request->pak_janjun,
            'pak_juldes' => $request->pak_juldes,
            'verifikasi_pak_janjun' => $request->verifikasi_pak_janjun ?? false,
            'verifikasi_pak_juldes' => $request->verifikasi_pak_juldes ?? false,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('show.pkb', $pkb_id)->with('success', 'Data DUPAK telah diubah.');
    }

    public function destroy(DataDupak $id)
    {
        // dd($id->pkb_id);
        $tahun = $id->tahun;
        $pkb_id = $id->pkb_id;
        if ($id->file != null) {
            Storage::delete($id->file);
        }

        $id->delete();
        return redirect()->route('show.pkb', $pkb_id)->with('success', 'Data DUPAK tahun <b>' . $tahun . '</b> telah dihapus.');
    }

    // Tambah PKB
    public function tambahPKB(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'nip' => 'required|unique:pkb',
                'jabatan_id' => 'required',
                'pangkat' => 'required',
                'golongan' => 'required',
            ],
            [
                'nip.unique' => 'NiP yang dimasukkan sudah ada.'
            ]
        );

        PKB::create([
            'nama' => ucfirst($request->nama),
            'nip' => $request->nip,
            'jabatan_id' => $request->jabatan_id,
            'pangkat' => ucfirst($request->pangkat),
            'golongan' => ucfirst($request->golongan),
            'kota' => strtoupper($request->kota),
        ]);

        return back()->with('success', "Data pegawai berhasil ditambahkan. Data masuk atas nama <b>$request->nama</b>");
    }

    // HAPUS DATA PKB
    public function hapusPKB(PKB $data)
    {
        $fileHapus = DataDupak::where('pkb_id', $data->id)->get();
        // dd($fileHapus);
        foreach ($fileHapus as $item) {
            if ($item->file != null) {
                Storage::delete($item->file);
            }
            // dd($item);
            $item->delete();
        }

        $data->delete();

        return back()->with('success', 'Data pegawai berhasil dihapus');
    }
}
