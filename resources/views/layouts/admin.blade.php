<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pos-flexlabs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.3.1/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" type="image/jpg" href="{{ asset('images/digital.jpg') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" 
     integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
     <style>
        .nav-zoom {
            display: inline-block;
            transition: transform 0.2s ease-in-out, color 0.2s ease-in-out;
        }
        .nav-zoom:hover {
            transform: scale(1.20);
        }
    </style>

  </head>
  <body>
    <div class="container">
            <div class="row">
                <div class="col-lg-1 p-2">
                    <img src="{{ asset('images/digital.jpg') }}" class="img-fluid" alt="">
                </div>
            </div>

        <div class="row">
            <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
            <a class="navbar-brand  nav-zoom" href="#">Core-Se</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
             data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" 
             aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        <div class="collapse navbar-collapse" id="navbarNav">


        <ul class="navbar-nav d-flex w-100 list-unstyled">
             <li class="nav-item">
                <a class="nav-link active nav-zoom " aria-current="page" href="{{url('/about')}}">
                <i class="fas fa-home "></i>
                About</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active nav-zoom 
                {{ request()->routeIs('customers.*') ? 'active fw-bold text-primary' : '' }}"
                 aria-current="page" href="{{url('/customers')}}">
                <i class="fa-solid fa-users"></i>
                Customer</a>
            </li>

             <li class="nav-item">
                <a class="nav-link active nav-zoom" aria-current="page" href="{{url('/dashboard')}}">
                <i class="fa-solid fa-gauge"></i>
                Dashboard</a>
            </li>

            <li class="nav-item">
                <a class="nav-link active  nav-zoom " href="{{url('/products')}}">
                <i class="fa-solid fa-box"></i>
                Products</a>
            </li> 

              <li class="nav-item">
                <a class="nav-link active  nav-zoom" href="{{url('/orders')}}">
                <i class="fa-solid fa-cart-shopping"></i>
                Order</a>
            </li> 

            <li class="nav-zoom item ms-auto">
                
                    <form action="{{ route('logout')}}" method="POST" >
                        @csrf
                        <button type="submit" class="btn btn-outline-danger btn-sm d-inline " >
                        <i class="fas fa-sign-out-alt"></i> Logout </button>
                    </form>
                
            </li>

           
        </ul>
        </div>
    </div>
    </nav>
            </div>
        </div>
        <main class="main-content">
             @yield("content")
        </main>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>