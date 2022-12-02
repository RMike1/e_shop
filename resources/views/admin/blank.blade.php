
@extends('admin_layouts.master')

@extends('admin_layouts.title')

@section('title','Admin Show')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Products</h1>
    
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">E-Shop's Products</h5>

            <table class="table table-hover table-responsive">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
               

                </tr>
                
              </tbody>
            </table>
            

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection