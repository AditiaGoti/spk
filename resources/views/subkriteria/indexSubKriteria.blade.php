@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    @if ($subkriterias->count() <= 0)
        <p>Data Tidak Ditemukan</p>
    @else
        @foreach ($subkriterias as $subkriteria)
            <div class="card shadow mb-4">
                <!-- /.card-header -->
                <div class="card-header py-3">
                    <div class="d-sm-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-black">
                            {{  $subkriteria->kode_kriteria . ' - ' . $subkriteria->nama  }}</h6>

                        <a href="#tambah{{ $subkriteria->id }}" data-toggle="modal" class="btn btn-sm btn-dark bg-gradient-primary">
                        <i class="fa fa-plus mr-2"></i> Tambah nilai kriteria </a>
                    </div>
                </div>

                <div class="modal fade" id="tambah{{ $subkriteria->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myModalLabel"> Tambah Nilai Kriteria
                                </h5>
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            </div>
                            <form action="{{ route('storeSubKriteria', $subkriteria) }}" method="post">
                                @csrf
                                <div class="modal-body">
                                    <input type="text" name="id_kriteria" value="" hidden>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nama</label>
                                        <input autocomplete="off" type="text"class="form-control" name="nama"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label class="font-weight-bold">Nilai</label>
                                        <input autocomplete="off" step="0.001" type="number" name="nilai"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal"> Batal</button>
                                    <button type="submit" name="tambah" class="btn btn-sm btn-success">
                                        Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead class=" text-white bg-gradient-primary">
                                <tr align="center">
                                    <th width="3%">No</th>
                                    <th>Nama</th>
                                    <th>Nilai</th>
                                    <th width="15%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subkriteria->SubKriteria as $SubKriteria)
                                    <tr align="center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $SubKriteria->nama }}</td>
                                        <td>{{ $SubKriteria->nilai }}</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a data-toggle="modal" title="Edit Data"
                                                    href="#editsk{{ $SubKriteria->id }}"
                                                    class="btn btn-success btn-sm btn rounded mr-2"><i
                                                        class="fa fa-pen"></i></a>

                                                <form action="{{ route('deleteSubKriteria', $SubKriteria) }}"
                                                    method="post">
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




                                    <!-- Modal -->
                                    <div class="modal fade" id="editsk{{ $SubKriteria->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i>
                                                        Edit
                                                        {{ $SubKriteria->nama }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">&times;</button>
                                                </div>
                                                <form action="{{ route('updateSubKriteria', $SubKriteria) }}"
                                                    method="post">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="font-weight-bold">Nama</label>
                                                            <input type="text" autocomplete="off" class="form-control"
                                                                value="{{ $SubKriteria->nama }}" name="nama" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="font-weight-bold">Nilai</label>
                                                            <input type="number" step="0.001" autocomplete="off"
                                                                name="nilai" class="form-control"
                                                                value="{{ $SubKriteria->nilai }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-warning"
                                                            data-dismiss="modal">
                                                            Batal</button>
                                                        <button type="submit" name="edit"
                                                            class="btn btn-sm  btn-success"><i class="fa fa-save"></i>
                                                            Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
        </div>
    @endif
@endsection
@push('script')
@endpush
