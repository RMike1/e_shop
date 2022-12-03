

@extends('admin_layouts.master')

@extends('admin_layouts.title')

@section('title','Admin Show')

@section('content')




<main id="main" class="main">

  <div class="pagetitle">
    <h1>View Product</h1>
    
  </div>
  

  <section class="section">
    <div class="row">

      <div class="col-lg-6">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Product</h5>
        <div class="table-responsive" >
            <table class="table table-hover">
              <thead>
                
              </thead>
              <tbody>
              
                <tr>
                    <th>Name:</th>
                  <td>{{$data->name}}</td>
                </tr>
                <tr>
                    <img width="auto" height="200px" src="/uploads/{{$data->gallery}}" alt=""></td>
                </tr>

                <tr>
                    <th>Price:</th>
                    <td>${{number_format($data->price)}}</td>
                </tr>

                <tr>
                    <th>Quantity:</th>
                    <td>{{$data->description}}</td>

                </tr>
                <tr>
                    <th>
                        <a class="btn btn-sm btn-outline-secondary" href="/edit/product/{{$data->id}}">Edit <span class="ri ri-edit-box-fill"></span></a> 

                    </th>
                    <td>

                    </td>
                </tr>


              </tbody>
              
            </table>
                   <a href="{{url('view_products')}}" class="btn btn-secondary"><i class="bi bi-arrow-return-left"></i> Back</a>

          </div>
          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection