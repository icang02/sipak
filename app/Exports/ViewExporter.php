<?php

namespace App\Exports;

use App\Models\Dupak;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ViewExporter implements FromView
{
    public function view(): View
    {
        // dd($id)
        if (request()->is('data-dupak*')) {
            $data = Dupak::orderBy('tahun', 'desc')->orderBy('nama')->get();
        } else {
            $data = Dupak::where('pak_janjun', 7)->orWhere('pak_juldes', 7)->orderBy('nama')->get();
        }

        return view('exports.users', [
            'data' => $data,
        ]);
    }
}
