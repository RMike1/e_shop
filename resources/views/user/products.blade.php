
@extends('layouts.title')

@section('title','E-shop View-Item')

@extends('layouts.master')


@section('content')


<main class="page product-page">
    <section class="clean-block clean-product dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info"></h2>
            </div>
            <div class="block-content">
                <div class="product-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="gallery">
                                <div id="product-preview" class="vanilla-zoom">
                                    <div class="zoomed-image"></div>
                                    <div class="sidebar">
                                        <img class="img-fluid d-block small-preview"  width="100px" height="100px" src="/uploads/{{$data->gallery}}" alt="ne">

                                        <img class="img-fluid d-block small-preview" src="/assets/img/tech/image1.jpg">
                                        <img class="img-fluid d-block small-preview" src="/assets/img/tech/image1.jpg">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info">
                                <h3>{{$data->name}}</h3>
                                <div class="rating">
                                    <img src="/assets/img/star.svg">
                                    <img src="/assets/img/star.svg">
                                    <img src="/assets/img/star.svg">
                                    <img src="/assets/img/star-half-empty.svg">
                                    <img src="/assets/img/star-empty.svg">
                                </div>
                                <div class="price">
                                    <h3>${{number_format($data->price)}}</h3>
                                </div>

                                <form action="{{url('add_to_cart', $data->id)}}" method="post">
                                    @csrf
                                <div class="col-6 col-sm-2 py-2 quantity">
                                        
                                    <label class="form-label d-none d-md-block" for="quantity">Quantity</label>
                                    <input type="number" id="number" name="quantity" min="1" class="form-control quantity-input" value="1" required>
                                </div>
                                <input type="hidden" name="product_id" value="{{$data->id}}" id="">
                                <button class="btn btn-secondary" type="submit"><i class="icon-basket"></i>Add to Cart</button>
                                </form>
                                
                                <div class="summary">
                                <p>{{$data->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-info">
                    <div>
                        <ul class="nav nav-tabs" role="tablist" id="myTab">
                            <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" id="description-tab" href="#description">Description</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" id="specifications-tabs" href="#specifications">Specifications</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" id="reviews-tab" href="#reviews">Reviews</a></li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active description" role="tabpanel" id="description">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <div class="row">
                                    <div class="col-md-5">
                                        <figure class="figure"><img class="img-fluid figure-img" src="/assets/img/tech/image3.png"></figure>
                                    </div>
                                    <div class="col-md-7">
                                        <h4>Lorem Ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 right">
                                        <h4>Lorem Ipsum</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                    <div class="col-md-5">
                                        <figure class="figure"><img class="img-fluid figure-img" src="/assets/img/tech/image3.png"></figure>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade specifications" role="tabpanel" id="specifications">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td class="stat">Display</td>
                                                <td>5.2"</td>
                                            </tr>
                                            <tr>
                                                <td class="stat">Camera</td>
                                                <td>12MP</td>
                                            </tr>
                                            <tr>
                                                <td class="stat">RAM</td>
                                                <td>4GB</td>
                                            </tr>
                                            <tr>
                                                <td class="stat">OS</td>
                                                <td>iOS</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" role="tabpanel" id="reviews">
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating"><img src="/assets/img/star.svg"><img src="/assets/img/star.svg"><img src="/assets/img/star.svg"><img src="/assets/img/star.svg"><img src="/assets/img/star-empty.svg"></div>
                                        <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating"><img src="/assets/img/star.svg"><img src="/assets/img/star.svg"><img src="/assets/img/star.svg"><img src="/assets/img/star.svg"><img src="/assets/img/star-empty.svg"></div>
                                        <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="reviews">
                                    <div class="review-item">
                                        <div class="rating"><img src="/assets/img/star.svg"><img src="/assets/img/star.svg"><img src="/assets/img/star.svg"><img src="/assets/img/star.svg"><img src="/assets/img/star-empty.svg"></div>
                                        <h4>Incredible product</h4><span class="text-muted"><a href="#">John Smith</a>, 20 Jan 2018</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec augue nunc, pretium at augue at, convallis pellentesque ipsum. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clean-related-items">
                    <h3>Related Products</h3>
                    
                    
                    <div class="items">
                        
                        <div class="row justify-content-center">
                            @foreach ($info as $item)
                            
                            <div class="col-sm-6 col-lg-4">
                                <div class="clean-related-item">
                                    <div class="image"><a href="{{url('/view_item',$item->id)}}"><img class="img-fluid d-block mx-auto" style="width: 100px; height:100px" src="/uploads/{{$item->gallery}}"></a></div>
                                        <div class="related-name"><a href="view_item/{{$item->id}}">{{$item->name}}</a>
                                            <div class="rating"><img src="/assets/img/star.svg">
                                                <img src="/assets/img/star.svg">
                                                <img src="/assets/img/star.svg">
                                                <img src="/assets/img/star-half-empty.svg">
                                                <img src="/assets/img/star-empty.svg">
                                            </div>
                                            <h4>${{number_format($item->price)}}</h4>
                                            <form  action="{{url('add_to_cart', $data->id)}}" method="post">
                                                @csrf
                                            <div class="d-flex align-items-center px-5">
                                                    
                                                <input type="number" id="quantity" name="quantity" min="1" style="width: 50px;" class="me-1 mx-5 form-control form-control-sm quantity" value="1" required></span>
                                                <input type="hidden" name="product_id" value="{{$data->id}}" id="">
                                                <button class="btn btn-sm btn-secondary" type="submit"><i class="icon-basket"></i>Add to Cart</button>
                                            </div>
                                            </form>
                                        </div>
                                </div>
                            </div>
                            @endforeach

                            <div class="pt-5">

                            {!!$info->appends(Request::all())->links('pagination::bootstrap-4')!!}
                        </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
</main>

@endsection