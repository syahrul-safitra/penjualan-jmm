@extends('Auth.main')


@section('container')
    <div class="row h-100 align-items-center justify-content-center " style="min-height: 100vh;">
        <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
            <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                <div class="d-flex align-items-center justify-content-between mb-3">

                    <div>
                        <h3 class="text-primary mx-auto display-6 text-info"><i class="bi bi-printer me-5"></i>
                    </div>
                    <div>
                        <h3 class="text-primary mx-auto text-info">Jambi Mitra Mandiri</h3>
                    </div>

                </div>
                <form action="{{ url('login') }}" method="POST">
                    @if (session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="email" value="{{ @old('email') }}"
                            autofocus required>
                        <label for="email">Email address</label>
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="floatingPassword"
                            placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button type="submit" class="btn btn-info py-3 w-100 mb-4">Login</button>
                    <a href="{{ url('/register') }}" class="btn btn-info w-100">Register</a>
                </form>
            </div>
        </div>
    </div>
@endsection
