<?php

namespace App\Http\Controllers;

use App\Models\Hasil;
use Illuminate\Http\Request;
use App\Exports\HasilsExport;
use Maatwebsite\Excel\Facades\Excel;

class HasilController extends Controller
{
    public function indexHasil()
    {
        $page = 'hasil';
        $hasils = Hasil::orderByDesc('nilai')->orderBy('id')->get();
        $currentRank = 0;
        $previousNilai = null;
        $previousRank = null;
        
        foreach ($hasils as $hasil) {
            if ($hasil->nilai == $previousNilai) {
                $hasil->rank = $previousRank;
            } else {
                $currentRank++;
                $hasil->rank = $currentRank;
            }
        
            $previousNilai = $hasil->nilai;
            $previousRank = $hasil->rank;
        }
        
        return view('hasil.indexHasil', compact(
            'page',
            'hasils'
        ));
    }
        
    public function exportHasil()
    {
        return Excel::download(new HasilsExport, 'Hasil Perhitungan ' . date('Y-M-D') . '.xlsx');
    }
}
