 <!-- Sidebar Start -->
 <div class="sidebar pe-4 pb-3">
     <nav class="navbar bg-light navbar-light">
         <a href="index.html" class="navbar-brand mx-4 mb-3">
             <h3 class="text-info"><i class="fa fa-hashtag me-2"></i>JMM</h3>
         </a>
         <div class="d-flex align-items-center ms-4 mb-4">
             <div class="position-relative">
                 <img class="rounded-circle" src="{{ asset('Admin/img/user.jpg') }}" alt=""
                     style="width: 40px; height: 40px;">
                 <div
                     class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                 </div>
             </div>
             <div class="ms-3">
                 {{-- <h6 class="mb-0">{{ Auth::guard('admin')->user()->name }}</h6> --}}
                 <h6 class="mb-0">{{ Auth::guard('admin')->user()->name }}</h6>
                 <span>Admin</span>

             </div>
         </div>
         <div class="navbar-nav w-100">
             <a href="{{ url('/dashboard') }}" class="nav-item nav-link  "><i
                     class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
             <a href="{{ url('/clothes') }}" class="nav-item nav-link {{ Request::is('clothes' ? 'active' : '') }}"><i
                     class="bi bi-bag-check-fill me-2"></i>Pakaian</a>
             <a href="{{ url('/product') }}" class="nav-item nav-link {{ Request::is('clothes' ? 'active' : '') }}"><i
                     class="bi bi-book me-2"></i>Product</a>
             <a href="{{ url('/order-pakaian') }}" class="nav-item nav-link "><i class="bi bi-cart4 me-2"></i>Order
                 Pakaian</a>
             <a href="{{ url('/order-product') }}" class="nav-item nav-link "><i class="bi bi-cart4 me-2"></i>Order
                 Product</a>
             <a href="{{ url('/customers') }}"
                 class="nav-item nav-link {{ Request::is('costumer*' ? 'active' : '') }}"><i
                     class="bi bi-people-fill me-2"></i>Customer</a>
             <a href="{{ url('/set-admin/1') }}" class="nav-item nav-link"><i
                     class="bi bi-person-circle me-2"></i>Admin</a>
         </div>
     </nav>
 </div>
