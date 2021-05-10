@extends('welcome')
@section('title')
    signup page
@endsection
@section('content')
<div class="container">
    <h3>Create an Account</h3>
    <form method="POST" action="/signup">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text"
             name="username" 
             id="username" 
             class="form-control @error("username") is-invalid @enderror" 
             value="{{old("username")}}">
            @error('username')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
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
        <p class="font-weight-bold mb-0">Already have an account.</p>
        <a href="/login">Click here to continue</a>
</div>
@endsection