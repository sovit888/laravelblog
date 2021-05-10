@extends('welcome')
@section('title')
  login
@endsection
@section('content')
<div class="container">
    <h3>Login Page</h3>
    @error('login')
    <p class="text-danger my-0">{{ $message }}</p>
@enderror
    <form method="POST" action="/login">
        @csrf
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text"
             name="email" 
             id="email" 
             class="form-control @error("email") is-invalid @enderror" 
             value="{{old("email")}}">
            @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" 
            name="password" 
            id="password" 
            class="form-control @error("password") is-invalid @enderror" 
            value="{{old("password")}}">
            @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>

        <input type="submit" value="Login" class="btn btn-primary"/>
    </form>
    <div class="my-2">
    <p class="font-weight-bold mb-0">Do not have an account.</p>
    <a href="/signup">Create an Account</a>
    </div> 
</div>
@endsection