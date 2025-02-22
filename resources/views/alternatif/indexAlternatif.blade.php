@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Data Alternatif</h1>
        @if (Auth::user()->role == 'user')
        <a href="{{ route('createDataAlternatif') }}" class="btn btn-sm btn-dark bg-gradient-primary"><i class="fa fa-plus mr-2"></i> Tambah Data </a>
        @else
        <a href="{{ route('createDataAlternatif') }}" class="btn btn-sm btn-dark bg-gradient-primary" onclick="return false;"><i class="fa fa-plus mr-2"></i> Tambah Data </a>
        @endif
    </div>
    <div class="card shadow mb-4">


        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                <thead class="text-white bg-gradient-primary">
                        <tr align="center">
                            <th style="width: 3%">No</th>
                            <th>CIF</th>
                            <th>Nama</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataAlternatifs as $dataAlternatif)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dataAlternatif->nrp }}</td>
                                <td>{{ $dataAlternatif->nama }}</td>
                                <td>
                                @if (Auth::user()->role == 'user')
                                <div class="btn-group" role="group">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                        href="{{ route('editDataAlternatif', $dataAlternatif) }}"
                                        class="btn btn-success btn-sm btn rounded mr-2"><i class="fa fa-pen"></i></a>

                                    <form action="{{ route('deleteDataAlternatif', $dataAlternatif) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button data-toggle="tooltip" data-placement="bottom" title="Hapus Data"
                                            onclick="return confirm('Apakah anda yakin untuk menghapus data ini')"
                                            class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            @else
                                <div class="btn-group" role="group">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                        href="{{ route('editDataAlternatif', $dataAlternatif) }}"
                                        class="btn btn-success btn-sm btn rounded mr-2" onclick="return false;"><i class="fa fa-pen"></i></a>

                                    <form action="{{ route('deleteDataAlternatif', $dataAlternatif) }}" method="post" onsubmit="return false;">
                                        @method('delete')
                                        @csrf
                                        <button data-toggle="tooltip" data-placement="bottom" title="Hapus Data"
                                            onclick="return false;"
                                            class="btn btn-danger btn-sm" disabled><i class="fa fa-trash"></i></button>
                                    </form>
                                </div>
                            @endif

                                </td>
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
