@extends('User.Layouts.main')

@section('container')
    <!-- Contact Section -->
    <section id="contact" class="contact section mt-5">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Keranjang</h2>
            <p>Tentukan jumlah sesuai kebutuhanmu</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">

                    {{-- Tambahkan carousel disini --}}
                    <div id="carouselContactImages" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded shadow">

                            <div class="carousel-item active">
                                <img src="{{ asset('file/' . $clothes->gambar_depan) }}" class="d-block w-100"
                                    alt="Customer Support 1">
                            </div>

                            <div class="carousel-item">
                                <img src="{{ asset('file/' . $clothes->gambar_belakang) }}" class="d-block w-100"
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
                    <form action="{{ url('storeCartClothes') }}" method="POST" data-aos="fade-up" data-aos-delay="200">
                        @csrf
                        <div class="row gy-4">

                            <input type="hidden" name="harga" value="{{ $clothes->harga }}">
                            <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                            <input type="hidden" name="clothing_id" value="{{ $clothes->id }}">


                            <div class="col-md-6">
                                <label for="">Nama Customer</label>
                                <input type="text" class="form-control" placeholder="Your Name"
                                    value="{{ $clothes->nama }}" readonly>
                            </div>

                            <div class="col-md-6 ">
                                <label for="">Email</label>
                                <input type="email" class="form-control" value="{{ $customer->email }}"
                                    placeholder="Your Email" readonly>
                            </div>

                            <div class="col-md-6">
                                <label for="">Stok</label>
                                <input type="text" class="form-control" placeholder="Your Name"
                                    value="{{ $clothes->jumlah }}" readonly>
                            </div>

                            <div class="col-md-6 ">
                                <label for="">Harga</label>
                                <input type="email" class="form-control" value="{{ $clothes->harga }}"
                                    placeholder="Your Email" readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Jumlah</label>
                                <input type="number" min="1" value="1" max="{{ $clothes->jumlah }}"
                                    class="form-control" name="jumlah" />
                            </div>

                            {{-- <div class="col-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject"
                                    required="">
                            </div> --}}

                            <div class="form-group">
                                <label for="">Total Harga</label>
                                <input type="text" class="form-control" placeholder="Name" name="total_harga" readonly />
                            </div>

                            {{-- <div class="col-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                            </div> --}}

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
