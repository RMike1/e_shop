@extends('layouts.title')
@section('title', 'E-shop Cart List')

@extends('layouts.master')

@section('content')

    <?php
    use App\Http\Controllers\ProductController;
    
    $total = ProductController::CartItem();
    ?>

    <main class="page shopping-cart-page">
        <section class="clean-block clean-cart dark">
            <div class="container">
                <div class="block-heading">
                    @if (session()->has('message'))
                        <div class="alert alert-warning">{{ session()->get('message') }}</div>
                    @endif
                    <h2 class="text-info">Cart List</h2>
                </div>
                <div class="content">
                    <div class="row g-0">

                        <div class="col-md-12 col-lg-8">
                            @php($count = 0)
                            @foreach ($data as $item)
                                @php($count++)

                                <div class="items">
                                
                            
                            <div class="product">
                                        <div class="row justify-content-center align-items-center">
                                            {{-- <div class="col-sm-1 fs-3"><span>{{$count}}</span></div> --}}
                                            <div class="col-md-4">

                                                <div class="product-image">
                                                    <img class="img-fluid d-block mx-auto image"
                                                        src="/uploads/{{ $item->gallery }}" width="200px">

                                                </div>
                                            </div>
                                            <div class="col-sm-3 product-info">
                                                <a class="product-name nav-link text-primary"
                                                href="{{url('/view_item',$item->id)}}">{{ $item->name }}</a>
                                                <div><span class="text-secondary">Price:&nbsp;</span><span
                                                        class="text-secondary">${{ number_format($item->price) }} </span>
                                                </div>
                                                <div><span class="text-secondary">Quantiy:&nbsp;</span><span
                                                        class="text-secondary">{{ $item->cartquantity }} </span></div>
                                                <div class="product-specs">
                                                    <div><span>Display:&nbsp;</span><span class="value">5 inch</span></div>
                                                    <div><span>RAM:&nbsp;</span><span class="value">4GB</span></div>
                                                    <div><span>Memory:&nbsp;</span><span class="value">32GB</span></div>
                                                </div>
                                            </div>
                                            
                                            <div class="col-6 col-md-3 price fs-5"><span>
                                                <p>${{ number_format($item->cartitem) }}</p>
                                            </span></div>
                                            <div class="col-6 col-sm-1 price">
                                                <span>
                                                    <a class="btn btn-danger"
                                                    onclick="return confirm('are u sure to delete this item?')"
                                                    href="remove_item/{{ $item->cart_id }}">X</a>
                                                </span>
                                            </div>
                                            <p></p>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-md-12 col-lg-4">

                            <div class="summary">
                                <h3>Summary</h3>
                                <label class="fw-semibold" for="p">Items in Cart: </label><span>
                                    {{ $total }}</span>
                                <h4><span class="text">Subtotal</span><span
                                        class="price">${{ number_format($totalitems) }}</span></h4>
                                <h4><span class="text">Discount</span><span class="price">0</span></h4>
                                <h4><span class="text">Shipping</span><span class="price">$10</span></h4>
                                <h4><span class="text">Total</span><span
                                        class="price">${{ number_format($totalitems + 10) }}</span></h4>
                                <form action="{{ url('payment_on_delivery') }}" method="post">
                                    @csrf

                                    <input type="text" name="address" class="form-control form-control-sm text-center"
                                        placeholder="enter your address..." required>
                                    <button class="btn btn-secondary btn-lg d-block w-100 mb-3" type="submit">Order by
                                        Cash</button>
                                </form>

                                <a href="order_by_card" class="btn btn-secondary btn-lg d-block w-100" type="submit">Order
                                    by Card</a>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
