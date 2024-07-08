<?php

namespace App\Exports;

use App\Models\Hasil;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class HasilsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function collection()
    {
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
    
        return $hasils;
    }

    public function headings(): array
    {
        return ['NRP', 'Nama', 'Nilai', 'Rank'];
    }
    
    public function map($hasil): array
    {
        return [
            $hasil->Alternatif->nrp,
            $hasil->Alternatif->nama,
            // '="'.$hasil->nilai.'"',
            $hasil->nilai,
            $hasil->rank,
        ];
    }
    
}
