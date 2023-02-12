<?php

namespace App\Exports;

use App\Models\DataDupak;
use App\Models\PKB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PKBPenilaiExport implements FromView, ShouldAutoSize
{
    public $idPenilai;
    public function  __construct($id)
    {
        $this->idPenilai = $id;
    }

    public function view(): View
    {
        $data = DataDupak::where('pak_janjun', $this->idPenilai)->orWhere('pak_juldes', $this->idPenilai)->get();

        $array = [];
        foreach ($data as $item) {
            array_push($array, $item->pkb_id);
        }
        $dataPKB = PKB::whereIn('id', $array)->orderBy('nama')->get();
        // $dataPKB = PKB::all();

        return view('exports.table-list-pkb', [
            'data' => $dataPKB,
        ]);
    }
}
