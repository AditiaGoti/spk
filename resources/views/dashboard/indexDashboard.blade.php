@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
@endpush
@section('main')
    <div class="mb-4">

        <!-- <div class="row">
            @if (Auth::user()->role == 'admin')
                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-bottom-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{ route('indexKriteria') }}"
                                            class="text-secondary text-decoration-none">Data Kriteria</a></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-folder fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                    <div class="card border-bottom-secondary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><a
                                            href="{{ route('indexSubKriteria') }}"
                                            class="text-secondary text-decoration-none">Nilai Kriteria</a></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-folder-open fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-bottom-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{ route('indexUser') }}"
                                        class="text-secondary text-decoration-none">Data User</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-cog fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-bottom-danger shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a
                                        href="{{ route('indexDataAlternatif') }}"
                                        class="text-secondary text-decoration-none">Data Alternatif</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-bottom-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{ route('indexPenilaian') }}"
                                        class="text-secondary text-decoration-none">Data Penilaian</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-bottom-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a
                                        href="{{ route('indexPerhitungan') }}"
                                        class="text-secondary text-decoration-none">Data Perhitungan</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calculator fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-bottom-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="{{ route('indexHasil') }}"
                                        class="text-secondary text-decoration-none">Data Hasil Akhir</a></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> -->
        </div>
    </div>
@endsection
@push('script')
@endpush
