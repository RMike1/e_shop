@extends('layouts.title')
@section('title','E-shop Orders')

@extends('layouts.master')

@section('content')



<main class="page payment-page">
    <section class="clean-block payment-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info">Payment</h2>
            </div>
            <form>
                <div class="products">
                    <h3 class="title">Checkout</h3>
                    @foreach ($order as $item)
                        
                    <div class="item">

                        @if ($item->payment_status=='order has been canceled')
                        
                        <button disabled class="price btn btn-outline-danger btn-sm " href="{{url('cancel/order',$item->id)}}">
                            Canceled

                        </button>

                        @elseif ($item->payment_status=='delivered')
                        
                        <button disabled class="price btn btn-outline-success btn-sm">
                            Delivered

                        </button>
                        @else

                        <a  class="price btn btn-danger btn-sm" onclick="return confirm('are u sure to cancel this order?')" href="{{url('cancel/order',$item->id)}}">
                            Cancel

                        </a>
                            
                        @endif
                       
                        <span class="price me-3">${{number_format($item->total_amount)}}</span>
                        <p class="item-name">{{$item->name}}</p>
                        <p class="item-description">Price: {{number_format($item->price)}}</p>
                        <p class="item-description">Quantity: {{$item->quantity}}</p>
                        <p class="item-description">Address: {{$item->address}}</p>
                        <p class="item-description">Payment Method: {{$item->payment_method}}</p>

                        @if ($item->payment_status=='delivered')

                        <p class="item-description">Payment Status: <span class="badge bg-success">{{$item->payment_status}}</span></p>
                        @elseif ($item->payment_status=='order has been canceled')

                        <p class="item-description">Payment Status: <span class="badge bg-danger">{{$item->payment_status}}</span></p>

                        @elseif ($item->payment_status=='pending')

                        <p class="item-description">Payment Status: <span class="badge bg-warning">{{$item->payment_status}}</span></p>


                        @else

                        <p class="item-description">Payment Method: {{$item->payment_status}}</p>


                        @endif
                        
                       
                    </div><hr>
                 
                    @endforeach

                    <div class="total fs-5"><span>Total</span><span class="price">${{number_format($totalitems)}}</span></div>

                </div>
                <div class="col-sm-12">
                    <div class="mb-3"><button class="btn btn-secondary d-block w-100" type="submit">Proceed</button></div>
                </div>
               
            </form>
        </div>
    </section>
</main>

@endsection