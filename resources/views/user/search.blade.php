@extends('layouts.title')
@section('title', 'E-shop Home page')

@extends('layouts.master')

@section('content')

    <main class="page blog-post-list">
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-heading">
                    <h2 class="text-info"></h2>
                </div>
                <div class="block-content">
                    <div class="clean-blog-post">
                        <div class="row">
                            @forelse ($data as $info)
                                <div class="col-lg-5">
                                    <a href="view_item/{{ $info->id }}">
                                        <img class="rounded d-block mx-auto" height="150px" width="auto" src="uploads/{{ $info->gallery }}">
                                    </a>
                                </div>
                                <div class="col-lg-5">
                                    <h3>
                                        <a href="view_item/{{ $info->id }}" class="nav-link link-primary">
                                            {{ $info->name }}</a>
                                    </h3>

                                    <div class="info"><span class="text-muted">$ {{number_format ($info->price)}}</span></div>
                                    <p>
                                        <a href="view_item/{{ $info->id }}" class="nav-link">
                                            {{ Str::limit ($info->description,50)  }}</a>
                                    </p>
                                    <form action="{{ url('add_to_cart', $info->id) }}" method="post">
                                        @csrf
                                        <div class="col-6 col-sm-2 py-2 quantity">

                                            <label class="form-label d-none d-md-block" for="quantity">Quantity</label>
                                            <input type="number" id="quantity" name="quantity" min="1"
                                                class="form-control quantity-input" value="1" required>
                                        </div>
                                        <input type="hidden" name="product_id" value="{{ $info->id }}" id="">
                                        <button class="btn btn-secondary" type="submit"><i class="icon-basket"></i>Add to
                                            Cart</button>
                                    </form>
                                </div>
                                <hr class="mt-3 mb-3">

                                @empty
                                <tr>
                                  <td colspan="15">
                                    <p class="text-center fs-5 mt-3">Sorry no data found..</p>
                                  </td>
                                </tr>
                            @endforelse
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection
