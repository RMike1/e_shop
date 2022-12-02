@extends('layouts.title')
@section('title','E-shop')

@extends('layouts.master')

@section('content')
<main class="page login-page">
    <section class="clean-block clean-form dark" style="border-top:2px solid #5c636a;">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-secondary">Log In</h2>
            </div>
            <form method="post" action="login_user">
                @csrf
                <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" name="email" type="email" id="email"></div>
                <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control" name="password" type="password" id="password"></div>
                <div class="mb-3">
                </div><button class="btn btn-secondary d-block w-100 " type="submit">Log In</button>
            </form>
        </div>
    </section>
</main>

@endsection