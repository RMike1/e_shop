

@extends('admin_layouts.master')

@extends('admin_layouts.title')

@section('title','Admin Show')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>View Order</h1>
    
  </div>
  

  <section class="section">
    <div class="row">

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Order</h5>
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
                    <td>{{$item->ordersquantity}}</td>

                </tr>

                <tr>
                    <th>Total Amount:</th>
                    <td>${{number_format($item->orders_total_amount)}}</td>
                </tr>

                <tr>
                    <th>Owner:</th>
                    <td>{{$item->user_name}}</td>
                </tr>

                <tr>
                    <th>Address:</th>
                    <td>{{$item->address}}</td>
                </tr>

                <tr>
                    <th>Email:</th>
                    <td>{{$item->email}}</td>
                </tr>

                <tr>
                    <th>Payment Method:</th>
                    <td>{{$item->payment_method}}</td>
                </tr>

                <tr>
                    <th>Payment Status:</th>
                    <td>
                  
                      @if ($item->payment_status=='pending')
  
                      <span class="badge bg-warning">{{$item->payment_status}}...</span>
                      
  
                      @elseif ($item->payment_status=='order has been canceled')
  
                      <span class="badge bg-danger">{{$item->payment_status}}</span>
  
                     
  
                      @else
  
                      <span class="badge bg-success">{{$item->payment_status}}</span>
  
                      @endif
                  
                    
                    
                    </td>
                </tr>

                <tr>
                    <th>
                        <a href="{{url('send_email',$item->orders_id)}}" class="btn btn-sm btn-secondary">Send Email</a>

                    </th>
                    <td>
                      @if ($item->payment_status=='pending')
                       
                       
                       <a href="{{url('approve_payment',$item->orders_id)}}" onclick="return confirm('are u sure to approve this order?')" class="btn btn-sm btn-success">Approve</a>
                       


                       @elseif ($item->payment_status=='order has been canceled')

                       <button disabled class="btn btn-sm btn-outline-danger">Canceled</button>


                       @else

                       <button disabled class="btn btn-sm btn-outline-success">Approved</button>
    
                       @endif
                </tr>


                @endforeach
              </tbody>
              
            </table>
            <a href="{{url('view_orders')}}" class="btn btn-secondary"><i class="bi bi-arrow-return-left"></i> Back</a>

          </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection