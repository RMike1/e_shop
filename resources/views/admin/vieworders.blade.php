

@extends('admin_layouts.master')

@extends('admin_layouts.title')

@section('title','Admin Show')

@section('content')

<base href="/public">

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Orders Table</h1>
    
  </div>
  

  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Orders</h5>

            <div class="search-bar">
              <form class="search-form d-flex mx-auto" method="POST" action="search/orders">
                @csrf
                <input type="text" class="form-control form-control-sm" style="width: 15%" name="name" placeholder="Search orders.." title="Enter search keyword">
                <button type="submit" class="btn btn-light" title="Search"><i class="bi bi-search"></i></button>
              </form>
            </div>

        <div class="table-responsive" >
            <table class="table table-hover datatable">
              <thead>
                <tr class="text-center">
                  <th scope="col">#</th>
                  <th>Name</th>
                  <th>Image</th>
                  <th>Price</th>
                  <th>Quantity</th>
                  <th>Total_Amount</th>
                  <th>Owner</th>
                  <th>Address</th>
                  <th>Email</th>
                  <th>Payment_Method</th>
                  <th>Payment_Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php($count=0)
                @forelse ($data as $item)
                  @php($count++)
                <tr class="text-center">
                  <th scope="row">{{$count}}</th>
                  <td>{{$item->product_name}}</td>
                  <td>
                  <img width="auto" height="100px" src="uploads/{{$item->gallery}}" alt="">  
                  </td>
                  <td>${{number_format($item->products_price)}}</td>
                  <td>{{$item->ordersquantity}}</td>
                  <td>${{number_format($item->orders_total_amount)}}</td>
                  <td>{{$item->user_name}}</td>
                  <td>{{$item->address}}</td>
                  <td>{{$item->email}}</td>
                  <td>{{$item->payment_method}}</td>

                 


                  <td>
                  
                    @if ($item->payment_status=='pending')

                    <span class="badge bg-warning">{{$item->payment_status}}</span>
                    

                    @elseif ($item->payment_status=='order has been canceled')

                    <span class="badge bg-danger">{{$item->payment_status}}</span>

                   

                    @else

                    <span class="badge bg-success">{{$item->payment_status}}</span>

                    @endif
                
                  
                  
                  </td>
                  


                  <td>
                  @if ($item->payment_status=='pending')
                   
                   
                   <a href="{{url('approve_payment',$item->orders_id)}}" onclick="return confirm('are u sure to approve this order?')" class="btn btn-sm btn-success">Approve</a>
                   
                   @else
                   <button disabled class="btn btn-sm btn-outline-success">Approved</button>

                   @endif

                   
                   
                   <a href="{{url('send_email',$item->orders_id)}}" class="btn btn-sm btn-secondary">Send Email</a>
                   
                   

                  </td>
                </tr>
                @empty

                <tr>
                  <td colspan="15">
                      <p class="text-center fs-5 mt-3">Sorry no data found..</p>
                  </td>
                </tr>
                
                @endforelse
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