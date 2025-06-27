@extends('User.Layouts.main')

@section('container')
    <!-- Contact Section -->
    <section id="contact" class="contact section mt-5">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Pembayaran</h2>
            <p>Upload desain terbaikmu</p>
        </div><!-- End Section Title -->


        <div class="container" data-aos="fade-up" data-aos-delay="100">

            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            @if (session()->has('errorCart'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('errorCart') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            <div class="row gy-4">

                <div class="col-lg-6">

                    {{-- Tambahkan carousel disini --}}
                    <div id="carouselContactImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded shadow">

                            <div class="carousel-item active">
                                <img src="{{ asset('file/' . $clothes->clothing->gambar_depan) }}" class="d-block w-100"
                                    alt="Customer Support 1">
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('file/' . $clothes->clothing->gambar_belakang) }}" class="d-block w-100"
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
                    <form action="{{ url('store-order-clothing') }}" method="POST" data-aos="fade-up" data-aos-delay="200"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row gy-4">

                            <input type="hidden" name="harga" value="{{ $clothes->harga }}">
                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                            <input type="hidden" name="clothing_id" value="{{ $clothes->clothing->id }}">
                            {{-- <input type="hidden" name="cart_id" value="{{ $clothes->id }}"> --}}
                            <input type="hidden" name="cart_id" value="{{ $clothes->id }}">

                            <div class="col-md-6">
                                <label for="">Nama Customer</label>
                                <input type="text" class="form-control" placeholder="Your Name"
                                    value="{{ $customer->name }}" readonly>
                            </div>

                            <div class="col-md-6 ">
                                <label for="">Email</label>
                                <input type="email" class="form-control" value="{{ $customer->email }}"
                                    placeholder="Your Email" readonly>
                            </div>

                            {{-- Alamat + No HP --}}
                            <div class="col-md-6">
                                <label for="">No Wa</label>
                                <input type="text" class="form-control" placeholder="Your Name"
                                    value="{{ $customer->no_wa }}" readonly>
                            </div>

                            <div class="col-md-6 ">
                                <label for="">Alamat</label>
                                <input type="email" class="form-control" value="{{ $customer->alamat }}"
                                    placeholder="Your Email" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="">Jumlah</label>
                                <input type="text" class="form-control" name="jumlah" placeholder="Your Name"
                                    value="{{ $clothes->jumlah }}" readonly>
                            </div>

                            <div class="col-md-6 ">
                                <label for="">Harga</label>
                                <input type="email" class="form-control" value="{{ $clothes->clothing->harga }}"
                                    placeholder="Your Email" readonly>
                            </div>

                            {{-- Check disini : ada perbedaan atribut di model : total_harga dan di input total_hargaa --}}
                            <div class="form-group">

                                @php
                                    $total_harga = $clothes->clothing->harga * $clothes->jumlah;
                                @endphp

                                <label for="">Total Harga</label>
                                <input type="number" value="{{ $total_harga }}" class="form-control"
                                    name="total_hargaa" readonly />
                            </div>

                            <div class="col-12">
                                <label for="">Pilih Ukuran</label>
                                <select class="form-select" name="ukuran" aria-label="Default select example" required>
                                    <option value="">Pilih</option>
                                    <option value="M">M</option>
                                    <option value="S">S</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" class="form-control">{{ @old('keterangan') }}</textarea>
                            </div>

                            <div class="col-12">
                                <label for="gambar" class="form-label">Upload Desain</label>
                                <input type="file" class="form-control" id="image" onchange="previewImage()"
                                    name="desain">
                                <img class="mt-4" id="img-preview" style="width: 200px; height: 200px">
                                @error('desain')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="gambar" class="form-label">Resi Pembayaran</label>
                                <input type="file" class="form-control" id="image2" onchange="previewImage2()"
                                    name="bukti">
                                <img class="mt-4" id="img-preview2" style="width: 200px; height: 200px">
                                @error('bukti')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror

                            </div>

                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>



                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
@endsection
