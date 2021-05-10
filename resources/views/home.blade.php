@extends('welcome')
@section('title')
    home page
@endsection
@section("content")
<x-navbar/>
<div class="container">
@foreach ($posts as $post)
    <div class="card my-2">
    <div class="card-header font-weight-bold">{{$post->header}}</div>
<div class="card-body">{{$post->body}}
<div class="flex">
    @if (!$post->likedBy(auth()->user()))
    <form action="{{route("post.likes",$post->id)}}" method="POST">
        @csrf
        <input type="submit" value="Like"/>
            </form>
    @endif

</div>
</div>
<div class="card-footer">
    <small class="float-left">
        {{$post->likes->count()}} {{Str::plural("like",$post->likes->count())}}</small>
    <small class="font-weight-bold float-right">-{{$post->created_at->diffForHumans()}}</small></div>
</div>
@endforeach
{{ $posts->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection