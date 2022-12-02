

@extends('admin_layouts.master')

@extends('admin_layouts.title')

@section('title','Admin Show')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Cart Table</h1>
    
  </div>
  

  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Cart</h5>
        <div class="table-responsive" >
            <table class="table table-hover datatable">
              <thead>
                <tr class="text-center">
                  <th class="text-center" scope="col">#</th>
                  <th class="text-center">Name</th>
                  <th class="text-center">Image</>
                  <th class="text-center">Price</th>
                  <th class="text-center">Quantity</th>
                  <th class="text-center">Total_Amount</th>
                  <th class="text-center">Owner</th>
                  <th class="text-center">Email</th>
                </tr>
              </thead>
              <tbody>
                @php($count=0)
                @foreach ($data as $item)
                  @php($count++)
                <tr class="text-center">
                  <th scope="row">{{$count}}</th>
                  <td>{{$item->product_name}}</td>
                  <td>
                   <img src="/uploads/{{$item->gallery}}" width="auto" height="100px" alt=""> 
                  </td>
                  <td>${{number_format($item->products_price)}}</td>
                  <td>{{$item->cartquantity}}</td>
                  <td>${{number_format($item->cart_total_amount)}}</td>
                  <td>{{$item->user_name}}</td>
                  <td>{{$item->email}}</td>
                </tr>
                
                @endforeach
              </tbody>
            </table>
          </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection