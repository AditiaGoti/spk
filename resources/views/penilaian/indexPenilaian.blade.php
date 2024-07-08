@php
    use App\Models\Penilaian;
    use App\Models\SubKriteria;
@endphp
@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Data Penilaian</h1>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0" id="dataTable">
                <thead class="text-white bg-gradient-primary">
                        <tr align="center">
                            <th style="width: 3%">No</th>
                            <th>Nama Alternatif</th>
                            <th width="15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataAlternatifs as $dataAlternatif)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $dataAlternatif->nama }}</td>
                                <td>
                                @if (Auth::user()->role == 'user')
                                    @if ($dataAlternatif->Penilaian->count() == 0)
                                        <a data-toggle="modal" title="input Data"
                                            href="#inputpenialaian{{ $dataAlternatif->id }}"
                                            class="btn btn-success btn-sm btn rounded mr-2"><i class="fa fa-plus"></i></a>
                                    @else
                                        <a data-toggle="modal" title="Edit Data"
                                            href="#editpenilaian{{ $dataAlternatif->id }}"
                                            class="btn btn-warning btn-sm btn rounded mr-2"><i class="fa fa-eye"></i></a>
                                    @endif
                                @else
                                            <button data-toggle="modal" title="Edit Data"
                                                class="btn btn-warning btn-sm btn rounded mr-2"
                                                onclick="return false;"><i class="fa fa-eye"></i></button>
                                        
                                @endif
                                </td>
                            </tr>

                            <div class="modal fade bd-example-modal-lg" id="inputpenialaian{{ $dataAlternatif->id }}"
                                tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="myModalLabel">
                                                Tambah Penilaian</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>
                                        <form action="{{ route('storePenilaian', $dataAlternatif) }}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    @foreach ($dataKriterias as $dataKriteria)
                                                        <div class="form-group col-12 col-md-6">
                                                            <label class="font-weight-bold">{{ $dataKriteria->nama }}
                                                                ({{ $dataKriteria->kode_kriteria }})
                                                            </label>
                                                            <input type="hidden" name="kriteria_id[]" class="form-control"
                                                                value="{{ $dataKriteria->id }}">
                                                            <select name="nilai[]" class="form-control" required>
                                                                <option value="">Pilih nilai kriteria</option>
                                                                @foreach ($dataKriteria->Subkriteria as $Subkriteria)
                                                                    <option value="{{ $Subkriteria->id }}">
                                                                        {{ $Subkriteria->nama }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-warning" data-dismiss="modal"><i
                                                        class="fa fa-times"></i>
                                                    Batal</button>
                                                <button type="submit" name="edit" class="btn btn-success"><i
                                                        class="fa fa-save"></i>
                                                    Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="editpenilaian{{ $dataAlternatif->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
            
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                @foreach ($dataKriterias as $dataKriteria)
                                                    @php
                                                        $id_alternatif = $dataAlternatif->id;
                                                        $penilaian = Penilaian::where('alternatif_id', $id_alternatif)
                                                            ->where('kriteria_id', $dataKriteria->id)
                                                            ->first();
                                                    @endphp
                                                    <div class="form-group col-12 col-md-6">
                                                        <label class="font-weight-bold m-0">{{ $dataKriteria->nama }}
                                                            ({{ $dataKriteria->kode_kriteria }})
                                                        </label>
                                                        @if ($penilaian && !is_null($penilaian->nilai))
                                                            <h6 class="font-weight-light" style="font-size: 12px">
                                                                Dinilai Oleh :
                                                                {{ $penilaian->User->nama }}</h6>
                                                        @else
                                                            <h6 class="font-weight-light" style="font-size: 12px">
                                                                Tidak Dinilai.
                                                        @endif
                                                        <input type="text" class="form-control" name="kriteria_id[]"
                                                            value="{{ $dataKriteria->id }}" hidden>
                                                        @foreach ($dataKriteria->SubKriteria as $index => $subKriteria)
                                                            @if ($penilaian && !is_null($penilaian->nilai))
                                                                @if ($subKriteria->id == $penilaian->sub_kriteria_id)
                                                                    <input type="text" name="" id=""
                                                                        class="form-control"
                                                                        value="{{ $subKriteria->nama }}" required readonly>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-sm btn-warning" data-dismiss="modal"><i
                                                    class="fa fa-times"></i>
                                                Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
