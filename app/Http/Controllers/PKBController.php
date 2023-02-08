<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\PegawaiExport;
use App\Models\PKB;
use Maatwebsite\Excel\Facades\Excel;

class PKBController extends Controller
{
    public function index()
    {
        $data = PKB::all();
        return view('dashboard.data-pkb', [
            'data' => $data,
        ]);
    }

    public function export()
    {
        return Excel::download(
            new PegawaiExport(),
            'data-pkb-bkkbn.xlsx'
        );
    }

    public function show(PKB $data)
    {
        dd($data);
    }
}
