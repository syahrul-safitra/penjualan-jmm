@extends('Admin.Layouts.main')

@section('container')
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                {{-- <a href="{{ asset("'file/' . $product->gambar") }}"Testing></a> --}}
                <h6 class="mb-4">Edit Product</h6>


                <form action="{{ url('product/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Product</label>
                        <a href="{{ asset('file/' . $product->gambar) }}">ff</a>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            id="nama" value="{{ @old('nama', $product->nama) }}" autocomplete="off" autofocus>
                        @error('nama')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" min="1" class="form-control @error('harga') is-invalid @enderror"
                            name="harga" id="harga" value="{{ @old('harga', $product->harga) }}" autocomplete="off">
                        @error('harga')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" min="0" class="form-control @error('jumlah') is-invalid @enderror"
                            name="jumlah" id="jumlah" value="{{ @old('jumlah', $product->jumlah) }}" autocomplete="off">
                        @error('jumlah')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" maxlength="200"
                            placeholder="max 200 karakter">{{ @old('deskripsi', $product->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Belakang</label>
                        <input type="file" class="form-control" id="image2" onchange="previewImage2()" name="gambar">
                        <img class="mt-4" id="img-preview2" src="{{ asset('file/' . $product->gambar) }}"
                            style="width: 200px; height: 200px">
                        @error('gambar')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <a href="{{ url('product') }}" class="btn btn-warning me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
