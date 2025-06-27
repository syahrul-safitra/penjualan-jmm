@extends('User.Layouts.main')

@section('container')
    <!-- Contact Section -->
    <section id="contact" class="contact section mt-5">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Keranjang</h2>
            <p>Silahkan lakukan pembayaran</p>
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

            <h4 class="py-3">Pakaian</h4>

            <div class="row">
                @foreach ($customer->cartClothing as $item)
                    <!-- Product Card -->
                    <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="card shadow-sm w-100">
                            <img src="{{ asset('file/' . $item->clothing->gambar_depan) }}" class="card-img-top"
                                alt="Kaos Polos">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $item->clothing->nama }}</h5>
                                {{-- <p class="card-text">Stok : {{ $item->jumlah }}</p> --}}
                                <div class="fw-bold text-primary d-flex justify-content-between mb-2">
                                    <p>Total Rp. {{ number_format($item->clothing->harga * $item->jumlah, 0, ',', '.') }}
                                    </p>
                                    <p>{{ 'Jumlah :' . $item->jumlah }}</p>
                                </div>
                                <div class="mt-auto d-flex justify-content-between">
                                    {{-- <a href="#" class="btn btn-outline-primary btn-sm">Detail</a> --}}

                                    <form action="{{ url('cart-destroy/' . $item->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Anda akan menghapus data keranjang ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    <a href="{{ url('order-clothes/' . $item->id . '/' . Auth::guard('customer')->user()->id) }}"
                                        class="btn btn-success"><i class="bi bi-cash-stack"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <br>

            <h4 class="py-3">Produk</h4>

            <div class="row">
                @foreach ($customer->cartProduct as $item)
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

                                    <form action="{{ url('cart-product-destroy/' . $item->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-danger"
                                            onclick="return confirm('Anda akan menghapus data keranjang ?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>

                                    <a href="{{ url('order-produk/' . $item->id . '/' . Auth::guard('customer')->user()->id) }}"
                                        class="btn btn-success"><i class="bi bi-cash-stack"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
