
@extends('admin_layouts.master')

@extends('admin_layouts.title')

@section('title','Admin Show')

@section('content')

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Users</h1>
    
  </div>
  

  <section class="section">
    <div class="row">

      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">E-Shop Users [ {{$total_users}} ]</h5>

            <table class="table table-hover table-responsive datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                </tr>
              </thead>
              <tbody>
                @php($count=0)
                @foreach ($data as $item)
                  @php($count++)
                <tr>
                  <th scope="row">{{$count}}</th>
                  <td>{{$item->name}}</td>
                  <td>{{$item->email}}</td>
                </tr>
                
                @endforeach
              </tbody>
            </table>

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

@endsection