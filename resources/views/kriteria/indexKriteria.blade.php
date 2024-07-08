@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-bold-gray-800"><i class="fas fa-fw fa-folder"></i> Data Kriteria</h1>
        

        <a href="{{ route('createKriteria') }}" class="btn btn-sm btn-dark bg-gradient-primary"><i class="fa fa-plus mr-2"></i>Tambah Kriteria </a>
    </div>
    <div class="card shadow mb-4">


        <div class="card-body">
            <div class="table-responsive">
                <table id="" class="table  table-bordered table-lg" width="100%" cellspacing="0">
                    <thead class="text-white bg-gradient-primary">
                        <tr align="center">
                            <th style="width: 3%">No</th>
                            <th>Kode Kriteria</th>
                            <th>Nama Kriteria</th>
                            <th>Jenis Kriteria</th>
                            <th>Bobot Kriteria</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kriterias as $kriteria)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kriteria->kode_kriteria }}</td>
                                <td>{{ $kriteria->nama }}</td>
                                <td>{{ $kriteria->type }}</td>
                                <td>{{ $kriteria->bobot }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a data-toggle="tooltip" data-placement="bottom" title="Edit Data"
                                            href="{{ route('editKriteria', $kriteria) }}"
                                            class="btn btn-success btn-sm btn rounded mr-2"><i class="fa fa-pen"></i></a>
                                        <form action="{{ route('deleteKriteria', $kriteria) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button data-toggle="tooltip" data-placement="bottom" title="Hapus Data"
                                                onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')"
                                                class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
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
