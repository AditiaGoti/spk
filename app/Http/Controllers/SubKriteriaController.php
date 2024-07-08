<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class SubKriteriaController extends Controller
{
    public function __construct()
    {
        return $this->middleware('admin');
    }

    public function indexSubKriteria()
    {
        $subkriterias   = Kriteria::latest()->with('SubKriteria', function ($query) {
            $query->orderBy('nilai', 'DESC');
        })->get();
        $page           = 'subkriteria';

        return view('subkriteria.indexSubKriteria', compact(
            'subkriterias',
            'page'
        ));
    }

    public function storeSubKriteria(Request $request, Kriteria $kriteria)
    {
        $request->validate([
            'nama'  => 'required',
            'nilai' => 'required'
        ]);

        SubKriteria::create([
            'uuid'          => Str::uuid(),
            'kriteria_id'   => $kriteria->id,
            'nama'          => $request->nama,
            'nilai'         => $request->nilai,
        ]);

        Alert::success('Berhasil', 'Nilai kriteria berhasil ditambah');
        return Redirect::route('indexSubKriteria');
    }

    public function updateSubKriteria(Request $request, SubKriteria $subKriteria)
    {
        $request->validate([
            'nama'  => 'required',
            'nilai' => 'required'
        ]);

        $subKriteria->update([
            'nama'          => $request->nama,
            'nilai'         => $request->nilai
        ]);

        Alert::success('Berhasil', 'Nilai kriteria berhasil di ubah');
        return Redirect::route('indexSubKriteria');
    }

    public function deleteSubKriteria(SubKriteria $subKriteria)
    {
        $subKriteria->delete();
        Alert::success('Berhasil', 'Nilai kriteria berhasil di hapus');
        return Redirect::route('indexSubKriteria');
    }
}
