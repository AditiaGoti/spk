@extends('layouts.dashboard')
@section('title', 'Hasil')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Data Hasil Akhir</h1>
        <a href="{{ route('exportHasil') }}" target="_blank" class="btn btn-sm btn-dark bg-gradient-primary"><i class="fa fa-file-export mr-1"></i> Export
            Excel</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class=" text-white bg-gradient-primary">
                        <tr align="center">
                            <th>Nama Alternatif</th>
                            <th>Nilai</th>
                            <th width="15%">Rank</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($hasils as $hasil)
                        <tr align="center">
                            <td align="left">{{ $hasil->Alternatif->nama }}</td>
                            <td>{{ substr($hasil['nilai'], 0, 5) }}</td>
                            <td>{{ $hasil->rank }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
