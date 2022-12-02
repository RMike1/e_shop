<?php
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user')) {
    $total=ProductController::CartItem();
}
?>
<nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
    <div class="container"><a class="navbar-brand mx+4 logo" href="/">E-Shop</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" style="text-align: center" id="navcol-1">

            <ul class="navbar-nav ms-auto" >

              



                <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Product</a></li>
                <li class="nav-item"><a class="nav-link" href="/cartlist">Shopping Cart[ {{$total}} ]</a></li>
                <li class="nav-item"><a class="nav-link" href="/payment_by_cash">Payment</a></li>
                
                <form method="post" action="/search" class="navbar-form navbar-left d-flex">
                    @csrf
                    <input name="name" class="form-control form-control-sm" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-secondary btn-sm  me-4" type="submit">Search</button>
                    
                  </form>
                
                @if (
                    Session::has('user')
                )
                    
                    
                    <div class="dropdown dropdown-sm">

                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{Session::get('user')['name']}}
                        </a>
                      
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                      </div>
                      
                      @else
                        <li class="nav-item" >
                            <a name="" id="" class="nav-link" href="/login" role="button">Login</a>
                        </li>
                        <li class="nav-item">
                            <a name="" id="" class="nav-link" href="/register" role="button">Register</a>
                        </li>
                    @endif

                 
            </ul>
         
        
        </div>
    </div>
</nav>
