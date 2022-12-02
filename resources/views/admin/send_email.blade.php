
@extends('admin_layouts.master')

@extends('admin_layouts.title')

@section('title','Admin Send Email')

@section('content')

<style>

    label{

        font-weight:bolder;
    }
</style>

<main id="main" class="main">

    <div class="pagetitle">
      <h1>Send E-mail</h1>
    </div>

    <section class="section">
      <div class="row">
        <div class="col-lg-8">

          <div class="card">
            <div class="card-body">
                @foreach ($data as $item)
                <h5 class="card-title">Send Mail to: {{$item->user_email}}</h5>
                
                <!-- General Form Elements -->

            <form action="{{url('send_user_email',$item->order_id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-form-label">Greeting</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="greeting">
                  </div>
                </div>

              
                <div class="row mb-3">
                  <label for="inputNumber" class="col-form-label">First Line</label>
                  <div class="col-sm-12">
                    <input type="text" class="form-control" name="firstline" min="1">
                  </div>
                </div>


                <div class="row mb-3">
                  <label for="body" class="col-form-label">Body</label>
                  <div class="col-sm-12">
                    <textarea class="form-control" type="text" id="body" name="body" ></textarea>
                  </div>
                </div>

                
                <div class="row mb-3">
                  <label for="inputPassword" class="col-form-label">Button</label>
                  <div class="col-sm-12">
                    <input class="form-control" type="text" id="button" name="button">
                  </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPassword" class="col-form-label">Url</label>
                    <div class="col-sm-12">
                      <input class="form-control" type="text" id="button" name="url">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputPassword" class="col-form-label">Last Line</label>
                    <div class="col-sm-12">
                      <input class="form-control" type="text" id="button" name="lastline">
                    </div>
                  </div>


                <div class="row mb-3">
                  <div class="col-sm-12">
                    <button type="submit" class="btn btn-secondary d-block w-100">Send</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->

            </div>
            @endforeach
          </div>

        </div>

       
      </div>
    </section>

  </main><!-- End #main -->
@endsection