@extends('layouts.dashboard')
@section('title', 'Dashboard')
@push('style')
<style>
.item {
    border: 1px solid grey;
    width: 100%;
    border-radius: 15px;
    display: flex;
    flex-direction: row;
    transition: background-color 0.3s, color 0.3s, border-color 0.3s, box-shadow 0.3s;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.item:hover {
    color: #fff;
    background-color: #4e73df;
    border-color: #4e73df;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.deskripsi {
    display: flex;
    flex-direction: row;
    padding: 35px;
    gap: 50px;
}

.icon {
    border: 1px solid grey;
    border-radius: 60px;
    padding: 30px;
    height: fit-content;
    transition: background-color 0.3s, border-color 0.3s;
}

.icon:hover {
    border-color: #fff;
}

.icon-width {
    position: relative;
    font-size: 70px;
    height: 20px;
}

.text {
    display: flex;
    flex-direction: column;
    margin-top: 20px;
}
</style>
@endpush

@section('main')
    <div class="mb-4">
        <h4 class="mb-3">DASHBOARD SPK MODAL EKSPOR</h4>
        <div class="col">
            <div class="item mb-4">
                <div class="deskripsi">
                    <div class="icon">
                        <i class="fa fa-rocket icon-width" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="text">   
                    <h3 class="text-black font-weight-bold">Tujuan</h3>
                    <p>Fasilitas Pembiayaan Modal Kerja Ekspor (PMKE) yang disediakan oleh Indonesia Eximbank dalam rangka mendukung usaha anda untuk:</p>
                    <ul>
                        <li>Pengadaan bahan baku dan/atau bahan penolong</li>
                        <li>Pembelian bahan baku termasuk kegiatan jasa baik dari dalam negeri maupun luar negeri</li>
                        <li>Penggantian dan/atau pemeliharaan komponen dan sarana produksi, kebutuhan musiman, membiayai inventori/ piutang/ kontrak; atau</li>
                        <li>Kebutuhan modal kerja khusus lainnya yang kegiatannya dalam rangka ekspor atau memiliki justifikasi ekspor.</li>
                    </ul>
                </div>
            </div>
            <div class="item">
                <div class="deskripsi">
                    <div class="icon">
                        <i class="fa fa-handshake icon-width" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="text">   
                    <h3 class="text-black font-weight-bold">Manfaat</h3>
                    <p>Membantu meningkatkan kesejahteraan masyarakat melalui kegiatan ekspor.</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
@endpush
