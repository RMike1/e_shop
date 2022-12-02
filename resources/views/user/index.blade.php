@extends('layouts.title')
@section('title','E-shop Home page')

@extends('layouts.master')

@section('content')
<main class="page catalog-page">
    <section class="clean-block clean-catalog dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-info"></h2>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="d-none d-md-block">
                            <div class="filters">
                                <div class="filter-item">
                                    <h3>Categories</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Phones</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Laptops</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">PC</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">Tablets</label></div>
                                </div>
                                <div class="filter-item">
                                    <h3>Brands</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Samsung</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Apple</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">HTC</label></div>
                                </div>
                                <div class="filter-item">
                                    <h3>OS</h3>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">Android</label></div>
                                    <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">iOS</label></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-md-none"><a class="btn btn-link d-md-none filter-collapse" data-bs-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">Filters<i class="icon-arrow-down filter-caret"></i></a>
                            <div class="collapse" id="filters">
                                <div class="filters">
                                    <div class="filter-item">
                                        <h3>Categories</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">Phones</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Laptops</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-3"><label class="form-check-label" for="formCheck-3">PC</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-4"><label class="form-check-label" for="formCheck-4">Tablets</label></div>
                                    </div>
                                    <div class="filter-item">
                                        <h3>Brands</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Samsung</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Apple</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">HTC</label></div>
                                    </div>
                                    <div class="filter-item">
                                        <h3>OS</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">Android</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">iOS</label></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="products">
                            
                            
                            <div class="row g-0">

                                @forelse ($data as $item)
                                
                                <div class="col-12 col-md-6 col-lg-4">
                                
                                
                                    <div class="clean-product-item">
                                        <div class="image">
                                            <a href="view_item/{{$item->id}}"><img class="d-block mx-auto" width="auto" height="100px" src="/uploads/{{$item->gallery}}"></a>
                                        </div>
                                        <div class="product-name">
                                            <a href="#">{{$item->name}}</a>
                                        </div>
                                        <div class="about">
                                            <div class="rating mb-1"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                            <div class="price mb-1">
                                                <h3>${{number_format($item->price)}}</h3>
                                            </div>
                                        </div>

                                        <form  action="{{url('add_to_cart', $item->id)}}" method="post">
                                            @csrf
                                        <div class="d-flex align-items-center mb-3 px-5">
                                                
                                            <input type="hidden" name="product_id" value="{{$item->id}}" id="">
                                            <input type="number" id="quantity" placeholder="quantity..." name="quantity" min="1" style="width: 50px;" class="me-1 form-control form-control-sm quantity" value="1" required></span>
                                            <button class="btn btn-sm btn-secondary" type="submit"><i class="icon-basket"></i>Add to Cart</button>
                                        </div>
                                        </form>
                                    
                                    </div>
                                </div>

                                @empty
                                <h5 class="ft-2 text-center mt-5">no data found...</h5>
                                
                                @endforelse
                                <div class="pt-5">
                                {!!$data->appends(Request::all())->links('pagination::bootstrap-4')!!}
                            </div>
                            </div>

                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="clean-block clean-catalog dark">
        <div class="container">
            
            <div class="content">
                <div class="row justify-content-center">
                    <div class="col-md-9">
                            <div class="products">
                                <div>
                                    <h4 class="text-center">Comments</h4>
                                </div>
                                <div>
                                    <form action="comment" method="POST">
                                        <div style="text-align:center">
                                            
                                            <textarea style="width: 300px;" type="text" name="name" placeholder="comment here..."></textarea><br>
                                        </div>
                                        <button class="btn btn-sm btn-primary d-block" style="margin-left: 34%; width:150px" type="submit">Submit</button>
                                    </form>
                                </div>
                                <h3 class="fs-4">All Comments</h3>
                                <div>
                                    <h5>Sam</h5>
                                    <p>first comment</p>
                                    <a href="javascript::void(0);" class="nav-link text-info" onclick="reply(this)">Reply</a>
                                </div><br>
                                <div>
                                    <h5>Sam</h5>
                                    <p>second comment</p>
                                    <a href="javascript::void(0);" class="nav-link text-info" onclick="reply(this)">Reply</a>
                                </div>

                                <div style="display: none" class="ReplyDiv">
                                    <textarea style="height: 50px; width:300px" name="name" id="reply" cols="30" rows="10"></textarea><br>
                                    <a href=""  style="width:80px" class="btn btn-sm btn-primary">Submit</a>
                                </div>
                            </div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script type="text/javascript">

        function reply(caller)
        {
         
            .$('.ReplyDiv').insertAfter($(caller));
            .$('.ReplyDiv').show();
        }

</script>

@endsection