@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Tambah Data Alternatif</h1>

        <a href="{{ route('indexDataAlternatif') }}" class="btn btn-sm btn-dark">
            <span class="icon text-white-50"></span>
            <span class="text">Kembali</span>
        </a>
    </div>
    <div class="card shadow mb-4">

        <form action="{{ route('storeDataAlternatif') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">CIF</label>
                        <input autocomplete="off" type="number" name="nrp" required class="form-control" />
                        @error('nrp')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="font-weight-bold">Nama</label>
                        <input autocomplete="off" type="text" name="nama" required class="form-control" />
                        @error('nama')
                            <p class="text-danger fs-6 fw-light my-2">{{ $message }}</p>
                        @enderror
                    </div>

                </div>
            </div>
            <div class="card-footer text-center">
                <button name="submit" value="submit" type="submit" class="btn btn-sm btn-success col-5"><i
                        class="fa fa-save"></i>
                    Simpan</button>
                <button type="reset" class="btn btn-sm btn-info col-5"><i class="fa fa-sync-alt"></i> Reset</button>
            </div>
        </form>
    </div>
@endsection
@push('script')
@endpush
