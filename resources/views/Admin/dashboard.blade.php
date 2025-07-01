@extends('Admin.Layouts.main')

@section('container')
    <div class="d-flex flex-column gap-3 mb-3">

        <div class="row g-4">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    {{-- <i class="fa fa-chart-line fa-3x text-primary"></i> --}}
                    {{-- <i class="bi bi-egg-fried"></i> --}}
                    {{-- <i class="fas fa-shopping-cart fa-2x text-info"></i> --}}
                    <i class="bi bi-bag-check-fill display-6 text-info"></i>
                    <div class="ms-3">
                        <p class="mb-2">Penjualan Pakaian Bulan Ini</p>
                        <h6 class="mb-0">{{ $penjualanPakaianBulanIni }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    {{-- <i class="fa fa-chart-bar fa-3x text-primary"></i> --}}
                    {{-- <i class="fas fa-mail-bulk fa-2x text-primary"></i> --}}
                    <i class="bi bi-cash-stack display-6 text-info"></i>
                    <div class="ms-3">
                        <p class="mb-2">Pendapatan Pakaian Bulan Ini</p>
                        <h6 class="mb-0">{{ 'Rp. ' . number_format($pendapatanPakaianBulanIni, 0, 0) }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="bi bi-book display-6 text-info"></i>
                    <div class="ms-3">,
                        <p class="mb-2">Penjualan Product Bulan Ini</p>
                        <h6 class="mb-0">{{ $penjualanProductBulanIni }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    {{-- <i class="fas fa-users fa-2x text-info"></i> --}}
                    {{-- <i class="bi bi-cash-coin"></i> --}}
                    <i class="bi bi-cash-stack display-6 text-info"></i>
                    <div class="ms-3">
                        <p class="mb-2">Pendapatan Product Bulan Ini</p>
                        <h6 class="mb-0">{{ number_format($pendapatanProductBulanIni, 0, 0) }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fas fa-users fa-2x text-info"></i>
                    <div class="ms-3">
                        <p class="mb-2">Jumlah Pengguna</p>
                        <h6 class="mb-0">{{ $jumlahPengguna }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
