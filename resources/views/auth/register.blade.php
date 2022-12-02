@extends('layouts.title')
@section('title','E-shop')

@extends('layouts.master')

@section('content')
<main class="page login-page">
    <section class="clean-block clean-form dark">
        <div class="container">
            <div class="block-heading">
                <h2 class="text-secondary">Sign Up</h2>
            </div>
            <form method="post" action="register_user">
                @csrf
                <div class="mb-3"><label class="form-label" for="email">Name</label><input class="form-control item" name="name" type="name" id="name"></div>
                <div class="mb-3"><label class="form-label" for="email">Email</label><input class="form-control item" name="email" type="email" id="email"></div>
                <div class="mb-3"><label class="form-label" for="password">Password</label><input class="form-control" name="password" type="password" id="password"></div>
                <div class="mb-3">
                </div><button class="btn btn-secondary w-100 d-block" type="submit">Sign Up</button>
            </form>
        </div>
    </section>
</main>

@endsection