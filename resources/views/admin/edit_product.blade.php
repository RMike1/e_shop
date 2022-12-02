
@extends('admin_layouts.master')

@extends('admin_layouts.title')

@section('title','Admin Show')

@section('content')


<main id="main" class="main">

    <div class="pagetitle">
      <h1>Edit Products</h1>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Edit Product</h5>

              <!-- General Form Elements -->
              <form action="{{url('update/product',$data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="id" value="{{$data->id}}">

                <div class="row mb-3">
                  <label for="inputText" class="col-form-label">Name</label>
                  <div class="col-sm-12">
                    <input type="text" value="{{$data->name}}" class="form-control" name="name">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-form-label">Price</label>
                  <div class="col-sm-12">
                    <input type="number" value="{{$data->price}}" class="form-control" name="price" min="1">
                  </div>
                </div>

                <div>
                    <img width="auto" height="100px" src="/uploads/{{$data->gallery}}" alt="ne">

                </div>

                <div class="row mb-3">
                  <label for="inputNumber" class="col-form-label">Image</label>
                  <div class="col-sm-12">
                    <input class="form-control" value="uploads/{{$data->gallery}}" type="file" id="formFile" name="gallery">
                  </div>
                </div>

                
                <div class="row mb-3">
                  <label for="inputPassword" class="col-form-label">Description</label>
                  <div class="col-sm-12">
                    <input class="form-control"  value="{{$data->description}}" name="description">
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-secondary d-block w-100">Submit</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

       
      </div>
    </section>

  </main><!-- End #main -->
@endsection