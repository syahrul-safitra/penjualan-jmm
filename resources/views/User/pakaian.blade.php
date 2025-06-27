@extends('User.Layouts.main')

@section('container')
    <!-- Product Section -->
    <section id="products" class="products section">

        <!-- Section Title -->
        <div class="container section-title pt-5" data-aos="fade-up">
            <h2>Pakaian</h2>
            <p>Buat pakaian terbaikmu</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="row gy-4">

                @foreach ($clothes as $item)
                    <!-- Product Card -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-sm w-100">
                            <img src="{{ asset('file/' . $item->gambar_depan) }}" class="card-img-top" alt="Kaos Polos">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->nama }}</h5>
                                <p class="card-text">Stok : {{ $item->jumlah }}</p>
                                <div class="fw-bold text-primary d-flex justify-content-between mb-2">
                                    <p>Rp. {{ number_format($item->harga, 0, ',', '.') }}</p>
                                    <p>{{ 'Stok :' . $item->jumlah }}</p>
                                </div>
                                <div class="mt-auto d-flex justify-content-between">
                                    {{-- <a href="#" class="btn btn-outline-primary btn-sm">Detail</a> --}}
                                    <a href="{{ url('clothes/' . $item->id . '/' . Auth::guard('customer')->user()->id) }}"
                                        class="btn btn-primary btn-sm">Tambah ke Keranjang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Product Card -->
                @endforeach


                <!-- Duplikat kartu produk lainnya di sini jika ingin menampilkan lebih banyak -->
            </div>
        </div>

    </section>
    <!-- /Product Section -->
@endsection
