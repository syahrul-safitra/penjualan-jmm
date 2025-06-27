@extends('Admin.Layouts.main')

@section('container')
    <div class="col-12">
        <!-- Modal -->

        <h4 class="mb-2"><i class="bi bi-minecart me-2"></i>Pakaian</h4>
        {{-- Session Message --}}
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="bg-light rounded h-100 p-4">
            <div class="table-responsive">
                {{-- <table class="table table-hover" style="color:black" id="surat_masuk"> --}}
                <table class="table table-hover" id="surat_masuk" style="color:black">

                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-3">
                            <a href="{{ url('clothes/create') }} " class="btn btn-primary mb-3"><i
                                    class="bi bi-plus-circle me-2"></i></i>Tambah</a>

                            {{-- <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="bi bi-printer me-2"></i>Cetak</button> --}}
                        </div>

                    </div>

                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($clothes as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->jumlah }}</td>
                                <td>
                                    <div class="d-flex gap-4">

                                        <a href="{{ url('clothes/' . $item->id . '/edit') }}" class="btn btn-warning"
                                            style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px"><i
                                                class="bi bi-pencil-square"></i></a>

                                        <form action="{{ url('clothes/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn btn-danger btn-delete-suratmasuk"
                                                onclick="return confirm('Data pakaian akan dihapus.')"
                                                style="padding-top: 2px; padding-bottom: 2px; padding-left: 5px; padding-right: 5px">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
