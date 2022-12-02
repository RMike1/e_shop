
@extends('admin_layouts.master')

@extends('admin_layouts.title')

@section('title','Admin Add Item')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Products</h1>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Product</h5>

              <!-- General Form Elements -->
              <form action="{{url('product/create')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-form-label">Name</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="name">
                  </div>
                </div>

              
                <div class="row mb-3">
                  <label for="inputNumber" class="col-form-label">Price</label>
                  <div class="col-sm-12">
                    <input type="number" class="form-control" name="price" min="1">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="inputNumber" class="col-form-label">Image</label>
                  <div class="col-sm-12">
                    <input class="form-control" type="file" id="formFile" name="gallery">
                  </div>
                </div>

                
                <div class="row mb-3">
                  <label for="inputPassword" class="col-form-label">Description</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" style="height: 100px" name="description"></textarea>
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