<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="{{ asset('User/assets/img/logo.png') }}" alt="">
            <h1 class="sitename">FlexStart</h1>
        </a>

        <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="/" class="active">Home<br></a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#services">Services</a></li>
                <li><a href="#portfolio">Portfolio</a></li>
                @if (Auth::guard('customer')->check())
                    <li><a href="{{ asset('/pakaian') }}">Pakaian</a></li>
                    <li><a href="{{ asset('/produk') }}">Produk</a></li>
                    <li><a href="{{ asset('/keranjang/' . Auth::guard('customer')->user()->id) }}">Keranjang</a></li>
                    <li><a href="{{ asset('/history/' . Auth::guard('customer')->user()->id) }}">Riwayat </a></li>

                    <form action="{{ url('/logout') }}" method="POST">
                        @csrf
                        <li><button class="btn btn-danger">Logout</button></li>
                    </form>
                @else
                    <li><a href="{{ '/login' }}">Login</a></li>
                @endif
                {{-- <li><a href="blog.html">Blog</a></li> --}}
            </ul>
            <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>
    </div>
</header>
