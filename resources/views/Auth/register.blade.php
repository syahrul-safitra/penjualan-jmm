<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Registrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1674027392887-751d6396b710?q=80&w=1032&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }


        .register-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            /* Warna latar belakang form putih */
        }

        .form-header {
            background-color: #007bff;
            /* Warna biru untuk header */
            color: #ffffff;
            padding: 20px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            margin: -30px -30px 30px -30px;
            /* Sesuaikan margin agar menyatu dengan container */
            text-align: center;
        }

        .btn-primary {
            background-color: #007bff;
            /* Warna biru untuk tombol */
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            /* Warna biru lebih gelap saat hover */
            border-color: #0056b3;
        }

        .form-label {
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="register-container">
        <div class="form-header">
            <h2>Daftar Akun Baru</h2>
        </div>
        <form method="POST" action="{{ url('/register') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="namaLengkap" name="name"
                    placeholder="Masukkan nama lengkap Anda" value="{{ @old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="{{ @old('email') }}" id="email"
                    placeholder="contoh@example.com" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" class="form-control" name="password" id="password" value="{{ @old('password') }}"
                    placeholder="Max 8 karakter" required>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="noHp" class="form-label">Nomor WA</label>
                <input type="tel" class="form-control" name="no_wa" id="noHp"
                    placeholder="Contoh: 081234567890" value="{{ @old('no_wa') }}" required>
                @error('no_wa')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" id="alamat" rows="3" name="alamat" placeholder="Masukkan alamat lengkap Anda"
                    required>{{ @old('alamat') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="gambarProfil" class="form-label">Unggah Gambar Profil</label>
                <input class="form-control" name="gambar" type="file" id="gambarProfil" accept="image/*">
                <small class="form-text text-muted">Maksimal ukuran file 2MB.</small>
                @error('gambar')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-primary">Daftar Sekarang</button>
                <a href="{{ url('/login') }}" class="btn btn-primary">Login</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
