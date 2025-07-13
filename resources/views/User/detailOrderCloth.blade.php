@extends('User.Layouts.main')

@section('container')
    <!-- Contact Section -->
    <section id="contact" class="contact section mt-5">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Detail Pemesanan</h2>
        </div><!-- End Section Title -->


        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">

                    {{-- Tambahkan carousel disini --}}
                    <div id="carouselContactImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded shadow">

                            <div class="carousel-item active">
                                <img src="{{ asset('file/' . $orderDetail->cloth->gambar_depan) }}" class="d-block w-100"
                                    alt="Customer Support 1">
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('file/' . $orderDetail->cloth->gambar_belakang) }}" class="d-block w-100"
                                    alt="Customer Support 2">
                            </div>


                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselContactImages"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>

                        <button class="carousel-control-next" type="button" data-bs-target="#carouselContactImages"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>


                </div>

                <div class="col-lg-6">
                    <form data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <label for="">Nama Customer</label>
                                <input type="text" class="form-control" placeholder="Your Name"
                                    value="{{ $orderDetail->customer->name }}" readonly>
                            </div>

                            <div class="col-md-6 ">
                                <label for="">Email</label>
                                <input type="email" class="form-control" value="{{ $orderDetail->customer->email }}"
                                    placeholder="Your Email" readonly>
                            </div>

                            {{-- Alamat + No HP --}}
                            <div class="col-md-6">
                                <label for="">No Wa</label>
                                <input type="text" class="form-control" placeholder="Your Name"
                                    value="{{ $orderDetail->customer->no_wa }}" readonly>
                            </div>

                            <div class="col-md-6 ">
                                <label for="">Alamat</label>
                                <input type="email" class="form-control" value="{{ $orderDetail->customer->alamat }}"
                                    placeholder="Your Email" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="">Jumlah</label>
                                <input type="text" class="form-control" name="jumlah" placeholder="Your Name"
                                    value="{{ $orderDetail->jumlah }}" readonly>
                            </div>

                            <div class="col-md-6 ">
                                <label for="">Harga</label>
                                <input type="email" class="form-control" value="{{ $orderDetail->cloth->harga }}"
                                    placeholder="Your Email" readonly>
                            </div>

                            {{-- Check disini : ada perbedaan atribut di model : total_harga dan di input total_hargaa --}}
                            <div class="form-group">

                                @php
                                    $total_harga = $orderDetail->cloth->harga * $orderDetail->jumlah;
                                @endphp

                                <label for="">Total Harga</label>
                                <input type="number" value="{{ $total_harga }}" class="form-control" name="total_hargaa"
                                    readonly />
                            </div>

                            <div class="col-12">
                                <label for="">Pilih Ukuran</label>
                                <select class="form-select" name="ukuran" aria-label="Default select example">
                                    <option value="">{{ $orderDetail->ukuran }}</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" class="form-control" readonly>{{ $orderDetail->keterangan }}</textarea>
                            </div>

                            <div class="col-12">
                                <label for="">Status Pemesanan</label>
                                <input type="text" class="form-control" value="{{ $orderDetail->status }}" readonly>
                            </div>

                            <div class="col-12">
                                <label for="">Status DP</label>
                                <input type="text" class="form-control" value="{{ $orderDetail->status_dp }}"
                                    readonly>
                            </div>

                            <div class="col-12">
                                <label for="">Nominal DP</label>
                                <input type="text" class="form-control" value="{{ $orderDetail->nominal_dp }}"
                                    readonly>
                            </div>

                            <div class="col-12">
                                <label for="gambar" class="form-label">Desain</label>
                                <br>
                                <a href="{{ asset('file/' . $orderDetail->desain) }}" class="btn btn-info">Desain</a>
                            </div>

                            <div class="col-12">
                                <label for="gambar" class="form-label">Bukti</label>
                                <br>
                                <a href="{{ asset('file/' . $orderDetail->bukti) }}" class="btn btn-info">Bukti</a>
                            </div>
                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
