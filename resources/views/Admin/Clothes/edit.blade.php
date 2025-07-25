@extends('Admin.Layouts.main')

@section('container')
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tambah Pakaian</h6>
                <form action="{{ url('clothes/' . $clothes->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Pakaian</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                            id="nama" value="{{ @old('nama', $clothes->nama) }}" autocomplete="off" autofocus>
                        @error('nama')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" min="1" class="form-control @error('harga') is-invalid @enderror"
                            name="harga" id="harga" value="{{ @old('harga', $clothes->harga) }}" autocomplete="off">
                        @error('harga')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" min="0" class="form-control @error('jumlah') is-invalid @enderror"
                            name="jumlah" id="jumlah" value="{{ @old('jumlah', $clothes->jumlah) }}" autocomplete="off">
                        @error('jumlah')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" maxlength="200"
                            placeholder="max 200 karakter">{{ @old('deskripsi', $clothes->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback text-red">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Depan</label>
                        <input type="file" class="form-control" id="image" onchange="previewImage()"
                            name="gambar_depan">
                        <img class="mt-4" id="img-preview" src="{{ asset('file/' . $clothes->gambar_depan) }}"
                            style="width: 200px; height: 200px">
                        @error('gambar_depan')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Belakang</label>
                        <input type="file" class="form-control" id="image2" onchange="previewImage2()"
                            name="gambar_belakang">
                        <img class="mt-4" id="img-preview2" src="{{ asset('file/' . $clothes->gambar_belakang) }}"
                            style="width: 200px; height: 200px">
                        @error('gambar_belakang')
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
