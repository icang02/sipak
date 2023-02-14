<?php

namespace App\Http\Controllers;

use App\Models\DataDupak;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DataDukungController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:20480|mimes:pdf',
        ], [
            'file.required' => 'Belum ada file upload yang dipilih.',
            'file.max' => 'Ukuran file upload melebihi 20Mb.',
            'file.mimes' => 'Upload file dengan format .pdf.'
        ]);

        $dupak = DataDupak::where('pkb_id', $request->pkb_id)->where('tahun', $request->tahun)->get()->first();
        // if ($pkb->file != null) {
        //     Storage::delete($pkb->file);
        // }
        // dd($pkb);

        $fileDataDukung = $request->file('file')->store('data-dukung');
        $dupak->update([
            'file' => $fileDataDukung,
        ]);

        return back()->with('success', 'File telah diupload.');
    }

    public function delete($pkbId, $tahun)
    {
        // hapus file
        // dd($pkbId, $tahun);
        $dupak = DataDupak::where('pkb_id', $pkbId)
            ->where('tahun', $tahun)
            ->get()->first();
        // dd($dupak);
        Storage::delete($dupak->file);
        $dupak->update(['file' => null]);

        return back()->with('success', 'File data dukung berhasil dihapus.');
    }
}
