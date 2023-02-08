<?php

namespace App\Exports;

use App\Models\PKB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PegawaiExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $data = PKB::all();
        return view('exports.table-pkb', [
            'data' => $data,
        ]);
    }
}
