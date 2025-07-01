@extends('User.Layouts.main')

@section('container')
    <!-- Contact Section -->
    <section id="team" class="team section mt-5">





        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Proile</h2>
            {{-- <p>Riwayat Transaksimu</p> --}}
        </div><!-- End Section Title -->


        <div class="container" data-aos="fade-up" data-aos-delay="100">

            @if (session()->has('success'))
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    </div>
                </div>
            @endif

            <div class="row">
                <div class="container">
                    <div class="row gy-4 d-flex justify-content-center">
                        <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="team-member">
                                <div class="member-img">
                                    <img src="{{ asset('file/' . $customer->gambar) }}" class="img-fluid" alt="">
                                </div>
                                <div class="member-info">
                                    <h4>{{ $customer->name }}</h4>
                                    <span>{{ $customer->email }}</span>
                                    <span>{{ $customer->no_wa }}</span>
                                    {{-- <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut.
                                        Ipsum exercitationem iure minima enim corporis et voluptate.</p> --}}
                                </div>
                            </div>
                        </div><!-- End Team Member -->

                    </div>

                </div>
            </div>

        </div>
    </section><!-- /Contact Section -->

    {{-- Section Order History --}}

    <!-- Contact Section -->
    <section id="contact" class="contact section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>History</h2>
            <p>Riwayat Pemesanan</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <h4 class="py-3">Pakaian</h4>

            <div class="row">

                @foreach ($customer->orderCloth as $item)
                    <!-- Product Card -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-sm w-100">
                            <img src="{{ asset('file/' . $item->cloth->gambar_depan) }}" class="card-img-top"
                                alt="Kaos Polos">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->cloth->nama }}</h5>
                                {{-- <p class="card-text">Stok : {{ $item->jumlah }}</p> --}}
                                <div class="fw-bold text-primary d-flex justify-content-between mb-2">
                                    <p>Total Rp. {{ number_format($item->cloth->harga * $item->jumlah, 0, ',', '.') }}
                                    </p>
                                    <p>{{ 'Jumlah :' . $item->jumlah }}</p>
                                </div>
                                <div class="mt-auto d-flex justify-content-between">
                                    {{-- <a href="#" class="btn btn-outline-primary btn-sm">Detail</a> --}}

                                    <a class="btn btn-info" href="{{ url('detail-order-cloth/' . $item->id) }}">
                                        <i class="bi bi-ticket-detailed"></i>
                                    </a>

                                    {{-- <a href="{{ url('clothes/' . $item->id . '/' . Auth::guard('customer')->user()->id) }}"
                                        class="btn btn-success"><i class="bi bi-cash-stack"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <br>

            <h4 class="py-3">Product</h4>

            <div class="row">

                @foreach ($customer->orderProduct as $item)
                    <!-- Product Card -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-sm w-100">
                            <img src="{{ asset('file/' . $item->product->gambar) }}" class="card-img-top" alt="Kaos Polos">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->product->nama }}</h5>
                                {{-- <p class="card-text">Stok : {{ $item->jumlah }}</p> --}}
                                <div class="fw-bold text-primary d-flex justify-content-between mb-2">
                                    <p>Total Rp. {{ number_format($item->product->harga * $item->jumlah, 0, ',', '.') }}
                                    </p>
                                    <p>{{ 'Jumlah :' . $item->jumlah }}</p>
                                </div>
                                <div class="mt-auto d-flex justify-content-between">
                                    {{-- <a href="#" class="btn btn-outline-primary btn-sm">Detail</a> --}}

                                    <a class="btn btn-info" href="{{ url('detail-order-product/' . $item->id) }}">
                                        <i class="bi bi-ticket-detailed"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
