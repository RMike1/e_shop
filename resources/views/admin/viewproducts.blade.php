
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
            <h5 class="card-title">E-Shop's Products [ {{$totalproducts}} ]</h5>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                  <a href="{{url('add/item')}}" class="btn btn-sm btn-secondary me-md-2 mb-4" type="button">Add Item</a>
                </div>
                

          <div class="table-responsive">
            <table class="table table-hover datatable">
              <thead>
                <tr class="text-center">
                  <th scope="col">#</th>
                  <th>Image</th>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @php($count=0)
                @foreach ($data as $item)
                  @php($count++)
                <tr class="text-center">
                  <th scope="row">{{$count}}</th>
                  <td>
                    <img  width="auto" height="100px" src="/uploads/{{$item->gallery}}" alt="{{$item->name}}">
                  </td>
                  <td>{{$item->name}}</td>
                  <td>${{number_format($item->price)}}</td>
                  <td>{{Str::limit($item->description,50)}}</td>
                  <td>

                   <a class="btn btn-sm btn-primary" href="edit/product/{{$item->id}}">Edit</a> 
                   <a class="btn btn-sm btn-danger" onclick="return confirm('are u sure to delete this item?')" href="delete/product/{{$item->id}}">Delete</a> 
                  </td>
                </tr>
                
                @endforeach
              </tbody>
            </table>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
              <a href="{{url('add/item')}}" class="btn btn-sm btn-secondary me-md-2 mb-4" type="button">Add Item</a>
            </div>
          </div>
          </div>
        </div>

      </div>
    </div>
  </section>


</main><!-- End #main -->

@endsection