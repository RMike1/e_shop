

@extends('admin_layouts.master')

@extends('admin_layouts.title')

@section('title','Admin Show')

@section('content')




<main id="main" class="main">

  <div class="pagetitle">
    <h1>View Cart</h1>
    
  </div>
  

  <section class="section">
    <div class="row">

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cart</h5>
        <div class="table-responsive" >
            <table class="table table-hover">
              <thead>
                
              </thead>
              <tbody>
                @foreach ($data as $item)
              
                <tr>
                    <th>Name:</th>
                  <td>{{$item->product_name}}</td>
                </tr>
                <tr>
                    <img width="auto" height="200px" src="/uploads/{{$item->gallery}}" alt=""></td>
                </tr>

                <tr>
                    <th>Price:</th>
                    <td>${{number_format($item->products_price)}}</td>
                </tr>

                <tr>
                    <th>Quantity:</th>
                    <td>{{$item->cartquantity}}</td>

                </tr>

                <tr>
                    <th>Total Amount:</th>
                    <td>${{number_format($item->cart_total_amount)}}</td>
                </tr>

                <tr>
                    <th>Owner:</th>
                    <td>{{$item->user_name}}</td>
                </tr>

              

                <tr>
                    <th>Email:</th>
                    <td>{{$item->email}}</td>
                </tr>

               

             

               


                @endforeach
               
              </tbody>
              
            </table>
            <a href="{{url('view_cartlist')}}" class="btn btn-secondary"><i class="bi bi-arrow-return-left"></i> Back</a>

          </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection