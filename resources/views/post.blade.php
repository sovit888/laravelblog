@extends('welcome')
@section('title')Posts
@endsection
@section("content")
<x-navbar/>
<div class="container mt-3">
    <h3>Create a New Post</h3>
    <form action="/post" method="POST">
        @csrf
    <div class="form-group">
        <label for="header">Header</label>
        <textarea type="text" name="header" id="header" class="form-control @error("header")is-invalid @enderror " rows="2" value={{old("header")}}></textarea>
        @error('header')
         <p class="text-danger">{{$message}}</p>   
        @enderror
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea type="text" name="body" id="body" class="form-control @error("body")is-invalid @enderror" rows="3" value={{old("body")}}></textarea>
        @error('body')
        <p class="text-danger">{{$message}}</p>   
       @enderror
    </div>
    <input type="submit" value="Create a New Post" class="btn btn-primary"/>
    </form>
</div>
@endsection