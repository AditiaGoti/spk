@php
    use App\Models\Hasil;
@endphp
@extends('layouts.dashboard')
@section('title', 'Perhitungan')
@push('style')
@endpush
@section('main')

        

    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-black">Normalisasi Bobot Kriteria
                </h6>
            </div>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class=" text-black">
                        <tr align="center">
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria['kode_kriteria'] . ' (' . $kriteria['type'] . ')' }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr align="center">

                            @foreach ($kriterias as $kriteria)
                                <td>
                                    {{ $kriteria['normalisasi'] }}
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div> -->

    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-black">Bobot Kriteria dan Normalisasi
                </h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="text-white bg-gradient-primary">
                        <tr align="center">
                            <th> </th>
                            <th>Segmentasi</th>
                            <th>Plafond Pembiayaan</th>
                            <th>Kriteria Pelaku Ekspor</th>
                            <th>Perizinan</th>
                            <th>Pengajuan Fasilitas</th>
                            <th>Lama Kegiatan Usaha</th>
                            <th>Kepemilikan</th>
                    </thead>
                    <tbody>
                        <tr align="center">
                            <td> Bobot Kriteria </td>
                            @foreach ($kriterias as $kriteria)
                                <td>
                                    {{ $kriteria['bobot'] }}
                                </td>
                            @endforeach
                        </tr>
                        <tr align="center">
                            <td> Normalisasi Bobot </td>
                            @foreach ($kriterias as $kriteria)
                                <td>
                                    {{ substr($kriteria['normalisasi'], 0, 5) }}
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-black">Penilaian Alternatif
                </h6>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="text-white bg-gradient-primary">
                        <tr align="center">
                            <th width="3%">No</th>
                            <th>Nama Alternatif</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria['kode_kriteria'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatifs as $alternatif)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td align="left">{{ $alternatif['nama'] }}</td>
                                @foreach ($kriterias as $kriteria)
                                    @php
                                        $id_alternatif = $alternatif['id'];
                                        $id_kriteria = $kriteria['id'];
                                    @endphp
                                    <td>{{ $matriks_x[$id_kriteria][$id_alternatif] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    
    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-black">Nilai Utility
                </h6>
            </div>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="text-white bg-gradient-primary">
                        <tr align="center">
                            <th width="3%">No</th>
                            <th>Nama Alternatif</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria['kode_kriteria'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatifs as $alternatif)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td align="left">{{ $alternatif['nama'] }}</td>
                                @foreach ($kriterias as $kriteria)
                                    @php
                                        $id_alternatif = $alternatif['id'];
                                        $id_kriteria = $kriteria['id'];
                                    @endphp
                                    <td>{{ substr($nilai_u[$id_kriteria][$id_alternatif], 0,3) }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-black">Matriks Ternormalisasi Terbobot
                </h6>
            </div>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead class=" text-black">
                        <tr align="center">
                            <th width="3%">No</th>
                            <th>Nama Alternatif</th>
                            @foreach ($kriterias as $kriteria)
                                <th>{{ $kriteria['kode_kriteria'] }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alternatifs as $alternatif)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td align="left">{{ $alternatif['nama'] }}</td>
                                @foreach ($kriterias as $kriteria)
                                    @php
                                        $id_alternatif = $alternatif['id'];
                                        $id_kriteria = $kriteria['id'];
                                    @endphp
                                    <td>{{ $nilai_ub[$id_kriteria][$id_alternatif] }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> -->

    <div class="card shadow mb-4">
        <!-- /.card-header -->
        <div class="card-header py-3">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-black">Perhitungan Nilai Metode SMART
                </h6>
            </div>
        </div>



        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                <thead class="text-white bg-gradient-primary">
                        <tr align="center">
                            <th width="3%">No</th>
                            <th>Nama Alternatif</th>
                            <th>Total Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($perhitungan as $alternatif)
                            <tr align="center">
                                <td>{{ $loop->iteration }}</td>
                                <td align="left">{{ $alternatif['nama'] }}</td>
                                <td>{{ substr($alternatif['nilai'], 0, 5) }}</td>
                            </tr>
                            @php
                                Hasil::create([
                                    'uuid' => Str::uuid(),
                                    'alternatif_id' => $alternatif['id'],
                                    'nilai' => $alternatif['nilai'],
                                ]);
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
@endpush
